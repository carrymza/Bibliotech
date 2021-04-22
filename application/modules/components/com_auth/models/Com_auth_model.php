<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Com_auth_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_users";
        $this->view_name    = "ai_users";
        $this->primary_key  = "userId";
        $this->order_by     = "userId DESC";
    }

    public function auth($email, $password)
    {
        return $this->db->query("SELECT * FROM ai_users WHERE email = '$email' AND password = '$password' AND hidden = 0 AND statusId = 1")->row();
    }
}
