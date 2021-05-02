<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 20/1/2018
 * Time: 4:59 PM
 */

class MY_Controller extends MX_Controller
{
	public $app_name;

    public function __construct()
    {
        parent::__construct();
        $this->app_name = 'Bibliotech';
		$this->form_validation->set_error_delimiters('<li>', '</li>');
    }
}
