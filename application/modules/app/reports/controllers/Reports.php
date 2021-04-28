<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Reportes';
		$this->namespace   	= 'app';
	}

	public function index()
	{
		redirect(base_url('dashboard'));
	}

	public function inventory_list()
	{
		$this->title			= "Lista de Inventario";
		$data                   = array();
		$data['content']		= 'reports/inventory_list_view';
		$this->load->view('include/template', $data);
	}
}
