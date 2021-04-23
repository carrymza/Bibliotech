<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Iniciar Sesión';
		$this->load->model('session/session_model');
		$this->load->module('com_auth/controller/com_auth');
	}

	public function index($redirect = FALSE)
	{
		$this->redirect_if_logged_in($this->session->userdata('app')['userdata']['is_logged_in']);
		$data                   = array();
		$data['redirect']       = ($redirect == FALSE) ? "" : $redirect;
		$this->load->view('session/session_view', $data);
	}

	public function js_session()
	{
		header('Content-Type: text/javascript');
		echo $this->com_auth->js_session();
	}

	public function auth($email  = FALSE, $password  = FALSE)
	{
		$email   = ($email == FALSE) ? $this->input->post('email') : $email;
		$password   = ($password == FALSE) ? $this->input->post('password') : $password;
		$redirect   = (empty($_POST['redirect'])) ? 'dashboard' : $this->input->post('redirect');
		$row        = $this->com_auth->auth($email, $password);

		if($row == TRUE)
		{
			echo json_encode(array('result' => 1, 'url' => base_url().$redirect));
		}
		else
		{
			echo json_encode(array('result' => 0, 'error' => display_error("<li>La combinación Email / Contraseña es incorrecta.</li>", TRUE)));
		}
	}

	public function recover()
	{
		$this->title    = "Recuperar Contraseña";
		$data           = array();
		$this->load->view('session/recover_view', $data);
	}

	public function recover_password()
	{
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('domain', '<strong>Dominio</strong>', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors(), TRUE)));
		}
		else
		{
			$domain     = $this->input->post("domain");
			$email      = $this->input->post("email");
			$validate   = $this->session_model->validate_user($domain, $email);

			if($validate == 0)
			{
				echo json_encode(array('result' => 0, 'error' => display_error("<li>No existe un usuario con esta información suministrada.</li>", TRUE)));
			}
			else
			{
				$name           = $this->session_model->get_name($email);
				$hash           = sha1(now());
				$data['hash']   = $hash;
				$data['email']  = $email;
				$data['name']   = $name;
				$html           = $this->load->view("session/session_recover_email_view", $data, TRUE);

				$result = $this->sendmail->send_mail(array(
					'to'       => $email,
					'to_name'  => $name,
					'title'    => 'SchoolApp | Recuperar Contraseña',
					'body'     => $html), TRUE);

				if($result == TRUE)
				{
					$hash1 = array("hash" => $hash);
					$this->session_model->update($hash1, array('email' => $email));
					echo json_encode(array("result" => 1, 'url' => base_url('session/reset_send')));
				}
				else
				{
					echo json_encode(array('result' => 0, 'error' => display_error("<li>Hubo un error!...</li>", TRUE)));
				}
			}
		}
	}

	public function reset_send()
	{
		$this->load->view('session/reset_send_view');
	}

	public function lock_screen()
	{
		$this->load->view('session/lock_screen_view');
	}

	public function unlock_session()
	{

	}

	public function new_password($hash = FALSE)
	{
		if($hash != FALSE)
		{
			$row = $this->session_model->check_hash($hash);
			(!empty($row))? $this->load->view('session/reset_password_view', array('userId' => $row->userId)) : $this->load->view('session/reset_invalid_link_view');
		}
		else
		{
			$this->load->view('session/reset_invalid_link_view');
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
			$row    = $this->session_model->get_single($userId);

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
				$this->session_model->update($data, array('userId' => $userId));
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
			$redirect = "dashboard";
			redirect(base_url().$redirect);
		}
	}
}
