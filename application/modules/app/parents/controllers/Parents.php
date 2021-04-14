<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Padres / Tutores';
		$this->namespace   	= 'app';
		$this->moduleId		= 14;

		$this->load->model('parents/parents_model');
		$this->load->model('parents/parents_children_model');
		$this->load->model('general_settings/type_documents_model');
		$this->load->model('general_settings/sex_model');
		$this->load->model('students/relationship_model');
		$this->load->module('com_files/controller/com_files');

		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
		$this->relationships 	= $this->relationship_model->get_assoc_list(array('relationshipId AS id', 'name'), array("hidden" => 0), TRUE);
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'parents/parents_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "parentId,image,full_name";
			$result     	= $this->parents_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('parents/add_parent_view', $data, TRUE)));
	}

	public function edit($parentId)
	{
		$data = array('row' => $this->parents_model->get($parentId));
		echo json_encode(array('result' => 1, 'view' => $this->load->view('parents/edit_parent_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 		= '';
		$valid      = TRUE;
		$documentId = $this->input->post('doc_typeId');
		$document   = $this->input->post('document');
//		$studentId  = $this->input->post('studentId');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		if($this->document_check($documentId, $document) == FALSE)
		{
			$error 		.= '<li>Ya existe un registro con este <strong>Documento</strong>.</li>';
			$valid  	 = FALSE;
		}

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
//				'studentsId'		=> $studentId,
				'schoolId'			=> $this->schoolId,
				'first_name'    	=> $this->input->post('first_name'),
				'last_name'     	=> $this->input->post('last_name'),
				'email'         	=> $this->input->post('email'),
				'doc_typeId'		=> $this->input->post('doc_typeId'),
				'document'			=> $this->input->post('document'),
				'phone'				=> $this->input->post('phone'),
				'cellphone'			=> $this->input->post('cellphone'),
				'creation_date' 	=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        	=> 0
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'parents'
				);

				$result            = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($this->parents_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($parentId)
	{
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		$row = $this->parents_model->get_by(array('parentId' => $parentId), TRUE);

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
		else
		{
			$data = array(
				'first_name'    	=> $this->input->post('first_name'),
				'last_name'     	=> $this->input->post('last_name'),
				'email'         	=> $this->input->post('email'),
//				'relationshipId'	=> $this->input->post('relationshipId'),
				'doc_typeId'		=> $this->input->post('doc_typeId'),
				'document'			=> $this->input->post('document'),
				'phone'				=> $this->input->post('phone'),
				'cellphone'			=> $this->input->post('cellphone'),
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'parents'
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

			if($this->parents_model->save($data, $parentId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($parentId)
	{
		if($this->parents_model->save(array('hidden' => 1), $parentId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	private function document_check($documentId, $document, $parentId = FALSE)
	{
		$where = array(
			'doc_typeId' 				=> $documentId,
			'REPLACE(document,"-","")=' => remove_character('-','',$document),
			'schoolId' 					=> $this->schoolId,
			'hidden' 					=> 0
		);

		if($parentId != FALSE)
		{
			$where['parentId !='] = $parentId;
		}

		return ($this->parents_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}
}
