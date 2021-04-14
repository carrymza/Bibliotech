<?php
/**
 * Created by PhpStorm.
 * User: Enmanuel
 * Date: 1/6/2019
 * Time: 11:17 AM
 */

class Feedback_model extends MY_Model
{
    public function __construct()
    {
        $this->table_name   = "ai_feedback";
        $this->view_name    = "ai_feedback";
        $this->primary_key  = "feedbackId";
        $this->order_by     = "feedbackId DESC";
    }
}
