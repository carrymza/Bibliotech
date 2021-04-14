<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Relationship_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_relationships";
        $this->view_name    = "ai_relationships";
        $this->primary_key  = "relationshipId";
        $this->order_by     = "relationshipId DESC";
    }
}
