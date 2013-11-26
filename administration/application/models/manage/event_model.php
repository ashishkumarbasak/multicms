<?php

class Event_model extends CI_Model{

	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function save_event($data=NULL){
		if($data!=NULL){
			$this->db->set('event_name',$data['event_name']);
			$this->db->set('event_subtitle',$data['event_subtitle']);
			$this->db->set('event_description',$data['event_description']);
			$this->db->set('event_date',date("Y-m-d",strtotime($data['event_date'])));
			$this->db->set('event_photo',$data['event_photo']);
			$this->db->set('event_file',$data['event_file']);
			$this->db->set('event_start_time',$data['event_time']);
		
			$this->db->insert('events');		
		}
	}
	
	function get_total_events(){
		$this->db->select('*');
		$this->db->from('events');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_events($limit=NULL, $offset=NULL){
		$this->db->select('*');
		$this->db->from('events');
		if($limit!=NULL)
			$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function delete_event($event_id=NULL){
		if($event_id!=NULL){
			$this->db->where('event_id',$event_id);
			$this->db->delete('events');
		}
	}
	
	function get_event_details($event_id=NULL){
		if($event_id!=NULL){
			$this->db->select('*');
			$this->db->from('events');
			$this->db->where('event_id',$event_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}
			else
				return NULL;
				
		}
	}
	
}
?>