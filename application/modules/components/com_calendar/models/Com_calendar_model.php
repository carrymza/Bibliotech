<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_calendar_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name       = 'ai_calendar_events';
        $this->primary_key      = 'eventId';
        $this->order_by         = 'eventId DESC';
    }

	public function get_events($start, $end, $schoolId)
    {
        return $this->db->query("SELECT a.eventId AS eventId, a.userId AS userId, CONCAT( e.first_name, ' ', e.last_name ) AS full_user_name, e.email AS user_email, b.typeId AS typeId, b.name AS type_name, b.color AS color, a.title AS title, a.description AS description, a.date_start AS date_start,
								IF((isnull(a.date_end) OR (a.date_end = '') OR (a.date_end = '0000-00-00')), '*', a.date_end) AS date_end,
								a.date_start AS dtstart,
								IF((a.date_end = '0000-00-00'), '', a.date_end) AS until, a.repeat_type AS repeat_type, a.rrule AS rrule, a.creation_date AS creation_date, a.hidden AS hidden 
								FROM ai_calendar_events a
								LEFT JOIN ai_calendars_type b ON b.typeId = a.typeId
								LEFT JOIN ai_users e ON e.userId = a.userId 
								WHERE a.schoolId = $schoolId AND a.hidden = 0 AND ( date_end >= $start OR date_end = '*' OR date_end >= $end ) 
								GROUP BY a.eventId")->result();
    }
}
