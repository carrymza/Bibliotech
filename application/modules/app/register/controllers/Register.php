<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Registro';
		$this->load->model('users/users_model');
		$this->load->module('com_auth/controller/com_auth');
	}

	public function index()
	{
		$this->redirect_if_logged_in($this->session->userdata('app')['userdata']['is_logged_in']);
		$data                   = array();
		$this->load->view('register/register_view', $data);
	}

	public function make_registration()
	{
		$error 			= '';
		$valid      	= TRUE;
		$email			= $this->input->post('email');
		$password    	= $this->input->post('password');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', '<strong>Contraseña</strong>', 'trim|required');

		if($this->email_check($email) == FALSE)
		{
			$error 		.= '<li>Ya existe una cuenta asociada a este <strong>Email</strong>.</li>';
			$valid       = FALSE;
		}

		$valid           = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$user_data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'username'      => $email,
				'email'         => $email,
				'password'      => md5($password),
				'image'			=> '',
				'statusId'		=> 1,
				'owner'			=> 1,
				'typeId'     	=> 1,
				'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s")
			);

			if($this->users_model->save($user_data))
			{
				$this->com_auth->auth($email, $password);
				echo json_encode(array("result" => 1, 'url' => base_url('dashboard')));
			}
		}
	}

	private function email_check($email)
	{
		$where = array('LOWER(REPLACE(email," ",""))=' => clear_space($email), 'hidden' => 0);
		return ($this->users_model->in_table_by($where) > 0) ? FALSE : TRUE;
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
