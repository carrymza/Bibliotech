<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_payments";
        $this->view_name    = "ai_payments";
        $this->primary_key  = "paymentId";
        $this->order_by     = "paymentId DESC";
    }
}
