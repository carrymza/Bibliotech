<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Specialties_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_specialties";
        $this->view_name    = "ai_specialties";
        $this->primary_key  = "specialtyId";
        $this->order_by     = "specialtyId DESC";
    }
}
