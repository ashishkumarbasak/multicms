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
	
	function get_total_comune(){
		$this->db->select('*');
		$this->db->from('comuni');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_comune($limit=NULL,$offset=NULL){
		$this->db->select('*');
		$this->db->from('comuni');
		
		if($limit!=NULL)
		$this->db->limit($limit, $offset);		
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function create_new_comune($data){
		$this->db->set('comune_name_it',$data['comune_name']);		
		$this->db->set('show_in_homepage',$data['show_in_homepage']);		
		$this->db->insert('comuni');			
		return $this->db->insert_id();
	}
	
	function delete_comune($comune_id=NULL){
		if($comune_id!=NULL){
			$this->db->where('comune_id',$comune_id);
			$this->db->delete('comuni');			
		}
	}
}
?>