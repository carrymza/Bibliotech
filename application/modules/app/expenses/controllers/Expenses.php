<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Gastos / Compras';
		$this->namespace   	= 'app';
		$this->moduleId		= 7;

		$this->load->model('expenses/expenses_model');
		$this->load->model('expenses/expenses_items_model');
		$this->load->model('expenses/expenses_type_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'expenses/expenses_view';
		$this->load->view('include/template', $data);
	}

	public function add()
	{
		$data = array(
			'schoolId'		=> $this->schoolId,
			'statusId'		=> 1,
			'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
			'hidden'        => 1
		);

		if($expenseId = $this->expenses_model->save($data))
		{
			redirect(base_url().'expenses/edit/'.$expenseId);
		}
	}

	public function edit($expenseId)
	{
		$data['row']            	= $this->expenses_model->get($expenseId);
		$data['content']			= 'expenses/expenses_edit_view';
		$this->load->view('include/template', $data);
	}

	public function update($expenseId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('first_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('last_name', '<strong>Apellido</strong>', 'trim|required');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
		$this->form_validation->set_rules('document', '<strong>Documento</strong>', 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'doc_typeId'	=> $this->input->post('doc_typeId'),
				'document'		=> $this->input->post('document'),
				'phone'			=> $this->input->post('phone'),
				'cellphone'		=> $this->input->post('cellphone'),
				'statusId'		=> (isset($_POST['statusId'])) ? $this->input->post('statusId') : 0,
				'hidden'		=> 0
			);

			if($this->expenses_model->save($data, $expenseId))
			{
				$this->save_items($_POST);
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($expenseId)
	{
		if($this->expenses_model->save(array('hidden' => 1), $expenseId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	private function save_items($data)
	{

	}
}
