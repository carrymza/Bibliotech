<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_invoices";
        $this->view_name    = "ai_invoices_view";
        $this->primary_key  = "invoiceId";
        $this->order_by     = "invoiceId DESC";
    }
}
