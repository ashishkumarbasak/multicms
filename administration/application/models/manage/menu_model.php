<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Menu_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_menus(){
		$this->db->select('*');
		$this->db->from('menus');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_menus($limit=NULL,$offset=NULL){
		$this->db->select('*');
		$this->db->from('menus');
		
		if($limit!=NULL)
		$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function add_new_menu($data){
		$this->db->set('menu_name',$data['menu_name']);
		$this->db->insert('menus');
		return $this->db->insert_id();
	}
	
	function update_menu($data,$menu_id){
		$this->db->set('menu_name',$data['menu_name']);
		$this->db->where('menu_id',$menu_id);
		$this->db->update('menus');
	}
	
	function assign_page_to_menus($page_id=NULL, $menu_id=NULL){
		if($page_id!=NULL && $menu_id!=NULL){
			$this->db->set('page_id',$page_id);
			$this->db->set('menu_id',$menu_id);
			$this->db->insert('menu_pages');
		}
	}
	
	function get_menu_ids($page_id=NULL){
		$return = array();		
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('menu_pages');
			$this->db->where('page_id',$page_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				foreach($query->result() as $key=>$value){
					array_push($return,$value->menu_id);
				}
			}	
		}
		return $return;
	}
	
	function delete_page_to_menu($page_id=NULL, $menu_id=NULL){
		if($page_id!=NUL && $menu_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->where('menu_id',$menu_id);
			$this->db->delete('menu_pages');
		}
	}

	function get_assigned_pages($menu_id=NULL){
		$return = array();	
		if($menu_id!=NULL){
			$this->db->select('page_id');
			$this->db->from('menu_pages');
			$this->db->where('menu_id',$menu_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				foreach($query->result() as $key=>$value){
					array_push($return,$value->page_id);
				}
			}
		}
		return $return;
	}
	
	function clear_assign_pages_from_menu($menu_id=NULL){
		if($menu_id!=NULL){
			$this->db->where('menu_id',$menu_id);
			$this->db->delete('menu_pages');
		}
	}
	
	function clear_page_from_menu($page_id=NULL){
		if($page_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->delete('menu_pages');
		}
	}
	
	function delete_menu($menu_id=NULL){
		if($menu_id!=NULL){
			$this->db->where('menu_id',$menu_id);
			$this->db->delete('menus');
			
			$this->db->where('menu_id',$menu_id);
			$this->db->delete('menu_pages');
			
		}
	}
	
	function get_detail($menu_id=NULL){
		if($menu_id!=NULL){
			$this->db->select('*');
			$this->db->from('menus');
			$this->db->where('menu_id',$menu_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}
			else
				return NUlL;
		}
		else
			return NULL;
	}
}
?>