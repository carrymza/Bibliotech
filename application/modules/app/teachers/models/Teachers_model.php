<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_teachers";
        $this->view_name    = "ai_teachers_view";
        $this->primary_key  = "teacherId";
        $this->order_by     = "teacherId DESC";
    }

    public function get_all_teachers($schoolId)
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE hidden = 0")->result();

		$option[0] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[$row->teacherId]['id'] = $row->teacherId;
			$option[$row->teacherId]['name'] = $row->first_name.' '.$row->last_name;
		}

		return $option;
	}
}
