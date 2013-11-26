<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Video_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_videos(){
		$this->db->select('*');
		$this->db->from('videos');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_videos($limit=NULL, $offset=NULL){
		$this->db->select('*');
		$this->db->from('videos');
		
		if($limit!=NULL)
			$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function create_video($data){
		$this->db->set('video_title_it',$data['video_title_it']);
		$this->db->set('video_description_it',$data['video_description_it']);		
		$this->db->set('video_image_name_it',$data['video_cover_image_it']);
		$this->db->set('attachment_it',$data['attachment_it']);
		$this->db->set('video_file_name_it',$data['video_file_it']);
		
		$this->db->set('video_title_en',$data['video_title_en']);
		$this->db->set('video_description_en',$data['video_description_en']);
		$this->db->set('video_image_name_en',$data['video_cover_image_en']);
		$this->db->set('attachment_en',$data['attachment_en']);
		$this->db->set('video_file_name_en',$data['video_file_en']);
		
		$this->db->set('video_title_fr',$data['video_title_fr']);
		$this->db->set('video_description_fr',$data['video_description_fr']);
		$this->db->set('video_image_name_fr',$data['video_cover_image_fr']);
		$this->db->set('attachment_fr',$data['attachment_fr']);
		$this->db->set('video_file_name_fr',$data['video_file_fr']);
		
		$this->db->set('video_title_br',$data['video_title_br']);
		$this->db->set('video_description_br',$data['video_description_br']);
		$this->db->set('video_image_name_br',$data['video_cover_image_br']);
		$this->db->set('attachment_br',$data['attachment_br']);
		$this->db->set('video_file_name_br',$data['video_file_br']);
		
		$this->db->set('video_category_id',$data['video_category_id']);
		
		$this->db->insert('videos');
			
		return $this->db->insert_id();
	}
	
	function update_video($data){
		$this->db->set('video_title_it',$data['video_title_it']);
		$this->db->set('video_description_it',$data['video_description_it']);
		if(array_key_exists('video_cover_image_it',$data) && $data['video_cover_image_it']!=NULL)
		$this->db->set('video_image_name_it',$data['video_cover_image_it']);
		if(array_key_exists('attachment_it',$data) && $data['attachment_it']!=NULL)
		$this->db->set('attachment_it',$data['attachment_it']);
		if(array_key_exists('video_file_it',$data) && $data['video_file_it']!=NULL)
		$this->db->set('video_file_name_it',$data['video_file_it']);
		
		$this->db->set('video_title_en',$data['video_title_en']);
		$this->db->set('video_description_en',$data['video_description_en']);
		if(array_key_exists('video_cover_image_en',$data) && $data['video_cover_image_en']!=NULL)
		$this->db->set('video_image_name_en',$data['video_cover_image_en']);
		if(array_key_exists('attachment_en',$data) && $data['attachment_en']!=NULL)
		$this->db->set('attachment_en',$data['attachment_en']);
		if(array_key_exists('video_file_en',$data) && $data['video_file_en']!=NULL)
		$this->db->set('video_file_name_en',$data['video_file_en']);		
		
		$this->db->set('video_title_fr',$data['video_title_fr']);
		$this->db->set('video_description_fr',$data['video_description_fr']);
		if(array_key_exists('video_cover_image_fr',$data) && $data['video_cover_image_fr']!=NULL)
		$this->db->set('video_image_name_fr',$data['video_cover_image_fr']);
		if(array_key_exists('attachment_fr',$data) && $data['attachment_fr']!=NULL)
		$this->db->set('attachment_fr',$data['attachment_fr']);
		if(array_key_exists('video_file_fr',$data) && $data['video_file_fr']!=NULL)
		$this->db->set('video_file_name_fr',$data['video_file_fr']);
				
		$this->db->set('video_title_br',$data['video_title_br']);
		$this->db->set('video_description_br',$data['video_description_br']);
		if(array_key_exists('video_cover_image_br',$data) && $data['video_cover_image_br']!=NULL)
		$this->db->set('video_image_name_br',$data['video_cover_image_br']);
		if(array_key_exists('attachment_br',$data) && $data['attachment_br']!=NULL)
		$this->db->set('attachment_br',$data['attachment_br']);
		if(array_key_exists('video_file_br',$data) && $data['video_file_br']!=NULL)
		$this->db->set('video_file_name_br',$data['video_file_br']);
		
		$this->db->set('video_category_id',$data['video_category_id']);		
		$this->db->where('trv_video_id',$data['trv_video_id']);
		
		$this->db->update('videos');
	}
	
	function update_category($data,$category_id=NULL){
		if($category_id!=NULL){
			$this->db->set('category_name_it',$data['category_name']);
			$this->db->set('category_description_it',$data['category_description']);
			if(array_key_exists('category_image',$data) && $data['category_image']!=NULL)
			$this->db->set('category_image',$data['category_image']);
		
			$this->db->set('parent_id',$data['parent_id']);
			$this->db->set('show_in_search_panel',$data['show_in_homepage']);
			$this->db->where('category_id',$category_id);
			
			$this->db->update('categories');
		}
	}
	
	function get_all_categories($limit=NULL,$offset=NULL){
		$query_str = "SELECT root_tbl.category_id, root_tbl.show_in_search_panel, root_tbl.category_name_it, subroot_tbl.category_name_it as parent_category FROM `trv_categories` as root_tbl left join trv_categories as subroot_tbl on root_tbl.parent_id=subroot_tbl.category_id";
		
		if($limit!=NULL)
		$query_str .= " limit ".$offset." , ". $limit;

		$query = $this->db->query($query_str);

		if($query->num_rows()>0)
			return $query->result();
		else
			return NULL;
	}
	
	function delete_video($video_id=NULL){
		if($video_id!=NULL){
			$this->db->where('trv_video_id',$video_id);
			$this->db->delete('videos');
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
	
	function get_video_details($video_id=NULL){
		if($video_id!=NULL){
			$this->db->select('*');
			$this->db->from('videos');
			$this->db->where('trv_video_id',$video_id);
			
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
	
	
	function delete_video_individual($video_id=NULL,$lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$this->db->set('video_file_name_'.$lang,'');
			$this->db->where('trv_video_id',$video_id);
			
			$this->db->update('videos');
		}
	}
	
	function delete_video_attachment($video_id=NULL,$lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$this->db->set('attachment_'.$lang,'');
			$this->db->where('trv_video_id',$video_id);
			
			$this->db->update('videos');
		}
	}
	
	function delete_video_image_attachment($video_id=NULL,$lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$this->db->set('video_image_name_'.$lang,'');
			$this->db->where('trv_video_id',$video_id);
			
			$this->db->update('videos');
		}
	}
}
?>