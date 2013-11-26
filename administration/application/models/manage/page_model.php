<?php
class Page_model extends CI_Model{
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function safeURL($input){
		$input = strtolower($input);
		$out = "";
		for($i = 0; $i < strlen($input); $i++){
			$working = ord(substr($input,$i,1));
			if(($working>=97)&&($working<=122)){
				//a-z
				$out = $out . chr($working);
			} elseif(($working>=48)&&($working<=57)){
				//0-9
				$out = $out . chr($working);
			} elseif($working==46){
				//.
				$out = $out . chr($working);
			} elseif($working==45){
				//-
				$out = $out . chr($working);
			}
		}
		$out = $this->slugify($out);
		
		return urlencode(preg_replace('/[^A-Za-z0-9\-]/', '', $out));
	}
	
	function slugify($text)
	{
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	
	  // trim
	  $text = trim($text, '-');
	
	  // transliterate
	  if (function_exists('iconv'))
	  {
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  }
	
	  // lowercase
	  $text = strtolower($text);
	
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	
	  if (empty($text))
	  {
		return 'n-a';
	  }
	
	  return $text;
	}
	
	function save_content($data){
		$this->db->set('page_template',$data['page_template']);
		$this->db->set('mother_page_id',$data['mother_page']);
		$this->db->set('is_homepage',$data['is_home_page']);
		$this->db->set('page_title',$data['page_title']);
		$this->db->set('page_seotitle',$data['page_seotitle']);
		$this->db->set('page_seokeywords',$data['page_seokeywords']);
		$this->db->set('page_seodescription',$data['page_seodescription']);
		$this->db->set('language_id',$data['language_id']);
		
		$this->db->set('page_url',strtolower($this->safeURL($data['page_url'])));
		$this->db->set('photo',$data['main_photo']);
		$this->db->set('description_1',$data['description_1']);
		$this->db->set('photo_1',$data['photo_1']);
		$this->db->set('description_2',$data['description_2']);
		$this->db->set('photo_2',$data['photo_2']);
		$this->db->set('date_created',date("Y-m-d H:m:s"));
		$this->db->set('status','published');
		$this->db->set('author',$this->phpsession->get('admin_loggedin_username'));
		
		$this->db->set('m_ref_page_id',$data['m_ref_page_id']);
		
		$this->db->insert('pages');
		
		return $this->db->insert_id();
	}
	
	function update_m_ref_page_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->set('m_ref_page_id',$page_id);
			$this->db->where('page_id',$page_id);
			$this->db->update('pages');
		}
	}
	
	function is_exists_this_page($m_ref_page_id=NULL,$language_id=NULL){
		if($m_ref_page_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('m_ref_page_id',$m_ref_page_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0)
				return true;
			else
				return false;			
		}else
			return false;
	}
	
	function get_page_id_from_ref_id($m_ref_page_id=NULL,$language_id=NULL){
		if($m_ref_page_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('m_ref_page_id',$m_ref_page_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->page_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	function get_m_ref_page_id_from_page_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('page_id',$page_id);
			$query =$this->db->get();			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->m_ref_page_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	
	
	function save_product($page_id=NULL){
		if($page_id!=NULL){
			$this->db->set('page_id',$page_id);
			$this->db->insert('products');
			
			return $this->db->insert_id();
		}
	}
	
	function save_news($page_id=NULL){
		if($page_id!=NULL){
			$this->db->set('page_id',$page_id);
			$this->db->insert('news');
			
			return $this->db->insert_id();
		}
	}

	function update_page_order($page_id=NULL,$order=NULL){
		if($page_id!=NULL){
			$this->db->set('page_order',$order);
			$this->db->where('page_id',$page_id);
			$this->db->update('pages');
		}
	}
	
	function update_content($data,$page_id=NULL){
		if($page_id!=NULL){
			$this->db->set('page_template',$data['page_template']);
			$this->db->set('mother_page_id',$data['mother_page']);
			$this->db->set('is_homepage',$data['is_home_page']);
			$this->db->set('page_title',$data['page_title']);
			$this->db->set('page_seotitle',$data['page_seotitle']);
			$this->db->set('page_seokeywords',$data['page_seokeywords']);
			$this->db->set('page_seodescription',$data['page_seodescription']);
		
			$this->db->set('page_url',strtolower($this->safeURL($data['page_url'])));
			
			if($data['main_photo']!="" && $data['main_photo']!=NULL)
			$this->db->set('photo',$data['main_photo']);
			
			$this->db->set('description_1',$data['description_1']);
			
			if($data['photo_1']!="" && $data['photo_1']!=NULL)
			$this->db->set('photo_1',$data['photo_1']);
			
			$this->db->set('description_2',$data['description_2']);
			
			if($data['photo_2']!="" && $data['photo_2']!=NULL)
			$this->db->set('photo_2',$data['photo_2']);
			
			if(array_key_exists('language_id',$data) && $data['language_id']!=NULL)
			$this->db->set('language_id',$data['language_id']);
			
			$this->db->where('page_id',$page_id);
			
			$this->db->update('pages');
		}
	}
	
	function get_new_page_id(){
		$this->db->select('max(page_id) as page_id');
		$this->db->from('pages');
		$query =$this->db->get();

		if($query->num_rows() > 0){
			$result = $query->result();
			$page_id = $result[0]->page_id+1;
			return $page_id;
		}
		else
			return 1;
	}
	
	function save_additional_fiels($data){
		$this->db->set('field_type',$data['additional_type']);
		$this->db->set('field_value',$data['additional_'.$data['additional_type']]);
		$this->db->set('ref_page_id',$data['page_id']);
		$this->db->insert('page_extended_fields');		
		
		return $this->db->insert_id();
	}
	
	function get_number_of_fields($data){
		if(is_array($data) && array_key_exists('additional_type',$data) && array_key_exists('page_id',$data)){
			$this->db->select('*');
			$this->db->from('page_extended_fields');
			$this->db->where('field_type',$data['additional_type']);
			$this->db->where('ref_page_id',$data['page_id']);
			
			$query = $this->db->get();
			
			if($query->num_rows() > 0){
				return $query->num_rows();
			}else
				return 0;
		}else
			return 0;
	}
	
	function clear_temp_field($page_id=NULL){
		if($page_id!=NULL){
			$this->db->where('is_temp','1');
			$this->db->where('ref_page_id',$page_id);			
			$this->db->delete('page_extended_fields');
		}
	}
	
	function get_additional_field_details($field_id=NULL){
		if($field_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_extended_fields');
			$this->db->where('field_id',$field_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
	function get_additional_fields($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('page_extended_fields');
			$this->db->where('ref_page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
	function update_additional_field_value($additional_field_value,$additiona_field_id){
		if($additional_field_value!="" && $additional_field_value!=NULL)
		$this->db->set('field_value',$additional_field_value);
		$this->db->set('is_temp','0');
		$this->db->where('field_id',$additiona_field_id);
		
		$this->db->update('page_extended_fields');
	}
	
	function get_mother_pages($language_id=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('mother_page_id',0);
			if($language_id!=NULL)
			$this->db->where('language_id',$language_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
	}
	
	function get_total_pages($language_id=NULL){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('mother_page_id','0');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_total_products($language_id=NULL){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('pages','products.page_id=pages.page_id','left');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_total_news($language_id=NULL){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('pages','news.page_id=pages.page_id','left');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_pages($limit=NULL, $offset=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('mother_page_id','0');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		$this->db->order_by('page_order','ASC');
		if($limit!=NULL)
			$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_all_products($limit=NULL, $offset=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('pages','products.page_id=pages.page_id','left');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		if($limit!=NULL)
			$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_all_news($limit=NULL, $offset=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('pages','news.page_id=pages.page_id','left');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		if($limit!=NULL)
			$this->db->limit($limit, $offset);
		
		$query =$this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_subpages($mother_id=NULL){
		if($mother_id!=NULL){
			$this->db->select('*');
			$this->db->from('pages');
			$this->db->where('mother_page_id',$mother_id);
			$this->db->order_by('page_order','ASC');
			$query =$this->db->get();
	
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}
	}
	
	function delete_page($page_id=NULL){
		if($page_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->delete('pages');
			
			$this->db->where('ref_page_id',$page_id);
			$this->db->delete('page_extended_fields');
		}
	}
	
	function get_page_details($page_id=NULL){
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where('page_id',$page_id);
		
		$query =$this->db->get();

		if($query->num_rows() > 0){
			$result = $query->result();
			return $result[0];
		}
		else
			return NULL;
	}
	
	function delete_additional_field($field_id=NULL){
		if($field_id!=NULL){
			$this->db->where('field_id',$field_id);
			$this->db->delete('page_extended_fields');
		}
	}
	
	function include_products_in_page($product_id=NULL,$page_id=NULL){
		if($product_id!=NULL && $page_id!=NULL){
			if($this->already_included($product_id,$page_id)){
			
			}else{
				$this->db->set('product_id',$product_id);
				$this->db->set('page_id',$page_id);
			
				$this->db->insert('products_in_page');
			}
		}
	}
	
	function include_news_in_page($news_id=NULL,$page_id=NULL){
		if($news_id!=NULL && $page_id!=NULL){
			if($this->already_news_included($news_id,$page_id)){
			
			}else{
				$this->db->set('news_id',$news_id);
				$this->db->set('page_id',$page_id);
			
				$this->db->insert('news_in_page');
			}
		}
	}
	
	function already_news_included($news_id,$page_id){
		if($news_id!=NULL && $page_id!=NULL){
			$this->db->select('*');
			$this->db->from('news_in_page');
			$this->db->where('news_id',$news_id);
			$this->db->where('page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0){
				return true;
			}
			else
				return false;
		}
	}
	
	function already_included($product_id,$page_id){
		if($product_id!=NULL && $page_id!=NULL){
			$this->db->select('*');
			$this->db->from('products_in_page');
			$this->db->where('product_id',$product_id);
			$this->db->where('page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0){
				return true;
			}
			else
				return false;
		}
	}
	
	function delete_products_from_page($product_id=NULL,$page_id=NULL){
		if($product_id!=NULL && $page_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->where('product_id',$product_id);
			$this->db->delete('products_in_page');
		}
	}
	
	function delete_products($product_id=NULL,$page_id=NULL){
		if($product_id!=NULL && $page_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->where('product_id',$product_id);
			$this->db->delete('products');
		}
	}

	function delete_products_in_page($product_id=NULL,$page_id=NULL){
		if($product_id!=NULL){
			$this->db->where('product_id',$product_id);
			$this->db->delete('products_in_page');
		}
	}
	
	function delete_news_in_page($news_id=NULL,$page_id=NULL){
		if($news_id!=NULL){
			$this->db->where('news_id',$news_id);
			$this->db->delete('news_in_page');
		}
	}
	
	function delete_news($news_id=NULL,$page_id=NULL){
		if($news_id!=NULL && $page_id!=NULL){
			$this->db->where('page_id',$page_id);
			$this->db->where('news_id',$news_id);
			$this->db->delete('news');
		}
	}

	
	function delete_news_from_page($news_id=NULL,$page_id=NULL){
		if($news_id!=NULL && $page_id!=NULL){
			$this->db->where('news_id',$news_id);
			$this->db->where('page_id',$page_id);
			
			$this->db->delete('news_in_page');
		}
	}
	
	function get_product_included_in_page($product_id=NULL){
		if($product_id!=NULL){
			$this->db->select('*');
			$this->db->from('products_in_page');
			$this->db->where('product_id',$product_id);
			$query =$this->db->get();
			$page_ids = array();
			if($query->num_rows() > 0){
				$result = $query->result();
				foreach($result as $key=>$value){
					array_push($page_ids,$value->page_id);
				}	
			}
			
			return $page_ids;
			
		}
	}
	
	function get_news_included_in_page($news_id=NULL){
		if($news_id!=NULL){
			$this->db->select('*');
			$this->db->from('news_in_page');
			$this->db->where('news_id',$news_id);
			$query =$this->db->get();
			$page_ids = array();
			if($query->num_rows() > 0){
				$result = $query->result();
				foreach($result as $key=>$value){
					array_push($page_ids,$value->page_id);
				}	
			}
			
			return $page_ids;
			
		}
	}
	
	function get_product_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->product_id;
			}
			else
				return NULL;
		}else
			return NULL;
	}
	
	function get_news_id($page_id=NULL){
		if($page_id!=NULL){
			$this->db->select('*');
			$this->db->from('news');
			$this->db->where('page_id',$page_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->news_id;
			}
			else
				return NULL;
		}else
			return NULL;
	}
	
	function clear_home_page($language_id=NULL){
		$this->db->set('is_homepage','0');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		$this->db->update('pages');
	}
	
	function make_home_page($page_id=NULL,$language_id=NULL){
		if($page_id!=NULL){
			$this->db->set('is_homepage','1');
			$this->db->where('page_id',$page_id);
			if($language_id!=NULL)
			$this->db->where('language_id',$language_id);
		
			$this->db->update('pages');
		}
	}
}
?>