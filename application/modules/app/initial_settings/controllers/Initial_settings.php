<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Initial_settings extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->title			= "Configuración Inicial";
		$this->namespace   		= 'app';

		$this->is_logged_in		= (isset($this->session->userdata('app')['userdata']['is_logged_in'])) ? $this->session->userdata('app')['userdata']['is_logged_in']: 0;
		$this->schoolId			= (isset($this->session->userdata('app')['userdata']['schoolId'])) ? $this->session->userdata('app')['userdata']['schoolId'] : 0;
		$this->userId			= (isset($this->session->userdata('app')['userdata']['userId'])) ? $this->session->userdata('app')['userdata']['userId'] : 0;
		$this->settingId		= (isset($this->session->userdata('app')['settings']['settingId'])) ? $this->session->userdata('app')['settings']['settingId'] : 0;
		$this->initial_settings	= (isset($this->session->userdata('app')['userdata']['initial_settings'])) ? $this->session->userdata('app')['userdata']['initial_settings'] : 0;

		$this->securities->is_logged_in($this->is_logged_in);

		if($this->initial_settings == 1)
		{
			//redirect(base_url().'dashboard');
		}

		$this->load->model('school/school_model');
		$this->load->model('general_settings/countries_model');
		$this->load->model('general_settings/language_model');
		$this->load->model('general_settings/currencies_model');
		$this->load->model('general_settings/settings_model');
		$this->load->model('users/users_model');
		$this->load->module('com_files/controller/com_files');
		$this->countries 	= $this->countries_model->get_countries_data();
		$this->languages 	= $this->language_model->get_assoc_list(array("code AS id", "name"));
		$this->currencies 	= $this->currencies_model->get_assoc_list(array("currencyId AS id", "name"), array("status" => 1));
	}

	public function index()
	{
		$this->title			= "Configuración Inicial";
		$data                   = array(
			"school"			=> $this->school_model->get($this->schoolId),
			"userdata"			=> $this->users_model->get($this->userId)
		);

		$this->load->view('initial_settings/initial_settings_view', $data);
	}

	public function save_initial_settings()
	{
		$this->form_validation->set_rules('school_name', '<strong>Nombre</strong>', 'trim|required');
		$this->form_validation->set_rules('domain', '<strong>Dominio</strong>', 'trim|required');
		$this->form_validation->set_rules('username', '<strong>Username</strong>', 'trim|required');

		if($this->form_validation->run($this) == FALSE)
		{
			echo json_encode(array('result' => 0, 'error' => display_error(validation_errors())));
		}
		else
		{
			// School Data
			$data = array(
				'domain'    		=> $this->input->post('domain'),
				'name'    			=> $this->input->post('school_name'),
				'slogan'     		=> $this->input->post('slogan'),
				'email'      		=> $this->input->post('school_email'),
				'phone'     		=> $this->input->post('phone'),
				'countryId'     	=> $this->input->post('countryId'),
				'start_school_year'	=> $this->input->post('start_school_year'),
				'end_school_year'	=> $this->input->post('end_school_year'),
				'typeId'			=> $this->input->post('typeId'),
				'initial_settings'	=> 1
			);

			if(!empty($_FILES))
			{
				$ext                      = substr(strrchr($_FILES['image']['name'], "."), 1);
				$data_file = array(
					'file_name'           => '',
					'file_type'           => $ext,
					'allowed_types'       => 'jpg|png|jpeg',
					'folder'              => 'schools'
				);

				$result            		  = $this->com_files->upload($data_file);

				if($result["result"] != 0)
				{
					$data['image']  = $result['file'];
				}
			}

			$this->school_model->save($data, $this->schoolId);

			// Setting Data
			$setting_data = array(
				'schoolId' 		=> $this->schoolId,
				'language' 		=> $this->input->post('language'),
				'currencyId' 	=> $this->input->post('currencyId')
			);

			$settingId = $this->settings_model->save($setting_data, $this->settingId);
			$setting_data['settingId'] = $settingId;

			// User Data
			$user_data = array(
				'username' 		=> $this->input->post('username'),
				'first_name' 	=> $this->input->post('first_name'),
				'last_name' 	=> $this->input->post('last_name'),
				'email' 		=> $this->input->post('user_email'),
			);
			$this->users_model->save($user_data, $this->userId);

			// Send data to a private function to set the new value in session
			$session = array($data, $user_data, $setting_data);
			$this->save_session_data($session);
			$this->save_extra_data();
			echo json_encode(array("result" => 1, 'url' => base_url('dashboard')));
		}
	}

	private function save_session_data($data)
	{
		$session_data['app'] 									= $this->session->userdata('app');
		$session_data['app']['userdata']['school_name'] 		= $data[0]['name'];
		$session_data['app']['userdata']['initial_settings'] 	= $data[0]['initial_settings'];
		$session_data['app']['userdata']['full_name'] 	 		= $data[1]['first_name'].' '.$data[1]['last_name'];
		$session_data['app']['userdata']['first_name']  		= $data[1]['first_name'];
		$session_data['app']['userdata']['email'] 		 		= $data[1]['email'];
		$session_data['app']['settings']['settingId'] 			= $data[2]['settingId'];
		$session_data['app']['settings']['currencyId'] 			= $data[2]['currencyId'];
		$session_data['app']['settings']['language'] 			= $data[2]['language'];
		$this->session->set_userdata($session_data);
	}

	private function save_extra_data()
	{
		// Calendar Type
		$calendar_type_query = array(
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Reunión', '000FC7')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Presentación', '868EEF')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Excursión', 'F13919')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Cumpleaños', 'F13919')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Gastos', 'B4F704')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Feria', 'F71E04')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Torneos', '04F7C7')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Pagos', 'F71E04')",
			"INSERT INTO ai_calendars_type (schoolId, name, color) VALUES ($this->schoolId, 'Cobro', 'ff6600')",
		);
		$this->school_model->exec_array_query($calendar_type_query);

		// Specialties Data
		$specialties_query = array(
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Lengua Española')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Matemáticas')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Ciencias Naturales')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Química')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Física')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Biología')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Ciencias Sociales')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Historia')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Geografía')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Economía')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Antropología')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Demografía')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Álgebra')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Geometría')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Estadística')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Inglés')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Informática')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Artistica')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Educación física')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Formación Integral, Humana y Religiosa')",
			"INSERT INTO ai_specialties (schoolId, name) VALUES ($this->schoolId, 'Francés')"
		);
		$this->school_model->exec_array_query($specialties_query);

		// Positions Data
		$positions_query = array(
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Cocinero(a)')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Portero(a)')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Secretaria(o)')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Chofer')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Asistente Administrativo')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Docente')",
			"INSERT INTO ai_positions (schoolId, name) VALUES ($this->schoolId, 'Otros')"
		);
		$this->school_model->exec_array_query($positions_query);

		// Diseases Data
		$diseases_query = array(
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Alimentos', 1, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Medicamentos', 1, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Picaduras de insectos', 1, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Otros', 1, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Medicamento de control diario (prevención).', 2, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Medicamento según necesidad (rescate).', 2, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Debido a malestar gastrointestinal (digestivo).', 3, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Por preferencias religiosas o de otra índole.', 3, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Anteojos', 4, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Lentes de contacto', 4, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Irreversibles', 4, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Otros', 4, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Audífonos', 5, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Irreversibles', 5, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Otros', 5, '', 1)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'TDAH', 6, 'Trastorno por Déficit de Atención con Hiperactividad', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Autismo', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Parálisis cerebral', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Retraso en el desarrollo', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Hemofilia', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Cardiopatía congénita', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Fibrosis quística', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Trastornos nutricionales', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Discapacidad física', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Cáncer', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Infección crónica', 6, '', 0)",
			"INSERT INTO ai_diseases (schoolId, name, typeId, title, need_value) VALUES ($this->schoolId, 'Depresión', 6, '', 0)",
		);
		$this->school_model->exec_array_query($diseases_query);

		// Expenses Types Data
		$expenses_types_query = array(
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Alquiler')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Mantenimiento')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Seguros')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Tarjeta de cr&eacute;dito')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Prestamos')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Impuestos')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Salarios')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Cuentas por pagar Proveedores')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Transporte')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Material Gastable de Oficina')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Comunicaciones')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Gastos de Viajes')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Agua')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Energ&iacute;a El&eacute;ctrica')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Publicidad y Mercadeo')",
			"INSERT INTO ai_expenses_types (schoolId, name) VALUES ($this->schoolId, 'Combustible')"
		);
		$this->school_model->exec_array_query($expenses_types_query);

		// Incomes Types Data
		$incomes_types_query = array(
			"INSERT INTO ai_incomes_types (schoolId, name) VALUES ($this->schoolId, 'Pago del año escolar')",
			"INSERT INTO ai_incomes_types (schoolId, name) VALUES ($this->schoolId, 'Guarderia')",
			"INSERT INTO ai_incomes_types (schoolId, name) VALUES ($this->schoolId, 'Alquiler de equipos')"
		);
		$this->school_model->exec_array_query($incomes_types_query);
		$this->insert_income_in_inventory();
	}

	private function insert_income_in_inventory()
	{
		$this->load->model('general_settings/incomes_types');
		$this->load->model('inventory/inventory_model');

		$types = $this->incomes_types->get_by(array('schoolId' => $this->schoolId));

		foreach ($types AS $type)
		{
			$data = array(
				"schoolId" 				=> $this->schoolId,
				"name" 					=> $type->name,
				"creation_date" 		=> timestamp_to_date(gmt_to_local(now(), 'UTC', FALSE), "Y-m-d H:i:s"),
				"for_sale" 				=> 1,
				"product_in_invoice" 	=> 1,
				'typeId'				=> 2
			);

			$this->inventory_model->save($data);
		}
	}
}
