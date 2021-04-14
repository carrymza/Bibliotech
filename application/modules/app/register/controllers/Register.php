<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Registro';
		$this->load->model('school/school_model');
		$this->load->model('users/users_model');
		$this->load->model('general_settings/settings_model');
		$this->load->module('com_auth/controller/com_auth');
	}

	public function index($planId = FALSE)
	{
		$this->redirect_if_logged_in($this->session->userdata('app')['userdata']['is_logged_in']);
		$data                   = array();
		$data['planId']			= $planId;
		$this->load->view('register/register_view', $data);
	}

	public function make_registration($planId = FALSE)
	{
		$error 			= '';
		$valid      	= TRUE;
		$school_domain	= strtolower(clear_space(clean_string($this->input->post('school'))));
		$email			= $this->input->post('email');
		$password    	= $this->input->post('password');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', '<strong>Contraseña</strong>', 'trim|required');
		$this->form_validation->set_rules('school', '<strong>Centro Educativo</strong>', 'trim|required');

		if($this->school_domain_check($school_domain) == FALSE)
		{
			$error 		.= '<li>Ya existe una cuenta asociada a este <strong>Centro Educativo</strong>.</li>';
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
			$data = array(
				'domain'		=> $school_domain,
				'name'    		=> $this->input->post('school'),
				'planId'		=> ($planId == FALSE) ? 2 : $planId,
				'email'         => $email,
				'statusId'		=> 1,
				'image'         => '',
				'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'expiracy_date' => date("Y-m-d", strtotime(date("Y-m-d")."+ 30 days")),
				'hidden'        => 0
			);

			if($schoolId = $this->school_model->save($data))
			{
				$settings_Data = array(
					'schoolId' 		=> $schoolId,
					'currencyId' 	=> 1,
					'language' 		=> 'es'
				);

				$this->settings_model->save($settings_Data);

				$user_data = array(
					'schoolId'		=> $schoolId,
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
					$this->com_auth->auth($school_domain, $email, $password);
					echo json_encode(array("result" => 1, 'url' => base_url('initial_settings')));
				}
			}
		}
	}

	private function school_domain_check($domain)
	{
		$where = array('LOWER(REPLACE(domain," ",""))=' => clear_space($domain), 'hidden' => 0);
		return ($this->school_model->in_table_by($where) > 0) ? FALSE : TRUE;
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
