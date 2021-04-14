<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Securities
{
	var $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function is_logged_in($is_logged_in)
	{
		if(!isset($is_logged_in) || $is_logged_in != 1)
		{
			$redirect = $this->CI->uri->segment(1);

			if($this->CI->input->is_ajax_request())
			{
				echo json_encode(array('result' => 0, 'is_logged_in' => false, 'redirect' => $redirect));
				exit();
			}

			redirect(base_url().'login/'.$redirect, 'refresh');
		}
	}

	public function is_ad_logged_in($is_ad_logged_in)
	{
		if(!isset($is_ad_logged_in) || $is_ad_logged_in != 1)
		{
			$redirect = $this->CI->uri->segment(1);

			if($this->CI->input->is_ajax_request())
			{
				echo json_encode(array('result' => 0, 'is_ad_logged_in' => false, 'redirect' => $redirect));
				exit();
			}

			redirect(base_url().'login/'.$redirect, 'refresh');
		}
	}

	public function is_pr_logged_in($is_pr_logged_in)
	{
		if(!isset($is_pr_logged_in) || $is_pr_logged_in != 1)
		{
			$redirect = $this->CI->uri->segment(2);

			if($this->CI->input->is_ajax_request())
			{
				echo json_encode(array('result' => 0, 'is_pr_logged_in' => false, 'redirect' => $redirect));
				exit();
			}

			redirect(base_url().'pr/login/'.$redirect, 'refresh');
		}
	}

	public function is_initial_settings_completed($initial_settings)
	{
		if(!isset($initial_settings) || $initial_settings == 0)
		{
			if($this->CI->router->fetch_class() !== 'initial_settings')
			{
				redirect(base_url().'initial_settings', 'refresh');
			}
		}
	}

	public function check_subscription($expiration_date)
	{
		if(strtotime(date('Y-m-d')) > strtotime($expiration_date))
		{
			$redirect = $this->CI->uri->segment(1);

			if($redirect != 'subscription')
			{
				redirect(base_url().'subscription');
			}
		}
	}
}
