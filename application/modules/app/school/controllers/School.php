<?php defined('BASEPATH') OR exit('No direct script access allowed');

class School extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Centro Educativo';
		$this->namespace   	= 'app';
		$this->moduleId		= 13;

		$this->load->model('school/school_model');
		$this->load->module('com_files/controller/com_files');
	}

	public function index()
	{
		$data					= array();
		$data['row']            = $this->school_model->get($this->schoolId);
		$data['content']		= 'school/school_view';
		$this->load->view('include/template', $data);
	}

	public function update($schoolId)
	{
		$this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', '<strong>Teléfono</strong>', 'trim|required');

		$row = $this->school_model->get_by(array('schoolId' => $schoolId), TRUE);

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
		else
		{
			$data = array(
				'name'    		=> $this->input->post('name'),
				'slogan'     	=> $this->input->post('slogan'),
				'email'      	=> $this->input->post('email'),
				'phone'     	=> $this->input->post('phone'),
				'web'     		=> $this->input->post('website'),
				'address'     	=> $this->input->post('address'),
				'province'     	=> $this->input->post('province'),
				'city'     		=> $this->input->post('city')
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'schools'
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

			if($this->school_model->save($data, $schoolId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}
}
