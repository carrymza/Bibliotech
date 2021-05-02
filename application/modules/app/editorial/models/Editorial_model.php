<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Editorial_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_editorials";
        $this->view_name    = "ai_editorials_view";
        $this->primary_key  = "editorialId";
        $this->order_by     = "editorialId DESC";
    }

    public function get_all_editorial()
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE hidden = 0")->result();

		$option[0] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[$row->editorialId]['id'] = $row->editorialId;
			$option[$row->editorialId]['name'] = $row->name;
		}

		return $option;
	}
}
