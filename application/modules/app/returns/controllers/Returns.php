<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Returns extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Devoluciones';
		$this->namespace   	= 'app';

		$this->load->model('returns/returns_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'returns/returns_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    		= "returnId,full_name,email,statusId";
			$result     		= $this->returns_model->datatable($columns, array("hidden" => 0), TRUE);
			echo json_encode(array('data' => $result));
		}
	}

	public function add($loanId = FALSE)
	{
		$data = array();
		if($loanId != FALSE)
		{
			$data['loanId'] = $loanId;
		}
		echo json_encode(array('result' => 1, 'view' => $this->load->view('returns/returns_new_view', $data, TRUE)));
	}

	public function edit($returnId)
	{
		$data['row'] = $this->returns_model->get($returnId);
		echo json_encode(array('result' => 1, 'view' => $this->load->view('returns/returns_edit_view', $data, TRUE)));
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

			if($this->returns_model->save($data))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function update($returnId)
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

			if($this->returns_model->save($data, $returnId))
			{
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($returnId)
	{
		if($this->returns_model->save(array('hidden' => 1), $returnId))
		{
			echo json_encode(array('result' => 1));
		}
	}
}
