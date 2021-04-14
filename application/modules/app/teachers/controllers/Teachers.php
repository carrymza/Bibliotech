<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Docentes';
		$this->namespace   	= 'app';
		$this->moduleId		= 3;

		$this->load->model('teachers/teachers_model');
		$this->load->model('teachers/teachers_address_model');
		$this->load->model('general_settings/type_documents_model');
		$this->load->model('general_settings/specialties_model');
		$this->load->module('com_files/controller/com_files');

		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
		$this->specialties		= $this->specialties_model->get_assoc_list(array('specialtyId AS id', 'name'), array('hidden' => 0, 'schoolId' => $this->schoolId), TRUE);
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'teachers/teachers_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "teacherId,image,full_name,specialty_name,statusId";
			$result     	= $this->teachers_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array(
			'schoolId'		=> $this->schoolId,
			'image'         => '',
			'statusId'		=> 1,
			'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
			'hidden'        => 1
		);

		if($teacherId = $this->teachers_model->save($data))
		{
			redirect(base_url().'teachers/edit/'.$teacherId);
		}
	}

	public function edit($teacherId)
	{
		$data['row']            	= $this->teachers_model->get($teacherId);
		$data['address_info']		= $this->get_teacher_address($teacherId);
		$data['content']			= 'teachers/teachers_edit_view';
		$this->load->view('include/template', $data);
	}

	public function update($teacherId)
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');
		$documentId = $this->input->post('doc_typeId');
		$document   = $this->input->post('document');

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');

		if($this->teacher_document_check($documentId, $document, $teacherId) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Documento</strong>.</li>';
			$valid  	 = FALSE;
		}

		if($this->teacher_email_check($email, $teacherId) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Email</strong>.</li>';
			$valid       = FALSE;
		}

		$row = $this->teachers_model->get_by(array('teacherId' => $teacherId), TRUE);

		$valid           = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

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
				'doc_typeId'	=> $this->input->post('doc_typeId'),
				'document'		=> $this->input->post('document'),
				'birthday'		=> $this->input->post('birthday'),
				'specialtyId'	=> $this->input->post('specialtyId'),
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone'),
				'statusId'		=> (isset($_POST['statusId'])) ? $this->input->post('statusId') : 0,
				'hidden'		=> 0
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'teachers'
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

			if($this->teachers_model->save($data, $teacherId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($teacherId)
	{
		if($this->teachers_model->save(array('hidden' => 1), $teacherId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	public function add_teacher_address($teacherId)
	{
		$count 	= $this->teachers_address_model->count_by(array('teacherId' => $teacherId, 'hidden' => 0));
		$data 	= array('teacherId' => $teacherId, "count" => $count);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('teachers/widget/address/add_teacher_address_view', $data, TRUE)));
	}

	public function edit_teacher_address($addressId)
	{
		$data = array('row' => $this->teachers_address_model->get($addressId));
		echo json_encode(array('result' => 1, 'view' => $this->load->view('teachers/widget/address/edit_teacher_address_view', $data, TRUE)));
	}

	public function insert_teacher_address($teacherId, $count = 0)
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
				'teacherId'			=> $teacherId,
				'address'    		=> $this->input->post('address'),
				'city'     			=> $this->input->post('city'),
				'province'         	=> $this->input->post('province'),
				'main'				=> ($count == 0) ? 1 : 0,
				'creation_date' 	=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        	=> 0
			);

			if($this->teachers_address_model->save($data))
			{
				echo json_encode(array("result" => 1, 'view' => $this->get_student_address($teacherId)));
			}
		}
	}

	public function update_teacher_address($addressId)
	{
		$this->form_validation->set_rules('address', '<strong>Dirección</strong>', 'trim|required');
		$this->form_validation->set_rules('city', '<strong>Ciudad</strong>', 'trim|required');
		$this->form_validation->set_rules('province', '<strong>Provincia</strong>', 'trim|required');

		$row = $this->teachers_address_model->get_by(array('addressId' => $addressId), TRUE);

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

			if($this->teachers_address_model->save($data, $addressId))
			{
				echo json_encode(array("result" => 1, 'view' => $this->get_student_address($row->teacherId)));
			}
		}
	}

	public function delete_teacher_address($addressId, $teacherId)
	{
		if($this->teachers_address_model->save(array('hidden' => 1), $addressId))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_student_address($teacherId)));
		}
	}

	public function make_main_teacher_address($addressId, $teacherId)
	{
		$this->teachers_address_model->update(array('main' => 0), array('teacherId' => $teacherId));

		if($this->teachers_address_model->save(array('main' => 1), $addressId))
		{
			echo json_encode(array('result' => 1, 'view' => $this->get_student_address($teacherId)));
		}
	}

	public function import()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('teachers/import_teachers_view', $data, TRUE)));
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
				if($this->teacher_document_check($data[$i][2], $data[$i][3]) == TRUE)
				{
					$data_import = array(
						'schoolId'		=> $this->schoolId,
						'first_name'    => $data[$i][0],
						'last_name'     => $data[$i][1],
						'doc_typeId'	=> $this->get_documentId($data[$i][2]),
						'document'		=> $data[$i][3],
						'statusId'		=> 1,
						'email'			=> $data[$i][4],
						'phone'         => $data[$i][5],
						'cellphone'     => $data[$i][6],
						'image'         => '',
						'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
						'hidden'        => 0
					);

					if($teacherId = $this->teachers_model->save($data_import))
					{
						$data_address = array(
							'teacherId' => $teacherId,
							'address' 	=> $data[$i][7],
							'city' 		=> $data[$i][7],
							'province' 	=> $data[$i][7],
							'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
							'main'		=> 1,
							'hidden'	=> 0
						);

						$this->teachers_address_model->save($data_address);
						$success++;
					}
				}
				else
				{
					$skip++;
				}
			}
			else
			{
				$skip++;
			}
		}

		$this->com_files->unlink_image($file);

		return array("success" => $success, "skip" => $skip);
	}

	private function teacher_document_check($documentId, $document, $teacherId = FALSE)
	{
		$where = array('doc_typeId' => $documentId, 'document' => $document, 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($teacherId != FALSE)
		{
			$where['teacherId !='] = $teacherId;
		}

		return ($this->teachers_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}

	private function teacher_email_check($email, $teacherId = FALSE)
	{
		$where = array('LOWER(REPLACE(email," ",""))=' => clear_space($email), 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($teacherId != FALSE)
		{
			$where['teacherId !='] = $teacherId;
		}

		return ($this->teachers_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}

	private function get_documentId($name)
	{
		$main_array = array(
			'1'  => strtolower("Cedula"),
			'2'  => strtolower("Pasaporte")
		);

		return array_search(strtolower($name), $main_array);
	}

	private function get_teacher_address($teacherId)
	{
		$data['teacherId']		= $teacherId;
		$data['address_info']	= $this->teachers_address_model->get_by(array('teacherId' => $teacherId, 'hidden' => 0));
		return $this->load->view('teachers/widget/address/address_view', $data, TRUE);
	}
}
