<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends APP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title       		= 'Calendario';
		$this->namespace   		= 'app';
		$this->moduleId			= 4;

		$this->load->model('calendar/calendar_model');
		$this->load->model('calendar/calendar_frequency_model');
		$this->load->model('calendar/calendar_type_model');
		$this->load->model('parents/parents_model');
		$this->load->model('employees/employees_model');
		$this->load->model('teachers/teachers_model');
		$this->load->module('com_calendar/controllers/com_calendar');
		$this->calendar_types 	= $this->calendar_type_model->get_assoc_list(array('typeId AS id', 'name'), array('schoolId' => $this->schoolId, 'hidden' => 0));
		$this->frequencies 		= $this->frecuencies();
		$this->repeat           = array(1 => "Todos los") + $this->numbers();
		$this->weekdays         = $this->weekdays();
	}

	public function index()
	{
		$data                   = array();
		$data['content']		= 'calendar/calendar_view';
		$this->load->view('include/template', $data);
	}

	public function event_details($calendarId, $date)
	{
		$event_data['row']      = $this->calendar_model->get_event($calendarId);
		$event_data['date']     = $date;

		echo json_encode(array('content' => $this->load->view('calendar/calendar_event_view', $event_data, true)));
	}

	public function events($output = FALSE, $start = FALSE, $end = FALSE)
	{
		if($start == FALSE || $start == 'FALSE')
		{
			$start = ($this->input->post('start') !== '') ? date('Y-m-d', strtotime($this->input->post('start'))) : date('Y-m').'-01';
		}

		if($end == FALSE || $end == 'FALSE')
		{
			$end = ($this->input->post('end') !== '') ? date('Y-m-d', strtotime($this->input->post('end'))) : date('Y-m-t');
		}

		$this->com_calendar->events($output, $start, $end, $this->schoolId);
	}

	public function add_event($date = FALSE, $day_click = FALSE)
	{
		$data 					= array();
		$data['current_date'] 	= ($date == FALSE) ? date("Y-m-d") : $date;
		$data['employees']		= $this->employees_model->get_assoc_list(array('employeeId AS id', 'CONCAT(first_name," ", last_name) AS name'), array("schoolId" => $this->schoolId, "hidden" => 0));
		$data['parents']		= $this->parents_model->get_assoc_list(array('parentId AS id', 'CONCAT(first_name," ", last_name) AS name'), array("schoolId" => $this->schoolId, "hidden" => 0));
		$data['teachers']		= $this->teachers_model->get_assoc_list(array('teacherId AS id', 'CONCAT(first_name," ", last_name) AS name'), array("schoolId" => $this->schoolId, "hidden" => 0));
		echo ($day_click == FALSE) ? json_encode(array('result' => 1, 'view' => $this->load->view('calendar/add_event_view', $data, TRUE))) : json_encode(array('result' => $this->load->view('calendar/add_event_view', $data, TRUE)));
	}

	public function insert_event()
	{
		$error = '';
		$valid = TRUE;

		$this->form_validation->set_rules('title', "<strong>Título</strong>", 'trim|required');

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($this->input->post('freq') == 'WEEKLY')
		{
			$valid 	= (isset($_POST['byday'])) ? TRUE : FALSE;
			$error .= (isset($_POST['byday'])) ? "" : "<li>Elija un dia</li>";
		}

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$rrule  = ($_POST['freq'] != '0') ? $this->com_calendar->rrule_composer($_POST) : '';

			$event = array(
				'userId'            => $this->userId,
				'typeId'        	=> $this->input->post('calendar_typeId'),
				'schoolId'         	=> $this->schoolId,
				'title'       		=> $this->input->post('title'),
				'description'  		=> $this->input->post('description'),
				'date_start'        => $this->input->post('date'),
				'date_end'          => $this->input->post('until'),
				'repeat_type'       => 2,
				'rrule'             => $rrule,
				'creation_date'     => timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				'send_reminder'		=> (isset($_POST['send_reminder'])) ? $this->input->post('send_reminder') : 0,
				'recipients'		=> (isset($_POST['send_reminder'])) ? $this->recipients_rule($_POST) : ''
			);

			if($this->calendar_model->save($event))
			{
				echo json_encode(array('result' => 1));
			}
		}
	}

	public function edit_event($eventId)
	{
		$data['row']        = $this->calendar_model->get_event($eventId);
		$data['rrule']      = ($data['row']->rrule != '') ? $this->com_calendar->rrule_decomposer($data['row']->rrule) : array('freq' => '', 'interval' => 0);
		$result['result']   = $this->load->view('calendar/calendar_event_edit_view', $data, TRUE);
		echo json_encode($result);
	}

	public function update_event($eventId)
	{
		$error = '';
		$valid = TRUE;

		$this->validation->set_rule('title', "Título", array('required'));
		$this->validation->set_rule('dtstart', "Fecha", array('required'));
		$this->validation->set_rule('typeId', "tipo", array('required'));

		$valid           = ($valid != FALSE) ? $this->form_validation->run($this) : $valid;
		$error          .= validation_errors();

		if($this->input->post('freq') == 'WEEKLY')
		{
			$valid  = (isset($_POST['byday'])) ? TRUE : FALSE;
			$error .= (isset($_POST['byday'])) ? "" : "<li>Elija un dia</li>";
		}

		if($valid == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error($error)));
		}
		else
		{
			$rrule  = ($_POST['freq'] != '0') ? $this->com_calendar->rrule_composer($_POST) : '';

			$event = array(
				'typeId'        	=> $this->input->post('typeId'),
				'schoolId'         	=> $this->schoolId,
				'title'       		=> $this->input->post('title'),
				'description'  		=> $this->input->post('description'),
				'date_start'        => $this->input->post('dtstart'),
				'date_end'          => $this->input->post('until'),
				'all_day'           => $this->input->post('all_day'),
				'time_start'        => $this->input->post('time_start'),
				'time_end'          => $this->input->post('time_end'),
				'repeat_type'       => $this->input->post('repeat_type'),
				'rrule'             => $rrule
			);

			if($this->calendar_model->save($event, $eventId))
			{
				echo json_encode(array('result' => 1));
			}
		}
	}

	public function delete_event($eventId)
	{
		$result = ($this->calendar_model->save(array('hidden' => 1), $eventId) == TRUE) ? 1 : 0;
		echo json_encode(array('result' => $result));
	}

	private function recipients_rule($data)
	{
		$array = array(
			"active_teachers" 		=> (isset($data['active_teachers'])) ? $data['active_teachers'] : 0,
			"all_teachers" 			=> (isset($data['all_teachers'])) ? 1 : 0,
			"teachers_recipients" 	=> (isset($data['teachers_recipients'])) ? array_to_string($data['teachers_recipients']) : '',
			"active_employees" 		=> (isset($data['active_employees'])) ? $data['active_employees'] : 0,
			"all_parents" 			=> (isset($data['all_teachers'])) ? 1 : 0,
			"parents_recipients" 	=> (isset($data['parents_recipients'])) ? array_to_string($data['parents_recipients']) : '',
			"active_employees" 		=> (isset($data['active_employees'])) ? $data['active_employees'] : 0,
			"all_employees" 		=> (isset($data['all_employees'])) ? 1 : 0,
			"employees_recipients" 	=> (isset($data['employees_recipients'])) ? array_to_string($data['employees_recipients']) : '',
		);

		return rule_composer($array);
	}

	private function frecuencies()
	{
		$result = $this->calendar_frequency_model->get_by(array());

		$option = array();

		foreach ($result AS $row)
		{
			$option[$row->frequencyId]['id']			= $row->rrule;
			$option[$row->frequencyId]['name']			= $row->name;
			$option[$row->frequencyId]['data']['text']	= $row->text;
		}

		return $option;
	}

	private function numbers($limit = 31)
	{
		for ($i = 1; $i <= $limit; $i++) {
			$numbers[$i] = $i;
		}

		return $numbers;
	}

	private function weekdays()
	{
		$weekdays = array(
			'SU' => 'D',
			'MO' => 'L',
			'TU' => 'M',
			'WE' => 'M',
			'TH' => 'J',
			'FR' => 'V',
			'SA' => 'S'
		);

		return $weekdays;
	}
}
