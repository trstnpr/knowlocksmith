<?php

	class Test_model extends CI_Model {

	    protected $table = 'cities';
		protected $key = 'id';


	    function __construct()
	    {
	        parent::__construct();
	    }

	  	public function city_count() {
	        return $this->db->count_all($this->table);
	    }

	    public function get_city($limit, $start) {
	        $this->db->limit($limit, $start);
	        $query = $this->db->get($this->table);

	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	   }


	}