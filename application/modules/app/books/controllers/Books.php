<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Libros';
		$this->namespace   	= 'app';

		$this->load->model('books/books_model');
		$this->load->model('editorial/editorial_model');
		$this->editorials = $this->editorial_model->get_all_editorial();
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
			$columns    		= "bookId,title,author,edition,quantity";
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

		$this->form_validation->set_rules('title', '<strong>Titulo</strong>', 'trim|required');
		$this->form_validation->set_rules('author', '<strong>Autor</strong>', 'trim|required');
		$this->form_validation->set_rules('quantity', '<strong>Cantidad disponible</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'title'    			=> $this->input->post('title'),
				'author'     		=> $this->input->post('author'),
				'edition'     		=> $this->input->post('edition'),
				'publication_date' 	=> $this->input->post('publication_date'),
				'editorialId' 		=> $this->input->post('editorialId'),
				'quantity' 			=> $this->input->post('quantity'),
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

		$this->form_validation->set_rules('title', '<strong>Titulo</strong>', 'trim|required');
		$this->form_validation->set_rules('author', '<strong>Autor</strong>', 'trim|required');
		$this->form_validation->set_rules('quantity', '<strong>Cantidad disponible</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'title'    			=> $this->input->post('title'),
				'author'     		=> $this->input->post('author'),
				'edition'     		=> $this->input->post('edition'),
				'publication_date' 	=> $this->input->post('publication_date'),
				'editorialId' 		=> $this->input->post('editorialId'),
				'quantity' 			=> $this->input->post('quantity'),
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
