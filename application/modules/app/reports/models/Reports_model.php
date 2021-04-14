<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "";
        $this->view_name    = "";
        $this->primary_key  = "";
        $this->order_by     = "";
    }
}
