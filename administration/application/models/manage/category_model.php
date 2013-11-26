<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Category_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_categories($language_id=NULL){
		$this->db->select('*');
		$this->db->from('categories');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_root_category(){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('parent_id','0');
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function create_new_category($data){
		$this->db->set('category_name',$data['category_name_it']);
		$this->db->set('category_description',$data['category_description_it']);
		$this->db->set('category_image',$data['category_image_it']);
		$this->db->set('language_id',$data['language_id']);
		
		$this->db->set('parent_id',$data['parent_id']);
		
		$this->db->insert('categories');
			
		return $this->db->insert_id();
	}
	
	function update_category($data,$category_id=NULL){
		if($category_id!=NULL){
			$this->db->set('category_name',$data['category_name_it']);
			$this->db->set('category_description',$data['category_description_it']);
			if(array_key_exists('category_image',$data) && $data['category_image_it']!=NULL)
			$this->db->set('category_image',$data['category_image_it']);
			
			if(array_key_exists('language_id',$data) && $data['language_id']!=NULL)
			$this->db->set('language_id',$data['language_id']);
			
			if($data['parent_id']!=NULL) $this->db->set('parent_id',$data['parent_id']);			
			$this->db->where('category_id',$category_id);			
			$this->db->update('categories');
		}
	}
	
	function get_all_categories($limit=NULL,$offset=NULL,$language_id=NULL){
		
		$query_str = "select 2level_table.*, 2level_table.language_id, parent_parent_table.category_name as parent_parent_category from 
					(SELECT root_tbl.category_id, root_tbl.show_in_search_panel, root_tbl.category_name,root_tbl.language_id, subroot_tbl.category_name as parent_category, 
					subroot_tbl.parent_id as parent_id FROM `trv_categories` as root_tbl left join trv_categories as subroot_tbl on root_tbl.parent_id=subroot_tbl.category_id 
					where root_tbl.language_id='".$language_id."') as 2level_table left join trv_categories as parent_parent_table on 2level_table.parent_id=parent_parent_table.category_id 
					where 2level_table.language_id='".$language_id."'";
		
		if($limit!=NULL)
		$query_str .= " limit ".$offset." , ". $limit;


		$query = $this->db->query($query_str);

		if($query->num_rows()>0)
			return $query->result();
		else
			return NULL;
	}
	
	function delete_category($category_id=NULL){
		if($category_id!=NULL){
			$this->db->where('category_id',$category_id);
			$this->db->delete('categories');
			
			$this->db->where('parent_id',$category_id);
			$this->db->delete('categories');
		}
	}
	
	function get_category_details($category_id=NULL){
		if($category_id!=NULL){
			$this->db->select('*');
			$this->db->from('categories');
			$this->db->where('category_id',$category_id);
			
			$query = $this->db->get();
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