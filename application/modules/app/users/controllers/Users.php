<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Usuarios';
		$this->namespace   	= 'app';
		$this->moduleId		= 9;

		$this->load->model('users/users_model');
		$this->load->model('users/users_status_model');
		$this->load->model('users/users_type_model');
		$this->load->model('general_settings/type_documents_model');
		$this->load->model('employees/employees_model');
		$this->load->module('com_files/controller/com_files');

		$this->status 			= $this->users_status_model->get_assoc_list(array('statusId AS id', 'name'), array("hidden" => 0));
		$this->types 			= $this->users_type_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
	}

	public function index()
	{
		$data                   = array();
		$data['active_users']	= $this->users_model->count_by(array('schoolId' => $this->schoolId, 'hidden' => 0));
		$data['content']		= 'users/users_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "userId,image,full_name,username,type_name,status_name,statusId,class,owner";
			$result     	= $this->users_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('users/users_new_view', $data, TRUE)));
	}

	public function edit($userId)
	{
		$data['row']                    = $this->users_model->get($userId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('users/users_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');
		$username   = $this->input->post('username');

		$this->form_validation->set_rules('username', '<strong>Usuario</strong>', 'trim|required');
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('password', '<strong>Contraseña</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		if($this->user_username_check($username) == FALSE)
		{
			$error 	   .= '<li>Ya existe un registro con este <strong>Usuario</strong>.</li>';
			$valid     	= FALSE;
		}

		if($this->user_email_check($email) == FALSE)
		{
			$error 		.= '<li>Ya existe un usuario con este <strong>Email</strong>.</li>';
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
				'schoolId'		=> $this->schoolId,
				'username'		=> $username,
				'password'      => md5($this->input->post('password')),
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'         => $email,
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone'),
				'typeId'		=> $this->input->post('typeId'),
				'statusId'		=> $this->input->post('statusId'),
				'is_employee'	=> (isset($_POST['is_employee'])) ? $this->input->post('is_employee') : 0,
				'image'         => '',
				'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        => 0
			);

			if(!empty($_FILES))
			{
				$data_file = array(
					'file_name'           => '',
					'file_type'           => substr(strrchr($_FILES['image']['name'], "."), 1),
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'users'
				);

				$result            = $this->com_files->upload($data_file);

				$data['image'] = ($result["result"] != 0) ? $result['file'] : '';
			}

			if($this->users_model->save($data))
			{
				if($data['is_employee'] == 1)
				{
					$data_employee = array(
						'schoolId'		=> $this->schoolId,
						'first_name'    => $data['first_name'],
						'last_name'     => $data['last_name'],
						'doc_typeId'	=> $this->input->post('doc_typeId'),
						'document'		=> $this->input->post('document'),
						'email'         => $email,
						'phone'			=> $data['phone'],
						'cellphone'		=> $data['cellphone'],
						'image'			=> $data['image'],
						'statusId'		=> 1,
						'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s")
					);

					$this->employees_model->save($data_employee);
				}

				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($userId)
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		$row 		= $this->users_model->get_by(array('userId' => $userId), TRUE);

		if($this->user_email_check($email, $userId) == FALSE)
		{
			$error 		.= '<li>Ya existe un usuario con este <strong>Email</strong>.</li>';
			$valid    	 = FALSE;
		}

		$valid        	 = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error       	.= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'         => $email,
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone'),
				'typeId'		=> $this->input->post('typeId'),
				'statusId'		=> $this->input->post('statusId')
			);

			if($_POST['password'] != '')
			{
				$data['password'] = md5($this->input->post('password'));
			}

			if(!empty($_FILES))
			{
				$data_file = array(
					'file_name'           => '',
					'file_type'           => substr(strrchr($_FILES['image']['name'], "."), 1),
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'users'
				);

				$result            = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
					if($row->image != null || $row->image != "")
					{
						$this->com_files->unlink_image($row->image);
					}
				}
			}

			if($this->users_model->save($data, $userId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($userId)
	{
		$result['result'] = ($this->users_model->save(array('hidden' => 1), $userId) == TRUE) ? 1 : 0;
		echo json_encode($result);
	}

	public function lock($userId)
	{
		$result['result'] = ($this->users_model->save(array('statusId' => 3), $userId) == TRUE) ? 1 : 0;
		echo json_encode($result);
	}

	public function unlock($userId)
	{
		$result['result'] = ($this->users_model->save(array('statusId' => 1), $userId) == TRUE) ? 1 : 0;
		echo json_encode($result);
	}

	public function my_profile()
	{
		$data['row']                    = $this->users_model->get($this->userId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('users/my_profile_view', $data, TRUE)));
	}

	public function update_profile($userId)
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		$row = $this->users_model->get_by(array('userId' => $userId), TRUE);

		if($this->user_email_check($email, $userId) == FALSE)
		{
			$error 		.= '<li>Ya existe un usuario con este <strong>Email</strong>.</li>';
			$valid    	 = FALSE;
		}

		$valid        	 = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error       	.= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'         => $email,
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone')
			);

			if($_POST['password'] != '')
			{
				$data['password'] = md5($this->input->post('password'));
			}

			if(!empty($_FILES))
			{
				$data_file = array(
					'file_name'           => '',
					'file_type'           => substr(strrchr($_FILES['image']['name'], "."), 1),
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'users'
				);

				$result            		  = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  	  = $result['file'];
					if($row->image != null || $row->image != "")
					{
						$this->com_files->unlink_image($row->image);
					}
				}
			}

			if($this->users_model->save($data, $userId))
			{
				$user_data['app']              				= $this->session->userdata('app');
				$user_data['app']['userdata']['full_name'] 	= $data['first_name'].' '.$data['last_name'];
				$user_data['app']['userdata']['first_name']	= $data['first_name'];
				$user_data['app']['userdata']['email']		= $data['email'];
				$user_data['app']['userdata']['image']		= (isset($data['image'])) ? $data['image'] : $user_data['app']['userdata']['image'];
				$this->session->set_userdata($user_data);

				echo json_encode(array("result" => 1));
			}
		}
	}

	public function toggle_menu($type)
	{
		$user_data              			= $this->session->userdata();
		$user_data['userdata']['menu_type'] = $type;
		$this->session->set_userdata($user_data);
	}

	private function user_email_check($email, $userId = FALSE)
	{
		$where = array('LOWER(REPLACE(email," ",""))=' => clear_space($email), 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($userId != FALSE)
		{
			$where['userId !='] = $userId;
		}

		return ($this->users_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}

	private function user_username_check($username, $userId = FALSE)
	{
		$where = array('LOWER(REPLACE(username," ",""))=' => $username, 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($userId != FALSE)
		{
			$where['userId !='] = $userId;
		}

		return ($this->users_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}
}
