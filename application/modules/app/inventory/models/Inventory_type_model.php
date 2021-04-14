<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_type_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_inventory_type";
        $this->view_name    = "ai_inventory_type";
        $this->primary_key  = "typeId";
        $this->order_by     = "typeId DESC";
    }
}
