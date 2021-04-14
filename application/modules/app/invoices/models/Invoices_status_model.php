<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_status_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_invoices_status";
        $this->view_name    = "ai_invoices_status";
        $this->primary_key  = "statusId";
        $this->order_by     = "statusId DESC";
    }
}
