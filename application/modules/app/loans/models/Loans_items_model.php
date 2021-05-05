<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loans_items_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_loans_items";
        $this->view_name    = "ai_loans_items";
        $this->primary_key  = "itemId";
        $this->order_by     = "itemId DESC";
    }
}
