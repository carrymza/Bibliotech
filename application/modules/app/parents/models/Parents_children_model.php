<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parents_children_model extends MY_Model
{
    public function __construct()
    {
    	$this->table_name   = "ai_parents_childrens";
        $this->view_name    = "ai_parents_childrens";
        $this->primary_key  = "itemId";
        $this->order_by     = "itemId DESC";
    }
}
