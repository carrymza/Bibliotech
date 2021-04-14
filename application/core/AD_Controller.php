<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 20/1/2018
 * Time: 4:59 PM
 */

class AD_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_ad_logged_in	= (isset($this->session->userdata('ad')['userdata']['is_ad_logged_in'])) ? $this->session->userdata('ad')['userdata']['is_ad_logged_in']: 0;
        $this->schoolId			= (isset($this->session->userdata('ad')['userdata']['schoolId'])) ? $this->session->userdata('ad')['userdata']['schoolId'] : 0;
        $this->school_name		= (isset($this->session->userdata('ad')['userdata']['school_name'])) ? $this->session->userdata('ad')['userdata']['school_name'] : '';
        $this->countryId		= (isset($this->session->userdata('ad')['userdata']['countryId'])) ? $this->session->userdata('ad')['userdata']['countryId'] : 0;
        $this->userId			= (isset($this->session->userdata('ad')['userdata']['userId'])) ? $this->session->userdata('ad')['userdata']['userId'] : 0;
        $this->full_name		= (isset($this->session->userdata('ad')['userdata']['full_name'])) ? $this->session->userdata('ad')['userdata']['full_name'] : '';
        $this->email			= (isset($this->session->userdata('ad')['userdata']['email'])) ? $this->session->userdata('ad')['userdata']['email'] : '';
        $this->image			= (isset($this->session->userdata('ad')['userdata']['image'])) ? $this->session->userdata('ad')['userdata']['image'] : '';
        $this->typeId			= (isset($this->session->userdata('ad')['userdata']['typeId'])) ? $this->session->userdata('ad')['userdata']['typeId'] : 0;
        $this->owner			= (isset($this->session->userdata('ad')['userdata']['owner'])) ? $this->session->userdata('ad')['userdata']['owner'] : 0;

        $this->securities->is_ad_logged_in($this->is_ad_logged_in);
    }
}
