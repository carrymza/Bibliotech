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
        $this->userId				= (isset($this->session->userdata('app')['userdata']['userId'])) ? $this->session->userdata('app')['userdata']['userId'] : 0;
        $this->first_name			= (isset($this->session->userdata('app')['userdata']['first_name'])) ? $this->session->userdata('app')['userdata']['first_name'] : '';
        $this->last_name			= (isset($this->session->userdata('app')['userdata']['last_name'])) ? $this->session->userdata('app')['userdata']['last_name'] : '';
        $this->email				= (isset($this->session->userdata('app')['userdata']['email'])) ? $this->session->userdata('app')['userdata']['email'] : '';
        $this->image				= base_url('assets/template/app/default/assets/images/avatar-1.png');
        $this->typeId				= (isset($this->session->userdata('app')['userdata']['typeId'])) ? $this->session->userdata('app')['userdata']['typeId'] : 0;
        $this->menu_type			= (isset($this->session->userdata('app')['userdata']['menu_type'])) ? $this->session->userdata('app')['userdata']['menu_type'] : "";

		$this->securities->is_logged_in($this->is_logged_in);
    }
}
