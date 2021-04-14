<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_frequency_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name       = 'ai_calendar_frequency';
        $this->primary_key      = 'frequencyId';
        $this->order_by         = 'frequencyId DESC';
    }
}
