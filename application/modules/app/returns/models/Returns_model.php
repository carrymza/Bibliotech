<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Returns_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_returns";
        $this->view_name    = "ai_returns_view";
        $this->primary_key  = "returnId";
        $this->order_by     = "returnId DESC";
    }
}
