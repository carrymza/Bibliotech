<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 20/1/2018
 * Time: 4:59 PM
 */

class APP_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in			= (isset($this->session->userdata('app')['userdata']['is_logged_in'])) ? $this->session->userdata('app')['userdata']['is_logged_in']: 0;
        $this->schoolId				= (isset($this->session->userdata('app')['userdata']['schoolId'])) ? $this->session->userdata('app')['userdata']['schoolId'] : 0;
        $this->planId				= (isset($this->session->userdata('app')['userdata']['planId'])) ? $this->session->userdata('app')['userdata']['planId'] : 0;
        $this->user_qty				= (isset($this->session->userdata('app')['userdata']['user_qty'])) ? $this->session->userdata('app')['userdata']['user_qty'] : 0;
        $this->school_name			= (isset($this->session->userdata('app')['userdata']['school_name'])) ? $this->session->userdata('app')['userdata']['school_name'] : '';
        $this->countryId			= (isset($this->session->userdata('app')['userdata']['countryId'])) ? $this->session->userdata('app')['userdata']['countryId'] : 0;
        $this->userId				= (isset($this->session->userdata('app')['userdata']['userId'])) ? $this->session->userdata('app')['userdata']['userId'] : 0;
        $this->full_name			= (isset($this->session->userdata('app')['userdata']['full_name'])) ? $this->session->userdata('app')['userdata']['full_name'] : '';
        $this->first_name			= (isset($this->session->userdata('app')['userdata']['first_name'])) ? $this->session->userdata('app')['userdata']['first_name'] : '';
        $this->email				= (isset($this->session->userdata('app')['userdata']['email'])) ? $this->session->userdata('app')['userdata']['email'] : '';
        $this->image				= (isset($this->session->userdata('app')['userdata']['image'])) ? $this->session->userdata('app')['userdata']['image'] : '';
        $this->typeId				= (isset($this->session->userdata('app')['userdata']['typeId'])) ? $this->session->userdata('app')['userdata']['typeId'] : 0;
        $this->owner				= (isset($this->session->userdata('app')['userdata']['owner'])) ? $this->session->userdata('app')['userdata']['owner'] : 0;
        $this->menu_type			= (isset($this->session->userdata('app')['userdata']['menu_type'])) ? $this->session->userdata('app')['userdata']['menu_type'] : "";
		$this->initial_settings		= (isset($this->session->userdata('app')['userdata']['initial_settings'])) ? $this->session->userdata('app')['userdata']['initial_settings'] : 0;
		$this->currencyId			= (isset($this->session->userdata('app')['settings']['currencyId'])) ? $this->session->userdata('app')['settings']['currencyId'] : 1;
		$this->settingId			= (isset($this->session->userdata('app')['settings']['settingId'])) ? $this->session->userdata('app')['settings']['settingId'] : 0;
		$this->language				= (isset($this->session->userdata('app')['settings']['language'])) ? $this->session->userdata('app')['settings']['language'] : "es";
		$this->expiration_date		= (isset($this->session->userdata('app')['userdata']['expiracy_date'])) ? $this->session->userdata('app')['userdata']['expiracy_date'] : date('Y-m-d');

		$this->securities->is_logged_in($this->is_logged_in);
    }
}
