<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_type_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name       = 'ai_calendars_type';
        $this->primary_key      = 'typeId';
        $this->order_by         = 'typeId DESC';
    }
}
