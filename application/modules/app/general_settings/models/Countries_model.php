<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Countries_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_countries";
        $this->view_name    = "ai_countries";
        $this->primary_key  = "countryId";
        $this->order_by     = "countryId DESC";
    }

    public function get_countries_data()
	{
		$result = $this->db->query("SELECT * FROM $this->table_name WHERE hidden = 0")->result();

		$options[''][0]['name'] = "";

		foreach ($result as $row) {
			$options[''][$row->countryId]['name']                  = $row->name;
			$options[''][$row->countryId]['data']['language']      = $row->language;
			$options[''][$row->countryId]['data']['currencyId']    = $row->currencyId;
		}

		return $options;
	}
}
