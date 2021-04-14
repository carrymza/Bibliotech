<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Incomes_types extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_incomes_types";
        $this->view_name    = "ai_incomes_types";
        $this->primary_key  = "typeId";
        $this->order_by     = "typeId DESC";
    }

    public function get_categorizations_types($schoolId)
	{
		return $this->db->query("SELECT a.*, (SELECT 'Ingresos') AS type 
								FROM $this->table_name AS a 
								WHERE a.schoolId = $schoolId
								
								UNION 
								
								SELECT b.*, (SELECT 'Gastos') AS type 
								FROM ai_expenses_types AS b 
								WHERE b.schoolId = $schoolId
								")->result();
	}
}
