<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sex_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_sex";
        $this->view_name    = "ai_sex";
        $this->primary_key  = "sexId";
        $this->order_by     = "sexId DESC";
    }
}
