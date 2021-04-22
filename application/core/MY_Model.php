<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 20/1/2018
 * Time: 5:00 PM
 */

class MY_Model extends CI_Model
{
    public $table_name;
    public $view_name;
    public $primary_key 	= '';
    public $primaryFilter 	= 'intval';
    public $order_by 		= '';

    public function __construct()
    {
        parent::__construct();
//		$this->userId		= (isset($this->session->userdata('app')['userdata']['userId'])) ? $this->session->userdata('app')['userdata']['userId'] : 0;
    }

    /**
     * @param $data
     * @param bool $id
     * @return bool
     */
    public function save($data, $id = FALSE)
    {
        if ($id == FALSE)
        {
            // Insert Data
            $this->db->insert($this->table_name, $data);
        }
        else
        {
            // Update Data
            $filter = $this->primaryFilter;
            $this->db->where($this->primary_key, $filter($id))->update($this->table_name, $data);
        }

        // Return the ID
        return $id == FALSE ? $this->db->insert_id() : $id;
    }

    /**
     * @param bool $module
     * @param bool $where
     * @return mixed
     */
	public function get($ids = FALSE)
	{
		// Check if is a single record or many records
		$single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;

		// Limit results to one or more ids
		if ($ids !== FALSE)
		{
			// always convert to array
			is_array($ids) || $ids = array($ids);

			// Remove any Id that does not match the filter
			$filter = $this->primaryFilter;
			$ids = array_map($filter, $ids);

			$this->db->where_in($this->primary_key, $ids);
		}

		// Set order if not set
		strlen($this->order_by) > 0 || $this->db->order_by($this->order_by);

		// Return results
		$single == FALSE || $this->db->limit(1);
		$method = $single ? 'row' : 'result';
		return $this->db->get($this->table_name)->$method();
	}

    /** return row or result in singles
     * @param bool $where
     * @param bool $single
     * @return mixed
     */
    public function get_by($where = FALSE, $single = FALSE)
    {
        is_array($where) || $where = array($where);
        $single = ($single != FALSE) ? 'row': 'result';

        return $this->db->where($where)->get($this->table_name)->$single();
    }

    /**
     * @param string $columns
     * @param bool $where
     * @param bool $module
     * @return mixed
     */
    public function datatable($columns = "*", $where = FALSE, $module = FALSE, $like = FALSE, $value = FALSE)
    {
        $table = ($module == FALSE) ? $this->table_name : $this->view_name;

        $this->db->select($columns);

        if($where == FALSE)
        {
            return $this->db->get($table)->result();
        }
        else
        {
            if($like == FALSE)
            {
                return $this->db->where($where)->get($table)->result();
            }
            else
            {
                return $this->db->where($where)->like($value)->get($table)->result();
            }
        }
    }

    /**
     * @param string $columns
     * @param bool $where
     * @param bool $module
     * @return mixed
     */
    public function get_columns($columns = "*", $where = FALSE, $module = FALSE, $single = FALSE)
    {
        $table 	= ($module == FALSE) ? $this->table_name : $this->view_name;

        $single = ($single != FALSE) ? 'row': 'result';

        $this->db->select($columns);

        if($where == FALSE)
        {
            return $this->db->get($table)->result();
        }
        else
        {
            return $this->db->where($where)->get($table)->$single();
        }
    }
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $filter = $this->primaryFilter;
        return $this->db->where($this->primary_key, $filter($id))->update($this->table_name, array('hidden' => 1));
    }

    /**
     * @param $id
     * @return mixed
     */
	public function update($data, $where)
	{
		// Update Data
		$result = $this->db->where($where)->update($this->table_name, $data);

		// Return the ID
		return $result;
	}

    /**
     * @param $id
     * @return mixed
     */
    public function get_single($id)
    {
        return $this->db->where($this->primary_key, $id)->get($this->table_name)->row();
    }

    /**
     * @param $columns
     * @param bool $where
     * @return array
     */
    public function get_assoc_list($columns, $where = FALSE, $skip_placeholder = FALSE, $placehoder = FALSE, $where_in = FALSE)
    {
        $this->db->select($columns);

        if($where != FALSE)
        {
            $this->db->where($where);
        }

        if($where_in != FALSE)
        {
            is_array($where_in) || $where_in = array($where_in);

            $this->db->where_in($this->primary_key, $where_in);
        }

        $query 	 = $this->db->get($this->table_name)->result();

        $options = array();

        if($skip_placeholder != FALSE)
		{
			if($placehoder != TRUE)
			{
				$options[0] = "Seleccione una Opci&oacute;n";
			}
			else
			{
				$options[0] = $placehoder;
			}
		}

        foreach ($query AS $row)
        {
            $options[$row->id] = $row->name;
        }

        return $options;
    }

    /**
     * @param $where
     */
    public function count($where)
    {
        is_array($where) || $where = array($where);

        $this->db->where($where);
        $this->db->count_all_results($this->table_name);
    }

    /**
     * @param $where
     */
    public function count_by($where)
    {
        is_array($where) || $where = array($where);

        $this->db->where($where);
        $count = $this->db->count_all_results($this->table_name);
        return $count;
    }

    /**
     * @param $where
     * @return mixed
     */
    public function in_table_by($where)
    {
        is_array($where) || $where = array($where);

        $count = $this->db->where($where)->from($this->table_name)->count_all_results();

        return $count;
    }

    /**
     * Checks if the record belongs to the user's company
     *
     * @param string field
     * @param mixed int or string
     * @return int
     */
    public function if_owner($key, $value)
    {
        $count = $this->db->where(array($key => $value))->from($this->table_name)->count_all_results();
        return $return = ($count > 0) ? TRUE : FALSE;
    }

    public function get_last_number()
	{
		return $this->db->query("SELECT IFNULL(MAX(number), 1000) + 1 AS number FROM $this->table_name WHERE statusId != 0 AND hidden = 0")->row()->number;
	}

	public function exec_array_query($query)
	{
		$this->db->trans_start();

		foreach ($query as $key => $value)
		{
			$this->db->query(mb_convert_encoding($value,'HTML-ENTITIES','UTF-8'));
		}

		$this->db->trans_complete();
	}
}
