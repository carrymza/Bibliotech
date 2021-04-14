<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_users";
        $this->view_name    = "ai_users_view";
        $this->primary_key  = "userId";
        $this->order_by     = "userId DESC";
    }
}
