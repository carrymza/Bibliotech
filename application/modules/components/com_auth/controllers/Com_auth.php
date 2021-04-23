<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Com_auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('com_auth/com_auth_model');
    }

    public function auth($email, $password)
    {
        $password =  md5($password);
        $row      = $this->com_auth_model->auth($email, $password);

        if($row)
        {
			$session['app'] = array(
				"userdata" 		=> $this->get_user_data($row)
			);

			$this->session->set_userdata($session);
            return true;
        }
        else
        {
            return FALSE;
        }
    }

	private function get_user_data($row)
	{
		return array_merge((array)$row, array(
			'is_logged_in'      => 1,
			'menu_type'			=> "expanded",
		));
	}
}
