<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_inventory";
        $this->view_name    = "ai_inventory_view";
        $this->primary_key  = "inventoryId";
        $this->order_by     = "inventoryId DESC";
    }

    public function get_las_quantity($productId)
	{
		return $this->db->query("SELECT IFNULL(a.quantity, 0) AS quantity FROM ai_inventory_entries as a WHERE a.inventoryId = $productId ORDER BY entryId DESC LIMIT 1")->row()->quantity;
	}

    public function get_product_in_invoices($schoolId)
	{
		$result = $this->db->query("SELECT a.*, get_quantity(a.inventoryId) AS quantity FROM $this->table_name AS a 
									WHERE a.schoolId = $schoolId AND a.product_in_invoice = 1 AND a.hidden = 0 OR a.schoolId = $schoolId AND a.for_sale = 1 AND a.hidden = 0")->result();

		$options[''][0]['name'] = "Seleccione una Opción";

		foreach ($result as $row) {
			$options[''][$row->inventoryId]['id'] 					= $row->inventoryId;
			$options[''][$row->inventoryId]['name'] 				= $row->name;
			$options[''][$row->inventoryId]['data']['quantity'] 	= $row->quantity;
			$options[''][$row->inventoryId]['data']['description'] 	= $row->description;
			$options[''][$row->inventoryId]['data']['price'] 		= $row->price;
			$options[''][$row->inventoryId]['data']['typeId'] 		= $row->typeId;
		}

		return $options;
	}
}
