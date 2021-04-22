<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Session_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_users";
        $this->view_name    = "ai_users";
        $this->primary_key  = "userId";
        $this->order_by     = "userId DESC";
    }

    public function validate_user($email)
    {
        return $this->db->query("SELECT COUNT(userId) AS users FROM ai_users WHERE email = '$email' AND a.hidden = 0")->row()->users;
    }

    public function get_name($email)
    {
        return $this->db->query("SELECT CONCAT(first_name,' ', last_name) AS full_name FROM ai_users WHERE email = '$email'")->row()->full_name;
    }

    public function check_hash($hash)
    {
        $this->db->where('hash', $hash);
        $this->db->select('userId');
        $query = $this->db->get('ai_users');
        return $query->row();
    }
}
