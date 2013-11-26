<?php
class Page_model extends CI_Model{
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_page_id($url_slug=NULL,$language_id=NULL){
		if($url_slug!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('page_url',$url_slug);
			if($language_id!=NULL)
			$this->db->where('language_id',$language_id);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->page_id;
			}
			else{
				$this->db->select('*');
				$this->db->from('pages');
				$this->db->like('page_url',$url_slug);
				if($language_id!=NULL)
				$this->db->where('language_id',$language_id);
				
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$result = $query->result();
					return $result[0]->page_id;
				}
				else
					return NULL;
			}
		}
	}
	
	function get_m_ref_page_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('page_id',$page_id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->m_ref_page_id;
			}
			else
				return NULL;
		}
	}
	
	function get_url_slug($m_ref_page_id=NULL,$language_id=NULL){
		if($m_ref_page_id!=NULL && $language_id!=NULL){
			$this->db->select('page_url');
			$this->db->from('pages');
			$this->db->where('m_ref_page_id',$m_ref_page_id);
			$this->db->where('language_id',$language_id);
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->page_url;
			}
			else
				return NULL;
		}
	}
	
	function get_page_content($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('page_id',$page_id);			
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}
			else
				return NULL;
		}
	}
	
	function get_page_additional_content($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_extended_fields');
			$this->db->where('ref_page_id',$page_id);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				return $query->result();
			}
			else
				return NULL;
		}
	}
	
	function get_motherpage_lists($language_id=NULL){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('mother_page_id','0');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		$this->db->order_by('page_order','ASC');
			
		$query = $this->db->get();
			
		if($query->num_rows() > 0){
			return $query->result();
		}
		else
			return NULL;
	}
	
	function get_sub_pages($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('mother_page_id',$page_id);
			$this->db->order_by('page_order','ASC');
				
			$query = $this->db->get();
				
			if($query->num_rows() > 0){
				return $query->result();
			}
			else
				return NULL;
		}
		else
			return NULL;
	}

	function get_list_of_products($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*, products_in_page.page_id as org_page_id');
			$this->db->from('products_in_page');
			$this->db->join('products','products_in_page.product_id=products.product_id','left');
			$this->db->join('pages','products.page_id=pages.page_id','left');
			$this->db->where('products_in_page.page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}

	function get_list_of_news($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*, news_in_page.page_id as org_page_id');
			$this->db->from('news_in_page');
			$this->db->join('news','news_in_page.news_id=news.news_id','left');
			$this->db->join('pages','news.page_id=pages.page_id','left');
			$this->db->where('news_in_page.page_id',$page_id);
			$this->db->order_by('pages.date_created','DESC');
			
			$query =$this->db->get();

			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
	
	function get_homepage_id($language_id=NULL){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('is_homepage','1');
		$this->db->where('language_id',$language_id);
		
		$query =$this->db->get();

		if($query->num_rows() > 0){
			$result =  $query->result();
			return $result[0]->page_id;
		}
		else
			return NULL;		
	}
	

}
?>