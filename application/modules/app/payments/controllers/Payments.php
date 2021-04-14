<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Pagos';
		$this->namespace   	= 'app';
		$this->moduleId		= 8;

		$this->load->model('payments/payments_model');
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'payments/payments_view';
		$this->load->view('include/template', $data);
	}
}
