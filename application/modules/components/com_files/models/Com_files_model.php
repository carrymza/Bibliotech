<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_files_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name       = 'ai_docs';
        $this->view_name        = 'ai_docs';
        $this->primary_key      = 'docId';
        $this->order_by         = 'docId DESC';
    }
}
