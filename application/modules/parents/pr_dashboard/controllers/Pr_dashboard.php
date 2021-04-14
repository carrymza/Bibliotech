<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pr_dashboard extends PR_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Dashboard';
		$this->namespace   = 'parents';
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'pr_dashboard/pr_dashboard_view';
		$this->load->view('include/template', $data);
	}
}
