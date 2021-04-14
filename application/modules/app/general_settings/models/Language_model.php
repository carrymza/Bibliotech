<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_languages";
        $this->view_name    = "ai_languages";
        $this->primary_key  = "languageId";
        $this->order_by     = "languageId DESC";
    }
}
