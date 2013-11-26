<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Comune_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function load_comune(){
		$this->db->select('*');
		$this->db->from('comuni');
		$this->db->where('show_in_homepage','1');
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
}
?>