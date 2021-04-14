<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Parents_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_parents";
        $this->view_name    = "ai_parents_view";
        $this->primary_key  = "parentId";
        $this->order_by     = "parentId DESC";
    }

	public function get_family_members_info($studentId)
	{
		return $this->db->query("SELECT a.*, b.in_charge, c.name AS relationship 
								FROM $this->table_name AS a
								LEFT JOIN ai_parents_childrens AS b ON b.parentId = a.parentId AND b.studentId = $studentId
								LEFT JOIN ai_relationships AS c ON c.relationshipId = b.relationshipId 
								WHERE b.studentId = $studentId AND a.hidden = 0 AND b.hidden = 0")->result();
	}

	public function get_parent_data($parentId, $studentId)
	{
		return $this->db->query("SELECT a.*, b.in_charge, c.relationshipId 
								FROM $this->table_name AS a
								LEFT JOIN ai_parents_childrens AS b ON b.parentId = a.parentId AND b.studentId = $studentId
								LEFT JOIN ai_relationships AS c ON c.relationshipId = b.relationshipId 
								WHERE b.parentId = $parentId AND b.studentId = $studentId AND a.hidden = 0 AND b.hidden = 0")->row();
	}

	public function get_parent_by_document($doc_typeId, $document, $studentId, $schoolId)
	{
		$parent_data = $this->db->query("SELECT * FROM $this->table_name WHERE doc_typeId = $doc_typeId AND REPLACE(document, '-', '') = '$document' AND schoolId = $schoolId AND hidden = 0 LIMIT 1")->row();

		$children    = ($parent_data == null) ? null : $this->db->query("SELECT * FROM ai_parents_childrens WHERE parentId = $parent_data->parentId AND hidden = 0 AND studentId = $studentId")->row();

		return array($parent_data, $children);
	}

	public function get_parents($schoolId)
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE schoolId = $schoolId AND hidden = 0 AND in_charge = 1 GROUP BY document")->result();

		$options[''][0]['name'] = "Seleccione una Opción";

		foreach ($result as $row)
		{
			$options[''][$row->parentId]['id'] 					= $row->parentId;
			$options[''][$row->parentId]['name'] 				= $row->first_name.' '.$row->last_name;
			$options[''][$row->parentId]['data']['doc_typeId'] 	= $row->doc_typeId;
			$options[''][$row->parentId]['data']['document'] 	= $row->document;
		}

		return $options;
	}
}
