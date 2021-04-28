<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_students";
        $this->view_name    = "ai_students_view";
        $this->primary_key  = "studentId";
        $this->order_by     = "studentId DESC";
    }

    public function get_all_students($schoolId)
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE hidden = 0")->result();

		$option[0] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[$row->studentId]['id'] = $row->studentId;
			$option[$row->studentId]['name'] = $row->first_name.' '.$row->last_name;
		}

		return $option;
	}
}
