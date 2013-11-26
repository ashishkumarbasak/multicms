<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Language_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_language(){
		$this->db->select('*');
		$this->db->from('languages');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_languages($limit=NULL,$offset=NULL){
		$this->db->select('*');
		$this->db->from('languages');
		
		if($limit!=NULL)
		$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function install_new_language($data){
		$this->db->set('language_name',$data['language_name']);
		$this->db->set('lang_short_code',$data['short_code']);
		$this->db->set('flag',$data['short_code']);
		
		$this->db->insert('languages');
	}
	
	function uninstall_language($language_id=NULL){
		if($language_id!=NULL){
			$this->db->where('language_id',$language_id);
			$this->db->delete('languages');
		}
	}
	
	function make_default($language_id=NULL){
		if($language_id!=NULL){
			$this->db->set('is_default','1');
			$this->db->where('language_id',$language_id);
			$this->db->update('languages');
		}
	}
	
	function clear_default(){
		$this->db->set('is_default','0');
		$this->db->update('languages');
	}
	
	function get_language_id($lang_code=NULL){
		if($lang_code!=NULL){
			$this->db->select('language_id');
			$this->db->from('languages');
			$this->db->where('lang_short_code',$lang_code);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->language_id;
			}
			else{
				$this->db->select('language_id');
				$this->db->from('languages');
				$this->db->where('is_default','1');
				$query =$this->db->get();
				if($query->num_rows() > 0){
					$result = $query->result();
					return $result[0]->language_id;
				}
				else{
					return NULL;
				}
			}
		}else{
			$this->db->select('language_id');
			$this->db->from('languages');
			$this->db->where('is_default','1');
			$query =$this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->language_id;
			}
			else{
				return NULL;
			}
		}
	}
}
?>