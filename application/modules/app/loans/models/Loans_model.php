<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loans_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_loans";
        $this->view_name    = "ai_loans_view";
        $this->primary_key  = "loanId";
        $this->order_by     = "loanId DESC";
    }

    public function get_loan_data($loanId)
	{
		return $this->db->query("SELECT a.loanId, a.person_typeId, a.return_date, a.statusId,d.name AS status_name, a.return_date,
       							IF(a.person_typeId = 1, 'Estudiante', 'Docente') AS person_type,
								IF(a.person_typeId = 1, CONCAT( b.first_name, ' ', b.last_name ), CONCAT( c.first_name, ' ', c.last_name )) AS full_name,
								FROM ai_loans AS a
								LEFT JOIN ai_students AS b ON b.studentId = a.personId
								LEFT JOIN ai_teachers AS c ON c.teacherId = a.personId
								LEFT JOIN ai_loans_status AS d ON d.statusId = a.statusId
								WHERE a.loanId = $loanId")->row();
	}

	public function all_loans()
	{
		$result = $this->db->query("SELECT a.loanId, a.person_typeId, IF(a.person_typeId = 1, 'Estudiante', 'Docente') AS person_type,
								IF(a.person_typeId = 1, CONCAT( b.first_name, ' ', b.last_name ), CONCAT( c.first_name, ' ', c.last_name )) AS full_name,
								FROM ai_loans AS a
								LEFT JOIN ai_students AS b ON b.studentId = a.personId
								LEFT JOIN ai_teachers AS c ON c.teacherId = a.personId
								WHERE a.hidden = 0 AND a.statusId = 2")->result();

		$option[''][0]["name"] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[''][$row->loanId]['id'] = $row->loanId;
			$option[''][$row->loanId]['name'] = $row->full_name;
			$option[''][$row->loanId]['data']['person_type'] = $row->person_type;
			$option[''][$row->loanId]['data']['person_typeId'] = $row->person_typeId;
		}

		return $option;
	}
}
