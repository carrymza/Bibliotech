<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       = 'Dashboard';
		$this->namespace   = 'app';
		$this->moduleId		= 1;
		$this->load->model('students/students_model');
		$this->load->model('loans/loans_model');
		$this->load->model('books/books_model');
		$this->load->model('teachers/teachers_model');
	}

	public function index()
	{
		$data                   = array();
		$data['header_data']	= $this->load_header_data();
		$data['content']		= 'dashboard/dashboard_view';
		$this->load->view('include/template', $data);
	}

	private function load_header_data()
	{
		return array(
			'students'  => $this->students_model->count_by(array("hidden" => 0)),
			'books'  => $this->books_model->count_by(array("hidden" => 0)),
			'loans'  => $this->loans_model->count_by(array("hidden" => 0)),
			'teachers'  => $this->teachers_model->count_by(array("hidden" => 0)),
		);
	}
}
