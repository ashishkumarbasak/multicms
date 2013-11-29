<?php
class Packaging_model extends CI_Model{
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
	
	function get_total_packagings($language_id=NULL){
		$this->db->select('*');
		$this->db->from('packagings');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_packagings($limit=NULL, $offset=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('packagings');
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
	
	function is_exists_this_package($m_ref_packaging_id=NULL,$language_id=NULL){
		if($m_ref_packaging_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('packagings');
			$this->db->where('m_ref_packaging_id',$m_ref_packaging_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0)
				return true;
			else
				return false;			
		}else
			return false;
	}
	
	function get_packaging_id_from_ref_id($m_ref_packaging_id=NULL,$language_id=NULL){
		if($m_ref_packaging_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('packagings');
			$this->db->where('m_ref_packaging_id',$m_ref_packaging_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->packaging_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	function save_packaging($data){
		$this->db->set('pack_title',$data['packaging_title']);
		$this->db->set('pack_code',$data['packaging_code']);
		$this->db->set('pack_description',$data['packaging_description']);
		$this->db->set('language_id',$data['language_id']);
		$this->db->set('m_ref_packaging_id',$data['m_ref_packaging_id']);
		
		$this->db->insert('packagings');
		
		return $this->db->insert_id();
	}
	
	function update_packaging($data, $packaging_id=NULL){
		if($packaging_id!=NULL){
			
			$this->db->set('pack_title',$data['packaging_title']);
			$this->db->set('pack_code',$data['packaging_code']);
			$this->db->set('pack_description',$data['packaging_description']);
			
			$this->db->where('packaging_id',$packaging_id);
			
			$this->db->update('packagings');
				
		}
	}
	
	function update_m_ref_packaging_id($packaging_id=NULL){
		if($packaging_id!=NULL){
			$this->db->set('m_ref_packaging_id',$packaging_id);
			$this->db->where('packaging_id',$packaging_id);
			$this->db->update('packagings');
		}
	}
	
	function get_m_ref_packaging_id_from_packaging_id($packaging_id=NULL){
		if($packaging_id!=NULL){
			$this->db->select('*');
			$this->db->from('packagings');
			$this->db->where('packaging_id',$packaging_id);
			$query =$this->db->get();			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->m_ref_packaging_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	function is_exists_this_packaging($m_ref_packaging_id=NULL,$language_id=NULL){
		if($m_ref_packaging_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('packagings');
			$this->db->where('m_ref_packaging_id',$m_ref_packaging_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0)
				return true;
			else
				return false;			
		}else
			return false;
	}
	
	function delete_package($packaging_id=NULL){
		if($packaging_id!=NULL){
			$this->db->where('packaging_id',$packaging_id);
			$this->db->delete('packagings');
		}
	}
	
	function get_packaging_details($packaging_id=NULL){
		$this->db->select('*');
		$this->db->from('packagings');
		$this->db->where('packaging_id',$packaging_id);
		
		$query =$this->db->get();

		if($query->num_rows() > 0){
			$result = $query->result();
			return $result[0];
		}
		else
			return NULL;
	}
	
	function clean_product_packagings($product_id=NULL,$language_id=NULL){
		if($product_id!=NULL && $language_id!=NULL){
			$this->db->where('product_id',$product_id);
			$this->db->where('language_id',$language_id);
			
			$this->db->delete('product_packages');
		}
	}

	function add_package_to_product($packaging_id=NULL, $product_id=NULL, $language_id=NULL){
		if($packaging_id!=NULL && $product_id!=NULL && $language_id!=NULL){
			$this->db->set('product_id',$product_id);
			$this->db->set('packaging_id',$packaging_id);
			$this->db->set('language_id',$language_id);
			$this->db->insert('product_packages');
		}
	}

	function get_product_packagings($product_id=NULL, $language_id=NULL){
		if($product_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('product_packages');
			$this->db->join('packagings','product_packages.packaging_id=packagings.packaging_id','left');
			$this->db->where('product_id',$product_id);
			$this->db->where('product_packages.language_id',$language_id);
			
			$query =$this->db->get();

			if($query->num_rows() > 0){
				$result = $query->result();
				return $result;
			}
			else
				return NULL;
		}
	}
}
?>