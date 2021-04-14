<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diseases_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_diseases";
        $this->view_name    = "ai_diseases";
        $this->primary_key  = "diseaseId";
        $this->order_by     = "diseaseId DESC";
    }

    public function get_diseases_by_type($schoolId)
	{
		$result 	= array();
		$types		= $this->db->query("SELECT * FROM ai_diseases_types")->result();

		foreach ($types AS $type)
		{
			$diseases 	= $this->db->query("SELECT * FROM ai_diseases WHERE typeId = $type->typeId AND hidden = 0 AND schoolId = $schoolId")->result();
			$result[$type->typeId] = $diseases;
		}

		return $result;
	}
}
