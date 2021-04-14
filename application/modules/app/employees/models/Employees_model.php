<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_employees";
        $this->view_name    = "ai_employees_view";
        $this->primary_key  = "employeeId";
        $this->order_by     = "employeeId DESC";
    }
}
