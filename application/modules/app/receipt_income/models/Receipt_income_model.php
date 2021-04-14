<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Receipt_income_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_receipt_income";
        $this->view_name    = "ai_receipt_income";
        $this->primary_key  = "receiptId";
        $this->order_by     = "receiptId DESC";
    }
}
