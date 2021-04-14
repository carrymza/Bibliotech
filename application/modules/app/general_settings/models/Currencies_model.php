<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Currencies_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_currency";
        $this->view_name    = "ai_currency";
        $this->primary_key  = "currencyId";
        $this->order_by     = "currencyId DESC";
    }
}
