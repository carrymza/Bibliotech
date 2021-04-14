<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_session_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ad_users";
        $this->view_name    = "ad_users";
        $this->primary_key  = "userId";
        $this->order_by     = "userId DESC";
    }

    public function validate_email($email)
    {
        return $this->db->query("SELECT COUNT(*) AS users FROM ad_users WHERE email = '$email' AND hidden = 0")->row()->users;
    }

    public function get_name($email)
    {
        return $this->db->query("SELECT CONCAT(first_name,' ', last_name) AS full_name FROM ad_users WHERE email = '$email'")->row()->full_name;
    }

    public function check_hash($hash)
    {
        $this->db->where('hash', $hash);
        $this->db->select('userId');
        $query = $this->db->get('ad_users');
        return $query->row();
    }
}
