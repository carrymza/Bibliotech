<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_diseases_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_student_diseases";
        $this->view_name    = "ai_student_diseases";
        $this->primary_key  = "diseaseId";
        $this->order_by     = "diseaseId DESC";
    }

    public function check_if_student_has_disease($studentId, $key)
	{
		$result = $this->db->query("SELECT `diseaseId` FROM `ai_student_diseases` WHERE `studentId` = $studentId AND `typeId` = $key AND `hidden` = 0")->row();
		return ($result == null) ? 0 : $result->diseaseId;
	}

	public function get_diseases_data($studentId)
	{
		$result     = array();
		$diseases 	= $this->db->query("SELECT * FROM $this->table_name WHERE studentId = $studentId")->result();

		foreach($diseases AS $row)
		{
			$diseases_items 		= $this->db->query("SELECT * FROM ai_student_diseases_items WHERE diseaseId = $row->diseaseId AND hidden = 0")->result();
			$result[$row->typeId] 	= (object) array_merge((array) $row, (array) array("items" => $this->prepare_data($diseases_items)));
		}

		return $result;
	}

	private function prepare_data($data)
	{
		$result     = array();

		foreach($data AS $row)
		{
			$result[$row->key] = $row;
		}

		return $result;
	}
}
