<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General_settings extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       	= 'Configuración General';
		$this->namespace   	= 'app';
		$this->moduleId		= 13;

		$this->load->model('school/school_model');
		$this->load->model('general_settings/specialties_model');
		$this->load->model('general_settings/diseases_model');
		$this->load->model('employees/positions_model');
		$this->load->model('calendar/calendar_type_model');
		$this->load->model('general_settings/incomes_types');
		$this->load->model('general_settings/settings_model');
	}

	public function index()
	{
		$data						= array();
		$data['row']            	= $this->school_model->get($this->schoolId);
		$data['specialties']		= $this->specialties_model->get_by(array('schoolId' => $this->schoolId));
		$data['positions']			= $this->positions_model->get_by(array('schoolId' => $this->schoolId));
		$data['calendar_types'] 	= $this->calendar_type_model->get_by(array('schoolId' => $this->schoolId));
		$data['categorizations']	= $this->incomes_types->get_categorizations_types($this->schoolId);
		$data['content']			= 'general_settings/general_settings_view';
		$this->load->view('include/template', $data);
	}

	public function datatable($type = '')
	{
		if($this->input->is_ajax_request())
		{
			switch ($type)
			{
				case "specialties":
					$columns    	= "inventoryId,image,name,student_name,price,quantity";
					$result     	= $this->specialties_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);
					echo json_encode(array('data' => $result));
				break;
				case "positions":
					$columns    	= "inventoryId,image,name,student_name,price,quantity";
					$result     	= $this->positions_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);
					echo json_encode(array('data' => $result));
				break;
				case "diseases":
					$columns    	= "inventoryId,image,name,student_name,price,quantity";
					$result     	= $this->diseases_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);
					echo json_encode(array('data' => $result));
				break;
				case "calendar":
					$columns    	= "inventoryId,image,name,student_name,price,quantity";
					$result     	= $this->calendar_type_model->datatable($columns, array("schoolId" => $this->schoolId), TRUE);
					echo json_encode(array('data' => $result));
				break;
				case "categorization":
					$columns    	= "inventoryId,image,name,student_name,price,quantity";
					$result     	= $this->incomes_types->datatable($columns, array("schoolId" => $this->schoolId), TRUE);
					echo json_encode(array('data' => $result));
				break;
			}
		}
	}

	public function change_language($lang)
	{
		$this->settings_model->save(array('language' => $lang), $this->settingId);
		$session_data['app'] 							= $this->session->userdata('app');
		$session_data['app']['settings']['language']	= $lang;
		$this->session->set_userdata($session_data);
		echo json_encode(array('result' => 1));
	}
}
