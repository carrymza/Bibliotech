<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_entry_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_inventory_entries";
        $this->view_name    = "ai_inventory_entries";
        $this->primary_key  = "entryId";
        $this->order_by     = "entryId DESC";
    }

    public function get_last_entry($inventoryId)
	{
		return $this->db->query("SELECT * FROM $this->table_name WHERE inventoryId = $inventoryId ORDER BY entryId DESC LIMIT 1")->row();
	}
}
