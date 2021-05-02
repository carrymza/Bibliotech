<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Editoriales';
		$this->namespace   	= 'app';

		$this->load->model('editorial/editorial_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'editorial/editorial_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    		= "editorialId,name";
			$result     		= $this->editorial_model->datatable($columns, array("hidden" => 0), FALSE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array();
		echo json_encode(array('result' => 1, 'view' => $this->load->view('editorial/editorial_new_view', $data, TRUE)));
	}

	public function edit($editorialId)
	{
		$data['row'] = $this->editorial_model->get($editorialId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('editorial/editorial_edit_view', $data, TRUE)));
	}

	public function insert()
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'name'    	=> $this->input->post('name'),
			);

			if($this->editorial_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($editorialId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'trim|required');
		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'name'    	=> $this->input->post('name'),
			);

			if($this->editorial_model->save($data, $editorialId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($editorialId)
	{
		if($this->editorial_model->save(array('hidden' => 1), $editorialId))
		{
			echo json_encode(array('result' => 1));
		}
	}
}
