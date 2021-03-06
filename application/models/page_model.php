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
	
	function get_motherpage_lists_for_menu($menu_id=NULL, $language_id=NULL){
		if($menu_id!=NULL){
			$this->db->select('*');
			$this->db->from('menu_pages');
			$this->db->join('pages','menu_pages.page_id=pages.page_id','left');
			$this->db->where('menu_id',$menu_id);
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
	}
	
	function get_sub_pages($page_id=NULL, $language_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('mother_page_id',$page_id);
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
	
	function get_slideshow_image_description($image_name=NULL, $page_id=NULL){
		if($image_name!=NULL && $page_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_slideshows');
			$this->db->where('image_name',$image_name);
			$this->db->where('page_id',$page_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result =  $query->result();
				return $result[0]->description;
			}
			else
				return NULL;
			
		}else{
			return NULL;
		}
	}
	
	function get_page_video_description($image_name=NULL, $page_id=NULL){
		if($image_name!=NULL && $page_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_videos');
			$this->db->where('video_name',$image_name);
			$this->db->where('page_id',$page_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result =  $query->result();
				return $result[0]->description;
			}
			else
				return NULL;
			
		}else{
			return NULL;
		}
	}
	
	function get_page_files_description($image_name=NULL, $page_id=NULL){
		if($image_name!=NULL && $page_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_files');
			$this->db->where('file_name',$image_name);
			$this->db->where('page_id',$page_id);
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result =  $query->result();
				return $result[0]->description;
			}
			else
				return NULL;
			
		}else{
			return NULL;
		}
	}
	
	function get_product_features($product_id=NULL, $language_id=NULL){
		if($product_id!=NULL){
			$this->db->select('*');
			$this->db->from('product_features');
			$this->db->join('features','product_features.feature_id=features.feature_id','left');
			$this->db->where('product_id',$product_id);
			if($language_id!=NULL)
			$this->db->where('product_features.language_id',$language_id);
			
			$query =$this->db->get();
			if($query->num_rows() > 0){
				return $result =  $query->result();
			}
			else
				return NULL;
		}else{
			return NULL;
		}
	}
	
	function get_product_packages($product_id=NULL, $language_id=NULL){
		if($product_id!=NULL){
			$this->db->select('*');
			$this->db->from('product_packages');
			$this->db->join('packagings','product_packages.packaging_id=packagings.packaging_id','left');
			$this->db->where('product_id',$product_id);
			if($language_id!=NULL)
			$this->db->where('product_packages.language_id',$language_id);
			
			$query =$this->db->get();
			if($query->num_rows() > 0){
				return $result =  $query->result();
			}
			else
				return NULL;
		}else{
			return NULL;
		}
	}
	
	function get_product_id_from_page_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('product_id');
			$this->db->from('products');
			$this->db->where('page_id',$page_id);
			
			$query =$this->db->get();
			if($query->num_rows() > 0){
				$result =  $query->result();
				return $result[0]->product_id;
			}
			else
				return NULL;
		}
		else
			return NULL;
	}
	

}
?>