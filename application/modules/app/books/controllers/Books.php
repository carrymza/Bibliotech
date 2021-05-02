<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Libros';
		$this->namespace   	= 'app';

		$this->load->model('books/books_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'books/books_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    		= "bookId,full_name,email,statusId";
			$result     		= $this->books_model->datatable($columns, array("hidden" => 0), TRUE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('books/books_new_view', $data, TRUE)));
	}

	public function edit($bookId)
	{
		$data['row'] = $this->books_model->get($bookId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('books/books_edit_view', $data, TRUE)));
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

			if($this->books_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($bookId)
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

			if($this->books_model->save($data, $bookId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($bookId)
	{
		if($this->books_model->save(array('hidden' => 1), $bookId))
		{
			echo json_encode(array('result' => 1));
		}
	}
}
