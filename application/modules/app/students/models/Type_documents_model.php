<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Type_documents_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_type_documents";
        $this->view_name    = "ai_type_documents";
        $this->primary_key  = "typeId";
        $this->order_by     = "typeId DESC";
    }
}
