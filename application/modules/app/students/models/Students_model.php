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

    public function get_people()
	{
		$result = $this->db->query("SELECT studentId AS personId, (SELECT 1) AS typeId, CONCAT(first_name, ' ', last_name) AS full_name
       								FROM $this->table_name 
									WHERE hidden = 0 
									UNION
									SELECT teacherId AS personId, (SELECT 2) AS typeId, CONCAT(first_name, ' ', last_name) AS full_name
       								FROM ai_teachers 
									WHERE hidden = 0 ")->result();

		$option[''][0]["name"] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[''][$row->personId]['id'] 	= $row->personId;
			$option[''][$row->personId]['name'] = $row->full_name;
			$option[''][$row->personId]['data']['type'] = $row->typeId;
		}

		return $option;
	}
}
