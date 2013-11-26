<?php

class Service_model extends CI_Model{

	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all(){
		$column = "facility_name_".CURRENT_LANGUAGE;
		$this->db->select('*,'.$column.' as facility_name');
		$this->db->from('facilities');
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function new_service($data){
		$this->db->set('facility_name',$data['facility_name']);
		$this->db->insert('facilities');	
	}
	
	function edit_service($data,$facility_id=NULL){
		if($facility_id!=NULL){
			$this->db->set('theme_name',$data['theme_name']);
			$this->db->where('facility_id',$facility_id);
			$this->db->insert('facilities');		
		}
	}
	
	function update_userprofile_services($data,$user_id=NULL){
		if($user_id!=NULL){
			$services=$data['hotel_facilities'];
			$this->delete_userprofile_services($user_id);
			if(!empty($services)){
				foreach($services as $key=>$value){
					$this->db->set('facility_id',$value);
					$this->db->set('profile_id',$user_id);
					$this->db->insert('profile_services');
				}
			}	
		}
	}
	
	function delete_userprofile_services($user_id=NULL){
		if($user_id!=NULL){
			$this->db->where('profile_id',$user_id);
			$this->db->delete('profile_services');
		}
	}
	
	function get_userprofile_hotel_services($user_id=NULL,$arr=FALSE){
		if($user_id!=NULL){
			$services = array();
			$column = "facility_name_".CURRENT_LANGUAGE;
			$this->db->select('*,'.$column.' as facility_name');
			$this->db->from('profile_services');
			$this->db->join('facilities','profile_services.facility_id=facilities.facility_id','left');
			$this->db->where('profile_id',$user_id);
			
			$query =$this->db->get();
			if($query->num_rows() > 0){
				if($arr){
					$services = array();
					foreach ($query->result_array() as $row){
 				  		array_push($services,$row['facility_id']);
					}
					return $services;
				}
				else
					return $query->result();
			}
			else{
				return NULL;
			}
		}
	}
	
	function update_offer_services($data,$offer_id=NULL){
		if($offer_id!=NULL){
			$services=$data['offer_facilities'];
			$this->delete_offer_services($offer_id);
			if(!empty($services)){
				foreach($services as $key=>$value){
					$this->db->set('facility_id',$value);
					$this->db->set('offer_id',$offer_id);
					$this->db->insert('offers_facilities');
				}
			}	
		}
	}
	
	function delete_offer_services($offer_id=NULL){
		if($offer_id!=NULL){
			$this->db->where('offer_id',$offer_id);
			$this->db->delete('offers_facilities');
		}
	}
	
	function get_offer_services($offer_id=NULL,$arr=FALSE){
		if($offer_id!=NULL){
			$services = array();
			$column = "facility_name_".CURRENT_LANGUAGE;
			$this->db->select('*,'.$column.' as facility_name');
			$this->db->from('offers_facilities');
			$this->db->join('facilities','offers_facilities.facility_id=facilities.facility_id','left');
			$this->db->where('offers_facilities.offer_id',$offer_id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				if($arr){
					$services = array();
					foreach ($query->result_array() as $row){
 				  		array_push($services,$row['facility_id']);
					}
					return $services;
				}
				else
					return $query->result();
			}
			else{
				return NULL;
			}	
		}
	}
	
}
?>