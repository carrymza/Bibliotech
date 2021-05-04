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
		$this->load->model('students/students_model');
		$this->load->model('books/books_model');

		$this->people 	= $this->students_model->get_people();
		$this->books	= $this->books_model->get_assoc_list(array("bookId AS id", "title AS name"), array("hidden" => 0));
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
			$columns    		= "loanId,person_typeId,full_name,return_date,book_title,statusId";
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

		$this->form_validation->set_rules('return_date', '<strong>Fecha de retorno</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'personId'    		=> $this->input->post('personId'),
				'person_typeId'     => $this->input->post('person_typeId'),
				'date'				=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'statusId'      	=> $this->input->post('statusId'),
				'bookId'      		=> $this->input->post('bookId'),
				'return_date'      	=> $this->input->post('return_date')
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

		$this->form_validation->set_rules('return_date', '<strong>Fecha de retorno</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'personId'    		=> $this->input->post('personId'),
				'person_typeId'     => $this->input->post('person_typeId'),
				'statusId'      	=> $this->input->post('statusId'),
				'bookId'      		=> $this->input->post('bookId'),
				'return_date'      	=> $this->input->post('return_date')
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
