<?php

class Video_model extends CI_Model{

	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	function get_videos($category_id=NULL){
		if($category_id!=NULL)
		{
			$column1 = "video_title_".CURRENT_LANGUAGE;
			$column2 = "video_description_".CURRENT_LANGUAGE;
			$this->db->select('*,'.$column1.' as video_title, '.$column2.' as video_description');
			$this->db->from('videos');
			$this->db->where('video_category_id',$category_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
	function get_video_details($video_id=NULL){
		if($video_id!=NULL)
		{
			$column1 = "video_title_".CURRENT_LANGUAGE;
			$column2 = "video_description_".CURRENT_LANGUAGE;
			$column3 = "video_image_name_".CURRENT_LANGUAGE;
			$column4 = "video_file_name_".CURRENT_LANGUAGE;
			
			$this->db->select('*,'.$column1.' as video_title, '.$column2.' as video_description, '.$column3.' as video_image_name, '.$column4.' as video_file_name');
			$this->db->from('videos');
			$this->db->where('trv_video_id',$video_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
}
?>