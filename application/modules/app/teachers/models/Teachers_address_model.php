<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_address_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_teachers_address";
        $this->view_name    = "ai_teachers_address";
        $this->primary_key  = "addressId";
        $this->order_by     = "addressId DESC";
    }
}
