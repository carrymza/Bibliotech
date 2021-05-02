<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loans_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_loans";
        $this->view_name    = "ai_loans_view";
        $this->primary_key  = "loanId";
        $this->order_by     = "loanId DESC";
    }
}
