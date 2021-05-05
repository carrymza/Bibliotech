<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Docentes';
		$this->namespace   	= 'app';

		$this->load->model('teachers/teachers_model');
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
			$columns    		= "teacherId,full_name,email,statusId,document";
			$result     		= $this->teachers_model->datatable($columns, array("hidden" => 0), TRUE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('teachers/teachers_new_view', $data, TRUE)));
	}

	public function edit($teacherId)
	{
		$data['row'] = $this->teachers_model->get($teacherId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('teachers/teachers_edit_view', $data, TRUE)));
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

			if($this->teachers_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($teacherId)
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
}
