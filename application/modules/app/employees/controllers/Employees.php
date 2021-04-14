<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Empleados';
		$this->namespace   = 'app';
		$this->moduleId		= 10;

		$this->load->model('employees/employees_model');
		$this->load->model('employees/positions_model');
		$this->load->model('general_settings/type_documents_model');
		$this->load->module('com_files/controller/com_files');

		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
		$this->positions 		= $this->positions_model->get_assoc_list(array('positionId AS id', 'name'), array("hidden" => 0, 'schoolId' => $this->schoolId), TRUE);
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'employees/employees_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "employeeId,image,full_name,document,position_name,statusId";
			$result     	= $this->employees_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('employees/employees_new_view', $data, TRUE)));
	}

	public function edit($employeeId)
	{
		$data['row']                    = $this->employees_model->get($employeeId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('employees/employees_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');
		$documentId = $this->input->post('doc_typeId');
		$document   = $this->input->post('document');
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');
		$this->form_validation->set_rules('positionId','<strong>Posición</strong>','is_natural_no_zero');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		if($this->input->post('positionId') == 7)
		{
			$this->form_validation->set_rules('position_name', '<strong>Posición / Otros</strong>', 'trim|required');
		}

		if($this->employee_document_check($documentId, $document) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Documento</strong>.</li>';
			$valid  	 = FALSE;
		}

		if($this->employee_email_check($email) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Email</strong>.</li>';
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
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'         => $email,
				'doc_typeId'	=> $documentId,
				'document'		=> $document,
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone'),
				'positionId'	=> $this->input->post('positionId'),
				'position_name'	=> $this->input->post('position_name'),
				'statusId'		=> (isset($_POST['statusId'])) ? $this->input->post('statusId') : 0,
				'image'         => '',
				'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'hidden'        => 0
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'employees'
				);

				$result            = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($this->employees_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($employeeId)
	{
		$error 		= '';
		$valid      = TRUE;
		$email      = $this->input->post('email');
		$documentId = $this->input->post('doc_typeId');
		$document   = $this->input->post('document');
		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');
		$this->form_validation->set_rules('positionId','<strong>Posición</strong>','is_natural_no_zero');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');

		if($this->input->post('positionId') == 7)
		{
			$this->form_validation->set_rules('position_name', '<strong>Posición / Otros</strong>', 'trim|required');
		}

		$row = $this->employees_model->get_by(array('employeeId' => $employeeId), TRUE);

		if($this->employee_document_check($documentId, $document, $employeeId) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Documento</strong>.</li>';
			$valid       = FALSE;
		}

		if($this->employee_email_check($email, $employeeId) == FALSE)
		{
			$error 		.= '<li>Ya existe un empleado con este <strong>Email</strong>.</li>';
			$valid    	 = FALSE;
		}

		$valid        	 = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
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
				'doc_typeId'	=> $documentId,
				'document'		=> $document,
				'positionId'	=> $this->input->post('positionId'),
				'position_name'	=> $this->input->post('position_name'),
				'statusId'		=> (isset($_POST['statusId'])) ? $this->input->post('statusId') : 0,
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'employees'
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

			if($this->employees_model->save($data, $employeeId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($employeeId)
	{
		$result['result'] = ($this->employees_model->save(array('hidden' => 1), $employeeId) == TRUE) ? 1 : 0;
		echo json_encode($result);
	}

	public function import()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('employees/import_employees_view', $data, TRUE)));
	}

	public function make_import()
	{
		if(!empty($_FILES))
		{
			$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
			$data_file = array(
				'file_name'           => 'empleado',
				'file_type'           => $ext,
				'allowed_types'       => 'csv|xls|xlsx|ods',
				'folder'              => 'imports'
			);

			$result            = $this->com_files->upload($data_file, TRUE);

			if($result["result"] != 0)
			{
				$response = $this->save_data_import($result['file']);
				echo json_encode(array('result' => 1, "processed" => $response['processed'],  "success" => $response['success'], "skip" => $response['skip']));
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
		$processed  = 0;

		for($i = 1; $i < count($data); $i++)
		{
			if($data[$i][0] != '' || $data[$i][0] != 0)
			{
				$processed++;
				if(($data[$i][2] != 0 || $data[$i][2] != '') && ($data[$i][3] != 0 || $data[$i][3] != ''))
				{
					if($this->employee_document_check($data[$i][2], $data[$i][3]) == TRUE)
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
							'positionId'    => $this->get_positionId_by_name($data[$i][7]),
							'image'         => '',
							'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
							'hidden'        => 0
						);

						$this->employees_model->save($data_import);
						$success++;
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
		}

		$this->com_files->unlink_image($path);

		return array("processed" => $processed, "success" => $success, "skip" => $skip);
	}

	private function employee_document_check($documentId, $document, $employeeId = FALSE)
	{
		$where = array('doc_typeId' => $documentId, 'REPLACE(document,"-","")=' => remove_character('-','',$document), 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($employeeId != FALSE)
		{
			$where['employeeId !='] = $employeeId;
		}

		return ($this->employees_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}

	private function employee_email_check($email, $employeeId = FALSE)
	{
		$where = array('LOWER(REPLACE(email," ",""))=' => clear_space($email), 'schoolId' => $this->schoolId, 'hidden' => 0);

		if($employeeId != FALSE)
		{
			$where['employeeId !='] = $employeeId;
		}

		return ($this->employees_model->in_table_by($where) > 0) ? FALSE : TRUE;
	}

	private function get_positionId_by_name($name)
	{
		$main_array = array(
			'1'  => strtolower("Cocinero(a)"),
			'2'  => strtolower("Portero(a)"),
			'3'  => strtolower("Secretaria(o)"),
			'4'  => strtolower("Chofer"),
			'5'  => strtolower("Asistente Administrativo"),
			'6'  => strtolower("Docente"),
			'7'  => strtolower("Otros")
		);

		return array_search(strtolower($name), $main_array);
	}

	private function get_documentId($name)
	{
		$main_array = array(
			'1'  => strtolower("Cedula"),
			'2'  => strtolower("Pasaporte")
		);

		return array_search(strtolower($name), $main_array);
	}
}
