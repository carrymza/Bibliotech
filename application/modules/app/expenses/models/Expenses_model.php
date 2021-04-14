<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_expenses";
        $this->view_name    = "ai_expenses_view";
        $this->primary_key  = "expenseId";
        $this->order_by     = "expenseId DESC";
    }
}
