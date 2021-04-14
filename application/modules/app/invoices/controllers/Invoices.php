<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Facturas';
		$this->namespace   	= 'app';
		$this->moduleId		= 5;

		$this->load->model('invoices/invoices_model');
		$this->load->model('invoices/invoices_items_model');
		$this->load->model('invoices/invoices_status_model');
		$this->load->model('students/students_model');
		$this->load->model('students/student_family_model');
		$this->load->model('inventory/inventory_model');
		$this->load->model('inventory/inventory_entry_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'invoices/invoices_view';
		$this->load->view('include/template', $data);
	}

	public function datatable()
	{
		if($this->input->is_ajax_request())
		{
			$columns    	= "invoiceId,number,parent_name,amount_total,statusId,status_name,class";
			$result     	= $this->invoices_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);

			echo json_encode(array('data' => $result));
		}
	}

	public function add()
	{
		$data = array(
			'schoolId'		=> $this->schoolId,
			'statusId'		=> 1,
			'date'			=> date('Y-m-d'),
			'creation_date' => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
			'hidden'        => 1
		);

		if($invoiceId = $this->invoices_model->save($data))
		{
			redirect(base_url().'invoices/edit/'.$invoiceId);
		}
	}

	public function edit($invoiceId)
	{
		$data['row']            	= $this->invoices_model->get($invoiceId);
		$data['parents']			= $this->student_family_model->get_parents($this->schoolId);
		$data['number']				= $this->invoices_model->get_last_number($this->schoolId);
		$data['status'] 			= $this->invoices_status_model->get_assoc_list(array("statusId AS id", "name"), array("hidden" => 0), TRUE, FALSE, array(1, 2));
		$data['products']			= $this->inventory_model->get_product_in_invoices($this->schoolId);
		$data['content']			= 'invoices/invoices_edit_view';
		$this->load->view('include/template', $data);
	}

	public function update($invoiceId)
	{
		$error 		= '';
		$valid      = TRUE;

		$this->form_validation->set_rules('parentId','<strong>Padre / Madre</strong>','is_natural_no_zero');
		$this->form_validation->set_rules('statusId', '<strong>Estado</strong>', 'is_natural_no_zero');
		$this->form_validation->set_rules('date', '<strong>Fecha</strong>', 'required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$data = array(
				'number'    	=> $this->invoices_model->get_last_number($this->schoolId),
				'parentId'     	=> $this->input->post('parentId'),
				'description'	=> $this->input->post('invoice_description'),
				'statusId'		=> $this->input->post('statusId'),
				'date'			=> $this->input->post('date'),
				'amount'		=> clear_amount($this->input->post('total_amount')),
				'discount'		=> clear_amount($this->input->post('total_discount')),
				'tax_amount'	=> clear_amount($this->input->post('total_tax_amount')),
				'sub_amount'	=> clear_amount($this->input->post('total_sub_amount')),
				'hidden'		=> 0
			);

			if($this->invoices_model->save($data, $invoiceId))
			{
				$this->save_items($_POST);
				echo json_encode(array("result" => 1));
			}
		}
	}

	public function delete($invoiceId)
	{
		if($this->invoices_model->save(array('hidden' => 1), $invoiceId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	public function cancel($invoiceId)
	{
		if($this->invoices_model->save(array('hidden' => 1), $invoiceId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	public function duplicate($invoiceId)
	{
		if($this->invoices_model->save(array('hidden' => 1), $invoiceId))
		{
			echo json_encode(array('result' => 1));
		}
	}

	public function preview($invoiceId)
	{
		$this->load->view('invoices/invoice_preview_view');
	}

	private function save_items($data)
	{
		foreach ($data['itemId'] AS $key => $value)
		{
			$itemId = $_POST['itemId'][$key];

			$items = array(
				'invoiceId' 	=> $_POST['invoiceId'][$key],
				'typeId' 		=> $_POST['typeId'][$key],
				'productId' 	=> $_POST['productId'][$key],
				'description' 	=> $_POST['description'][$key],
				'quantity' 		=> $_POST['quantity'][$key],
				'price' 		=> clear_amount($_POST['price'][$key]),
				'discount' 		=> clear_amount($_POST['discount'][$key]),
				'tax_amount' 	=> clear_amount($_POST['tax_amount'][$key]),
				'amount' 		=> clear_amount($_POST['amount'][$key]),
			);

			if($itemId == 0)
			{
				$this->invoices_items_model->save($items);
			}
			else
			{
				$this->invoices_items_model->save($items, $itemId);
			}

			if($data['statusId'] == 2 && $items['typeId'] == 1)
			{
				$last_quantity = $this->inventory_model->get_las_quantity($items['productId']);

				if($items['quantity'] <= $last_quantity)
				{
					$inventory_entry = array(
						'inventoryId' 	=> $items['productId'],
						'typeId'		=> 2,
						'quantity'		=> $last_quantity - $items['quantity']
					);

					$this->inventory_entry_model->save($inventory_entry);
				}
			}
		}
	}
}
