<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Positions_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_positions";
        $this->view_name    = "ai_positions";
        $this->primary_key  = "positionId";
        $this->order_by     = "positionId DESC";
    }
}
