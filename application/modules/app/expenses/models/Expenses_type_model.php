<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_type_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_expenses_type";
        $this->view_name    = "ai_expenses_type";
        $this->primary_key  = "typeId";
        $this->order_by     = "typeId DESC";
    }
}
