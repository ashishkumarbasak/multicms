<?php

class Category_model extends CI_Model{

	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_categories($parent_id=NULL,$limit=NULL,$for_show_in_homepage=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('categories');
		if($parent_id!=NULL)
			$this->db->where('parent_id',$parent_id);
		else
			$this->db->where('parent_id','0');
		
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		if($for_show_in_homepage!=NULL)
			$this->db->where('show_in_search_panel','1');
		
		if($limit!=NULL){	
			$this->db->limit($limit);
			$this->db->order_by('rand()');
		}
		else
			$this->db->order_by('category_name','asc');
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_all(){
		$this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_all_subcategory($parent_id=NULL){
		if($parent_id!=NULL){
			$column = "category_name";
			$this->db->select('*,'.$column.' as sub_hotel_type, category_id as sub_hotel_type_id');
			$this->db->from('categories');
			$this->db->where('parent_id',$parent_id);
			$query = $this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
		else
			return NULL;
		
	}
	
	function get_category_details($category_id=NULL){
		if($category_id!=NULL){
			$column1 = "category_name";
			$column2 = "category_description";
			$column3 = "category_image";
			$this->db->select('*,'.$column1.' as category_name, '.$column2.' as category_description, '.$column3.' as category_image');
			$this->db->from('categories');
			if($category_id!=NULL)
				$this->db->where('category_id',$category_id);
									
			$query =$this->db->get();
	
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			} 
			else
				return NULL;
		}
		else
			return NULL;
	}
}
?>