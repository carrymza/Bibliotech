<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loans_items_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_loans_items";
        $this->view_name    = "ai_loans_items";
        $this->primary_key  = "itemId";
        $this->order_by     = "itemId DESC";
    }

    public function get_items($loanId)
	{
		return $this->db->query("SELECT a.itemId, a.bookId, a.quantity, b.title AS book_title
								FROM ai_loans_items AS a 
								LEFT JOIN ai_books AS b ON b.bookId = a.bookId 
								LEFT JOIN ai_loans AS c ON c.loanId = a.loanId
								WHERE c.loanId = $loanId")->result();
	}
}
