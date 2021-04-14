<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name       = 'ai_calendar_events';
        $this->view_name        = 'ai_calendar_events_view';
        $this->primary_key      = 'eventId';
        $this->order_by         = 'eventId DESC';
    }

    public function get_event($eventId)
    {
        return $this->db->query("SELECT * FROM (SELECT @p1:=$this->companyId p) parm, $this->view_name WHERE eventId = $eventId")->row();
    }
}
