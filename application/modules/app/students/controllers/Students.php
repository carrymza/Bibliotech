<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Estudiantes';
		$this->namespace   	= 'app';

		$this->load->model('students/students_model');
		$this->load->model('students/type_documents_model');

		$this->document_type 	= $this->type_documents_model->get_assoc_list(array('typeId AS id', 'name'), array("hidden" => 0));
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
			$columns    		= "studentId,full_name,email,statusId,document";
			$result     		= $this->students_model->datatable($columns, array("hidden" => 0), TRUE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/students_new_view', $data, TRUE)));
	}

	public function edit($studentId)
	{
		$data['row'] = $this->students_model->get($studentId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('students/students_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required');

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
				'doc_typeId'     	=> $this->input->post('doc_typeId'),
				'document'     		=> $this->input->post('document'),
				'statusId'      	=> (isset($_POST['statusId'])) ? $_POST['statusId'] : 0,
				'email'      		=> $this->input->post('email'),
				'phone'      		=> $this->input->post('phone'),
				'cellphone'      	=> $this->input->post('cellphone')
			);

			if($this->students_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($studentId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required');

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
				'doc_typeId'     	=> $this->input->post('doc_typeId'),
				'document'     		=> $this->input->post('document'),
				'statusId'      	=> (isset($_POST['statusId'])) ? $_POST['statusId'] : 0,
				'email'      		=> $this->input->post('email'),
				'phone'      		=> $this->input->post('phone'),
				'cellphone'      	=> $this->input->post('cellphone')
			);

			if($this->students_model->save($data, $studentId))
			{
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
}
