<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Inventario';
		$this->namespace   	= 'app';
		$this->moduleId		= 11;

		$this->load->model('inventory/inventory_model');
		$this->load->model('inventory/inventory_entry_model');
		$this->load->model('students/students_model');
		$this->load->module('com_files/controller/com_files');

		$this->students = $this->students_model->get_assoc_list(array("studentId AS id", "CONCAT(first_name, ' ', last_name) AS name"), array("hidden" => 0, "schoolId" => $this->schoolId), TRUE);
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'inventory/inventory_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "inventoryId,image,name,student_name,price,quantity";
			$result     	= $this->inventory_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('inventory/inventory_new_view', $data, TRUE)));
	}

	public function edit($inventoryId)
	{
		$data['row']                    = $this->inventory_model->get($inventoryId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('inventory/inventory_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 				= '';
		$valid      		= TRUE;
		$belongs_to_student = (isset($_POST['belongs_to_student'])) ? $this->input->post('belongs_to_student') : 0;
		$studentId			= $this->input->post('studentId');

		$this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('date', '<strong>Fecha de Compra</strong>', 'trim|required');
		$this->form_validation->set_rules('price', '<strong>Precio</strong>', 'trim|required');

		$valid           = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($belongs_to_student == 1 && $studentId == 0)
		{
			$error 		.= '<li>Debe seleccionar un estudiante.</li>';
			$valid  	 = FALSE;
		}

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'schoolId'				=> $this->schoolId,
				'name'    				=> $this->input->post('name'),
				'description'   		=> $this->input->post('description'),
				'belongs_to_student' 	=> $belongs_to_student,
				'studentId'				=> $studentId,
				'date'					=> $this->input->post('date'),
				'price'   				=> clear_amount($this->input->post('price')),
				'image'         		=> '',
				'creation_date' 		=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'for_sale'				=> (isset($_POST['for_sale'])) ? $this->input->post('for_sale') : 0,
				'typeId'				=> 1,
				'hidden'        		=> 0
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'inventory'
				);

				$result            = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			if($inventoryId = $this->inventory_model->save($data))
			{
				$data_entry = array(
					'inventoryId' 	=> $inventoryId,
					'typeId'		=> 1,
					'quantity'		=> $this->input->post('quantity')
				);

				$this->inventory_entry_model->save($data_entry);

				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($inventoryId)
	{
		$error 		= '';
		$valid      = TRUE;
		$belongs_to_student = (isset($_POST['belongs_to_student'])) ? $this->input->post('belongs_to_student') : 0;
		$studentId			= $this->input->post('studentId');

		$this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('date', '<strong>Fecha de Compra</strong>', 'trim|required');
		$this->form_validation->set_rules('price', '<strong>Precio</strong>', 'trim|required');

		$row = $this->inventory_model->get_by(array('inventoryId' => $inventoryId), TRUE);

		$valid        	 = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error       	.= validation_errors();

		if($belongs_to_student == 1 && $studentId == 0)
		{
			$error 		.= '<li>Debe seleccionar un estudiante.</li>';
			$valid  	 = FALSE;
		}

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'name'    				=> $this->input->post('name'),
				'description'   		=> $this->input->post('description'),
				'belongs_to_student' 	=> $belongs_to_student,
				'studentId'				=> $studentId,
				'date'					=> $this->input->post('date'),
				'price'   				=> clear_amount($this->input->post('price')),
				'for_sale'				=> (isset($_POST['for_sale'])) ? $this->input->post('for_sale') : 0,
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'inventory'
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

			if($this->inventory_model->save($data, $inventoryId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($inventoryId)
	{
		$result['result'] = ($this->inventory_model->save(array('hidden' => 1), $inventoryId) == TRUE) ? 1 : 0;
		echo json_encode($result);
	}

	public function adjustment($inventoryId)
	{
		$data['row']                    = $this->inventory_model->get($inventoryId);
		$data['last_entry']				= $this->inventory_entry_model->get_last_entry($inventoryId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('inventory/inventory_adjustment_view', $data, TRUE)));
	}

	public function make_adjustment($inventoryId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('quantity', '<strong>Cantidad</strong>', 'trim|required');

		$valid           = ($valid != FALSE)? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data_entry = array(
				'inventoryId' 	=> $inventoryId,
				'typeId'		=> 6,
				'quantity'		=> $this->input->post('quantity')
			);

			if($this->inventory_entry_model->save($data_entry))
			{
				echo json_encode(array("result" => 1));

			}
		}
	}

	public function import()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('inventory/import_inventory_view', $data, TRUE)));
	}

	public function make_import()
	{
		if(!empty($_FILES))
		{
			$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
			$data_file = array(
				'file_name'           => 'inventario',
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

				$data_import = array (
					'schoolId'		=> $this->schoolId,
					'name'    		=> $data[$i][0],
					'description'   => $data[$i][1],
					'price'			=> clear_amount($data[$i][2]),
					'date'			=> $data[$i][3],
					'image'         => '',
					'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
					'hidden'        => 0
				);

				if($inventoryId = $this->inventory_model->save($data_import))
				{
					$data_entry = array(
						'inventoryId' 	=> $inventoryId,
						'typeId'		=> 1,
						'quantity'		=> $data[$i][4]
					);

					$this->inventory_entry_model->save($data_entry);
				}

				$success++;
			}
		}

		$this->com_files->unlink_image($path);

		return array("processed" => $processed, "success" => $success, "skip" => $skip);
	}
}
