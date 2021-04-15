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
}
