<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_settings";
        $this->view_name    = "ai_settings";
        $this->primary_key  = "settingId";
        $this->order_by     = "settingId DESC";
    }
}
