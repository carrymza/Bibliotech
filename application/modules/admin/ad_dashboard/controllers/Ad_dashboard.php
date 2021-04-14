<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_dashboard extends AD_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Dashboard';
		$this->namespace   = 'admin';
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'ad_dashboard/ad_dashboard_view';
		$this->load->view('include/template', $data);
	}
}
