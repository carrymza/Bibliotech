<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Estudiantes';
		$this->namespace   	= 'app';
		$this->moduleId		= 2;

		$this->load->model('students/students_model');
		$this->load->model('students/student_address_model');
		$this->load->model('students/relationship_model');
		$this->load->model('students/student_diseases_model');
		$this->load->model('students/student_diseases_items_model');
		$this->load->model('general_settings/diseases_model');
		$this->load->model('general_settings/sex_model');
		$this->load->model('general_settings/blood_groups_model');
		$this->load->model('general_settings/type_documents_model');
		$this->load->model('parents/parents_model');
		$this->load->model('parents/parents_children_model');
		$this->load->module('com_files/controller/com_files');

		$this->sex 				= $this->sex_model->get_assoc_list(array('sexId AS id', 'name'), array("hidden" => 0), TRUE);
		$this->relationships 	= $this->relationship_model->get_assoc_list(array('relationshipId AS id', 'name'), array("hidden" => 0), TRUE);
		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
		$this->blood_groups 	= $this->blood_groups_model->get_assoc_list(array('groupId AS id', 'name'), array("hidden" => 0));
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'students/students_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    		= "studentId,image,full_name,years_old";
			$result     		= $this->students_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array(
			'schoolId'		=> $this->schoolId,
			'image'         => '',
			'birthday'		=> date('Y-m-d'),
			'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
			'hidden'        => 1
		);

		if($studentId = $this->students_model->save($data))
		{
			redirect(base_url().'students/edit/'.$studentId);
		}
	}

	public function edit($studentId)
	{
		$data['row']            	= $this->students_model->get($studentId);
		$data['diseases']			= $this->diseases_model->get_diseases_by_type($this->schoolId);
		$data['student_diseases'] 	= $this->student_diseases_model->get_diseases_data($studentId);
		$data['family_info']		= $this->get_family_members($studentId);
		$data['address_info']		= $this->get_student_address($studentId);
		$data['content']			= 'students/students_edit_view';
		$this->load->view('include/template', $data);
	}

	public function update($studentId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');

		$row = $this->students_model->get_by(array('studentId' => $studentId), TRUE);

		if($this->parents_model->count_by(array("studentId" => $studentId, "hidden" => 0)) == 0)
		{
			$error 		.= '<li>Debe registrar al menos un familiar.</li>';
			$valid  	 = FALSE;
		}

		if($this->student_address_model->count_by(array("studentId" => $studentId, "hidden" => 0)) == 0)
		{
			$error 		.= '<li>Debe registrar al menos una dirección.</li>';
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
				'first_name'    	=> $this->input->post('first_name'),
				'last_name'     	=> $this->input->post('last_name'),
				'birthday'      	=> $this->input->post('birthday'),
				'sexId'      		=> $this->input->post('sexId'),
				'years_old'     	=> $this->input->post('years_old'),
				'blood_groupId' 	=> $this->input->post('blood_groupId'),
				'hidden'			=> 0
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'students'
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

			if($this->students_model->save($data, $studentId))
			{
				$this->save_diseases($_POST, $studentId);
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($studentId)
	{
		if($this->students_model->save(array('hidden' => 1), $studentId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	public function add_student_address($studentId)
	{
		$count 	= $this->student_address_model->count_by(array('studentId' => $studentId, 'hidden' => 0));
		$data 	= array('studentId' => $studentId, "count" => $count);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/widget/address/add_student_address_view', $data, TRUE)));
	}

	public function edit_student_address($addressId)
	{
		$data = array('row' => $this->student_address_model->get($addressId));
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/widget/address/edit_student_address_view', $data, TRUE)));
	}

	public function insert_student_address($studentId, $count = 0)
	{
		$this->form_validation->set_rules('address', '<strong>Dirección</strong>', 'trim|required');
		$this->form_validation->set_rules('city', '<strong>Ciudad</strong>', 'trim|required');
		$this->form_validation->set_rules('province', '<strong>Provincia</strong>', 'trim|required');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
		else
		{
			$data = array(
				'studentId'			=> $studentId,
				'address'    		=> $this->input->post('address'),
				'city'     			=> $this->input->post('city'),
				'province'         	=> $this->input->post('province'),
				'main'				=> ($count == 0) ? 1 : 0,
				'creation_date' 	=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        	=> 0
			);

			if($this->student_address_model->save($data))
			{
				echo json_encode(array("result" => 1, 'view' => $this->get_student_address($studentId)));
			}
		}
	}

	public function update_student_address($addressId)
	{
		$this->form_validation->set_rules('address', '<strong>Dirección</strong>', 'trim|required');
		$this->form_validation->set_rules('city', '<strong>Ciudad</strong>', 'trim|required');
		$this->form_validation->set_rules('province', '<strong>Provincia</strong>', 'trim|required');

		$row = $this->student_address_model->get_by(array('addressId' => $addressId), TRUE);

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
		else
		{
			$data = array(
				'address'    		=> $this->input->post('address'),
				'city'     			=> $this->input->post('city'),
				'province'         	=> $this->input->post('province'),
				'creation_date' 	=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        	=> 0
			);

			if($this->student_address_model->save($data, $addressId))
			{
				echo json_encode(array("result" => 1, 'view' => $this->get_student_address($row->studentId)));
			}
		}
	}

	public function delete_student_address($addressId, $studentId)
	{
		if($this->student_address_model->save(array('hidden' => 1), $addressId))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_student_address($studentId)));
		}
	}

	public function make_main_student_address($addressId, $studentId)
	{
		$this->student_address_model->update(array('main' => 0), array('studentId' => $studentId));

		if($this->student_address_model->save(array('main' => 1), $addressId))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_student_address($studentId)));
		}
	}

	public function add_family_member($studentId)
	{
		$count = $this->parents_children_model->count_by(array('studentId' => $studentId, 'hidden' => 0));
		$data = array('studentId' => $studentId, "count" => $count);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/widget/family/add_family_member_view', $data, TRUE)));
	}

	public function edit_family_member($parentId, $studentId)
	{
		$data = array('row' => $this->parents_model->get_parent_data($parentId, $studentId));
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/widget/family/edit_family_member_view', $data, TRUE)));
	}

	public function insert_family_member($studentId, $count = 0)
	{
		$parentId 		= $this->input->post('parentId');

		if($parentId == 0)
		{
			$error 			= '';
			$valid      	= TRUE;
			$documentId 	= $this->input->post('doc_typeId');
			$document   	= $this->input->post('document');

			$this->form_validation->set_rules('f_first_name', '<strong>Nombre</strong>', 'trim|required');
			$this->form_validation->set_rules('f_last_name', '<strong>Apellido</strong>', 'trim|required');
			$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');
			$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

//			if($this->family_document_check($documentId, $document, $studentId) == FALSE)
//			{
//				$error 		.= '<li>Ya existe un familiar vinculado con este <strong>Documento</strong>.</li>';
//				$valid  	 = FALSE;
//			}

			$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
			$error          .= validation_errors();

			if($valid == FALSE)
			{
				echo json_encode(array('result' => 0, 'error' => display_error($error)));
			}
			else
			{
				$data = array(
					'schoolId'			=> $this->schoolId,
					'first_name'    	=> $this->input->post('f_first_name'),
					'last_name'     	=> $this->input->post('f_last_name'),
					'email'         	=> $this->input->post('email'),
					'relationshipId'	=> $this->input->post('relationshipId'),
					'doc_typeId'		=> $this->input->post('doc_typeId'),
					'document'			=> $this->input->post('document'),
					'phone'				=> $this->input->post('phone'),
					'cellphone'			=> $this->input->post('cellphone'),
					'image'				=> $this->input->post('img_hidden'),
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

				if($parentId = $this->parents_model->save($data))
				{
					$data = array(
						'parentId' 	=> $parentId,
						'studentId' => $studentId,
						'in_charge' => ($count == 0) ? 1 : 0
					);

					if($this->parents_children_model->save($data))
					{
						echo json_encode(array("result" => 1, 'view' => $this->get_family_members($studentId)));
					}
				}
			}
		}
		else
		{
			$data = array(
				'parentId' 	=> $parentId,
				'studentId' => $studentId,
				'in_charge' => ($count == 0) ? 1 : 0
			);

			if($this->parents_children_model->save($data))
			{
				echo json_encode(array("result" => 1, 'view' => $this->get_family_members($studentId)));
			}
		}
	}

	public function update_family_member($parentId)
	{
		$this->form_validation->set_rules('f_first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('f_last_name', '<strong>Apellido</strong>', 'trim|required');
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
				'first_name'    	=> $this->input->post('f_first_name'),
				'last_name'     	=> $this->input->post('f_last_name'),
				'email'         	=> $this->input->post('email'),
				'relationshipId'	=> $this->input->post('relationshipId'),
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
				echo json_encode(array("result" => 1, 'view' => $this->get_family_members($row->studentId)));
			}
		}
	}

	public function delete_family_member($parentId, $studentId)
	{
		if($this->parents_children_model->update(array('hidden' => 1), array("parentId" => $parentId, "studentId" => $studentId)))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_family_members($studentId)));
		}
	}

	public function make_parent_in_charge($parentId, $studentId)
	{
		$this->parents_children_model->update(array('in_charge' => 0), array('studentId' => $studentId));

		if($this->parents_children_model->update(array('in_charge' => 1), array("parentId" => $parentId, "studentId" => $studentId)))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_family_members($studentId)));
		}
	}

	public function check_document($doc_typeId, $document, $studentId)
	{
		$result = $this->parents_model->get_parent_by_document($doc_typeId, remove_character('-','', $document), $studentId, $this->schoolId);

		if($result[0] == null)
		{
			echo json_encode(array("result" => 1, "exist" => false));
		}
		else
		{
			echo json_encode(array("result" => 1, "exist" => true, "data" => $result));
		}
	}

	public function import()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/import_students_view', $data, TRUE)));
	}

	public function make_import()
	{
		if(!empty($_FILES))
		{
			$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
			$data_file = array(
				'file_name'           => '',
				'file_type'           => $ext,
				'allowed_types'       => 'csv|xls|xlsx|ods',
				'folder'              => 'imports'
			);

			$result            = $this->com_files->upload($data_file, TRUE);

			if($result["result"] != 0)
			{
				$response = $this->save_data_import($result['file']);
				echo json_encode(array('result' => 1, "success" => $response['success'], "skip" => $response['skip']));
			}
			else
			{
				echo json_encode(array('result' => 0, 'error' => display_error('<li>Error en el servidor. Inténtelo m&aacute;s tarde</li>')));
			}
		}
		else
		{
			echo json_encode(array('result' => 0, 'error' => display_error('<li>Seleccione un archivo</li>')));
		}
	}

	private function save_diseases($data, $studentId)
	{
		if(isset($data['disease']))
		{
			foreach ($data['disease'] AS $key => $value)
			{
				$diseaseId = $this->student_diseases_model->check_if_student_has_disease($studentId, $key);

				$data_disease = array(
					'studentId'			=> $studentId,
					'active'			=> 1,
					'typeId'			=> $key,
					'last_reaction' 	=> (isset($data['last_reaction'][$key])) ? $data['last_reaction'][$key] : '',
					'last_visit' 		=> (isset($data['last_visit'][$key])) ? $data['last_visit'][$key] : '',
					'treatment' 		=> (isset($data['treatment_value'][$key])) ? $data['treatment_value'][$key] : '',
				);

				if($diseaseId == 0)
				{
					$diseaseId = $this->student_diseases_model->save($data_disease);
				}
				else
				{
					$this->student_diseases_model->save($data_disease, $diseaseId);
				}

				$this->save_diseases_items($data, $diseaseId, $key);
			}
		}
	}

	private function save_diseases_items($data, $diseaseId, $key)
	{
		foreach ($data['disease_type'][$key] AS $key_item => $value)
		{
			$itemId = $data['disease_itemId'][$key][$key_item];

			$data_items = array(
				'diseaseId'  => $diseaseId,
				'key_parent' => $key,
				'key' 		 => $key_item,
				'active' 	 => ($data['disease_type'][$key][$key_item] == 'on' || $data['disease_type'][$key][$key_item] == 1) ? 1 : 0,
				'value'		 => (isset($data['disease_value'][$key][$key_item])) ? $data['disease_value'][$key][$key_item] : ""
			);

			($itemId == 0) ? $this->student_diseases_items_model->save($data_items) : $this->student_diseases_items_model->save($data_items, $itemId);
		}
	}

	private function save_data_import($path)
	{
		$file 		= realpath(APPPATH.'../'.$path);
		$data 		= \yidas\phpSpreadsheet\Helper::newSpreadsheet($file)->getRows();
		$skip 		= 0;
		$success 	= 0;

		for($i = 2; $i < count($data); $i++)
		{
			if(($data[$i][2] != 0 || $data[$i][2] != '') && ($data[$i][3] != 0 || $data[$i][3] != ''))
			{
				$data_import = array(
					'schoolId'		=> $this->schoolId,
					'first_name'    => $data[$i][0],
					'last_name'     => $data[$i][1],
					'image'         => '',
					'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
					'hidden'        => 0
				);

				$this->students_model->save($data_import);
				$success++;
			}
			else
			{
				$skip++;
			}
		}

		$this->com_files->unlink_image($file);

		return array("success" => $success, "skip" => $skip);
	}

	private function get_student_address($studentId)
	{
		$data['studentId']		= $studentId;
		$data['address_info']	= $this->student_address_model->get_by(array('studentId' => $studentId, 'hidden' => 0));
		return $this->load->view('students/widget/address/address_view', $data, TRUE);
	}

	private function get_family_members($studentId)
	{
		$data['studentId']		= $studentId;
		$data['family_info']	= $this->parents_model->get_family_members_info($studentId);
		return $this->load->view('students/widget/family/family_view', $data, TRUE);
	}

//	private function family_document_check($documentId, $document, $studentId, $parentId = FALSE)
//	{
//		$where = array(
//			'doc_typeId' 				=> $documentId,
//			'REPLACE(document,"-","")=' => remove_character('-','',$document),
//			'studentId =' 				=> $studentId,
//			'schoolId' 					=> $this->schoolId,
//			'hidden' 					=> 0
//		);
//
//		if($parentId != FALSE)
//		{
//			$where['parentId !='] = $parentId;
//		}
//
//		return ($this->parents_model->in_table_by($where) > 0) ? FALSE : TRUE;
//	}
}
