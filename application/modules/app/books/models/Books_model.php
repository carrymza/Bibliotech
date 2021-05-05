<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_books";
        $this->view_name    = "ai_books_view";
        $this->primary_key  = "bookId";
        $this->order_by     = "bookId DESC";
    }

    public function get_all_books()
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE hidden = 0")->result();

		$option[''][0]['name'] = "Seleccione una Opción";

		foreach ($result AS $row)
		{
			$option[''][$row->bookId]['id'] 				= $row->bookId;
			$option[''][$row->bookId]['name'] 				= $row->title;
			$option[''][$row->bookId]['data']['quantity'] 	= $row->quantity;
		}

		return $option;
	}
}
