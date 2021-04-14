<?php defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_schools";
        $this->view_name    = "ai_schools";
        $this->primary_key  = "schoolId";
        $this->order_by     = "schoolId DESC";
    }
}
