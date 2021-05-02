<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loans extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Prestamos';
		$this->namespace   	= 'app';

		$this->load->model('loans/loans_model');
		$this->load->model('editorial/editorial_model');
		$this->load->model('teachers/teachers_model');
		$this->load->model('loans/loans_model');
		$this->load->model('books/books_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'loans/loans_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    		= "loanId,full_name,email,statusId";
			$result     		= $this->loans_model->datatable($columns, array("hidden" => 0), TRUE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('loans/loans_new_view', $data, TRUE)));
	}

	public function edit($loanId)
	{
		$data['row'] = $this->loans_model->get($loanId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('loans/loans_edit_view', $data, TRUE)));
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
				'statusId'      	=> (isset($_POST['statusId'])) ? $_POST['statusId'] : 0,
				'email'      		=> $this->input->post('email'),
				'phone'      		=> $this->input->post('phone'),
				'cellphone'      	=> $this->input->post('cellphone')
			);

			if($this->loans_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($loanId)
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
				'statusId'      	=> (isset($_POST['statusId'])) ? $_POST['statusId'] : 0,
				'email'      		=> $this->input->post('email'),
				'phone'      		=> $this->input->post('phone'),
				'cellphone'      	=> $this->input->post('cellphone')
			);

			if($this->loans_model->save($data, $loanId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($loanId)
	{
		if($this->loans_model->save(array('hidden' => 1), $loanId))
		{
			echo json_encode(array('result' => 1));
		}
	}
}
