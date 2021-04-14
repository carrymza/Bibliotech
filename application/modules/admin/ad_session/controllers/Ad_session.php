<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_session extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Iniciar Sesión';
		$this->load->model('ad_session/ad_session_model');
		$this->load->module('com_auth/controller/com_auth');
	}

	public function index($redirect = FALSE)
	{
		$this->redirect_if_logged_in($this->session->userdata('pr')['userdata']['is_logged_in']);
		$data                   = array();
		$data['redirect']       = ($redirect == FALSE) ? "" : $redirect;
		$this->load->view('ad_session/ad_session_view', $data);
	}

	public function js_session()
	{
		header('Content-Type: text/javascript');
		echo $this->com_auth->js_session();
	}

	public function auth($username  = FALSE, $password  = FALSE)
	{
		$username   = ($username == FALSE) ? $this->input->post('username') : $username;
		$password   = ($password == FALSE) ? $this->input->post('password') : $password;
		$redirect   = (empty($_POST['redirect'])) ? 'ad_dashboard' : $this->input->post('redirect');
		$row        = $this->com_auth->ad_auth($username, $password);

		if($row == TRUE)
		{
			echo json_encode(array('result' => 1, 'url' => base_url().$redirect));
		}
		else
		{
			echo json_encode(array('result' => 0, 'error' => display_error("<li>La combinación Usuario / Contraseña es incorrecta.</li>", TRUE)));
		}
	}

	public function recover()
	{
		$this->title    = "Recuperar Contraseña";
		$data           = array();
		$this->load->view('ad_session/ad_recover_view', $data);
	}

	public function recover_password()
	{
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		if($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors(), TRUE)));
		}
		else
		{
			$email      = $this->input->post("email");
			$validate   = $this->ad_session_model->validate_email($email);

			if($validate == 0)
			{
				echo json_encode(array('result' => 0, 'error' => display_error("<li>No existe un usuario con este email</li>", TRUE)));
			}
			else
			{
				$name           = $this->ad_session_model->get_name($email);
				$hash           = sha1(now());
				$data['hash']   = $hash;
				$data['email']  = $email;
				$data['name']   = $name;
				$html           = $this->load->view("ad_session/ad_session_recover_email_view", $data, TRUE);

				$this->sendmail->send_mail(array(
					'to'       => $email,
					'to_name'  => $name,
					'title'    => 'SchoolApp | Recuperar Contraseña',
					'body'     => $html), TRUE);

				$hash1 = array("hash" => $hash);
				$this->ad_session_model->update($hash1, array('email' => $email));
				echo json_encode(array("result" => 1, 'url' => base_url('ad_session/ad_reset_send')));
			}
		}
	}

	public function reset_send()
	{
		$this->load->view('ad_session/ad_reset_send_view');
	}

	public function new_password($hash = FALSE)
	{
		if($hash != FALSE)
		{
			$row = $this->ad_session_model->check_hash($hash);
			(!empty($row))? $this->load->view('ad_session/ad_reset_password_view', array('userId' => $row->userId)) : $this->load->view('ad_session/ad_reset_invalid_link_view');
		}
		else
		{
			$this->load->view('ad_session/ad_reset_invalid_link_view');
		}
	}

	public function update_password()
	{
		$this->form_validation->set_rules('password', '<strong>Contraseña</strong>', 'trim|required');
		$this->form_validation->set_rules('new_password', '<strong>Reescriba Contraseña</strong>', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors(), TRUE)));
		}
		else
		{
			$userId = $this->input->post('userId');
			$row    = $this->ad_session_model->get_single($userId);

			$data   = array(
				'password'  => md5($this->input->post('password')),
				'hash'      => ""
			);

			if($row->password == $data['password'])
			{
				echo json_encode(array('result' => 0, 'error' => display_error("<li>La nueva contraseña no puede ser igual a la anterior.</li>", TRUE)));
			}
			else
			{
				$this->ad_session_model->update($data, array('userId' => $userId));
				echo json_encode(array('result' => 1));
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}

	private function redirect_if_logged_in($is_logged_in)
	{
		if(isset($is_logged_in) || ($is_logged_in === TRUE))
		{
			$redirect = "admin/dashboard";
			redirect(base_url().$redirect);
		}
	}
}
