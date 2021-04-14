<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_items_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_invoices_items";
        $this->view_name    = "ai_invoices_items";
        $this->primary_key  = "itemId";
        $this->order_by     = "itemId DESC";
    }
}
