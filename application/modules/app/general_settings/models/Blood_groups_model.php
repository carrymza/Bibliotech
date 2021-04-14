<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blood_groups_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_blood_groups";
        $this->view_name    = "ai_blood_groups";
        $this->primary_key  = "groupId";
        $this->order_by     = "groupId DESC";
    }
}
