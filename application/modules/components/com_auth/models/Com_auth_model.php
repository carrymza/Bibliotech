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

    public function auth($domain, $email, $password)
    {
        return $this->db->query("SELECT a.schoolId, a.name AS school_name, a.planId, a.countryId, a.initial_settings, a.expiracy_date, b.userId, b.username, b.first_name, b.last_name, b.email, b.image, b.statusId, b.typeId, b.owner, c.user_qty
								FROM ai_schools AS a 
								LEFT JOIN ai_users AS b ON b.schoolId = a.schoolId 
								LEFT JOIN ai_plans AS c ON c.planId = a.planId
								WHERE a.domain = '$domain' AND b.username = '$email' AND b.password = '$password' AND b.hidden = 0 AND b.statusId = 1")->row();
    }

    public function get_settings_data($schoolId)
	{
		return $this->db->query("SELECT * FROM ai_settings WHERE schoolId = $schoolId")->row();
	}

	public function pr_auth($email, $password)
	{
		return $this->db->query("SELECT * FROM pr_users WHERE username = '$email' AND password = '$password'")->row();
	}

	public function ad_auth($email, $password)
	{
		return $this->db->query("SELECT * FROM ad_users WHERE username = '$email' AND password = '$password'")->row();
	}
}
