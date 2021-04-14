<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_teachers";
        $this->view_name    = "ai_teachers_view";
        $this->primary_key  = "teacherId";
        $this->order_by     = "teacherId DESC";
    }
}
