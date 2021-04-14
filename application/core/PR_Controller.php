<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 20/1/2018
 * Time: 4:59 PM
 */

class PR_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in	= (isset($this->session->userdata('pr')['userdata']['is_logged_in'])) ? $this->session->userdata('pr')['userdata']['is_logged_in'] : 0;
        $this->userId		= (isset($this->session->userdata('pr')['userdata']['userId'])) ? $this->session->userdata('pr')['userdata']['userId'] : 0;
        $this->full_name	= (isset($this->session->userdata('pr')['userdata']['full_name'])) ? $this->session->userdata('pr')['userdata']['full_name'] : '';
        $this->email		= (isset($this->session->userdata('pr')['userdata']['email'])) ? $this->session->userdata('pr')['userdata']['email'] : '';
        $this->image		= (isset($this->session->userdata('pr')['userdata']['image'])) ? $this->session->userdata('pr')['userdata']['image'] : '';

        $this->securities->is_pr_logged_in($this->is_pr_logged_in);
    }
}
