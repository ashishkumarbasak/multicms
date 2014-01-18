<?php
class Feature_model extends CI_Model{
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
	
	function get_total_features($language_id=NULL){
		$this->db->select('*');
		$this->db->from('features');
		if($language_id!=NULL)
		$this->db->where('language_id',$language_id);
		
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_features($limit=NULL, $offset=NULL,$language_id=NULL){
		$this->db->select('*');
		$this->db->from('features');
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
	
	function is_exists_this_feature($m_ref_feature_id=NULL,$language_id=NULL){
		if($m_ref_feature_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('features');
			$this->db->where('m_ref_feature_id',$m_ref_feature_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0)
				return true;
			else
				return false;			
		}else
			return false;
	}
	
	function get_feature_id_from_ref_id($m_ref_feature_id=NULL,$language_id=NULL){
		if($m_ref_feature_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('features');
			$this->db->where('m_ref_feature_id',$m_ref_feature_id);
			$this->db->where('language_id',$language_id);
			$query =$this->db->get();
			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->feature_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	function save_feature($data){
		$this->db->set('feature_title',$data['feature_title']);
		$this->db->set('feature_description',$data['feature_description']);
		$this->db->set('language_id',$data['language_id']);
		$this->db->set('m_ref_feature_id',$data['m_ref_feature_id']);
		
		$this->db->insert('features');
		
		return $this->db->insert_id();
	}
	
	function update_feature($data, $feature_id=NULL){
		if($feature_id!=NULL){
			
			$this->db->set('feature_title',$data['feature_title']);
			$this->db->set('feature_description',$data['feature_description']);
			
			$this->db->where('feature_id',$feature_id);
			
			$this->db->update('features');
				
		}
	}
	
	function update_m_ref_feature_id($feature_id=NULL){
		if($feature_id!=NULL){
			$this->db->set('m_ref_feature_id',$feature_id);
			$this->db->where('feature_id',$feature_id);
			$this->db->update('features');
		}
	}
	
	function get_m_ref_feature_id_from_feature_id($feature_id=NULL){
		if($feature_id!=NULL){
			$this->db->select('*');
			$this->db->from('features');
			$this->db->where('feature_id',$feature_id);
			$query =$this->db->get();			
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0]->m_ref_feature_id;
			}
			else
				return NULL;			
		}else
			return NULL;
	}
	
	
	
	function delete_feature($feature_id=NULL){
		if($feature_id!=NULL){
			$this->db->where('feature_id',$feature_id);
			$this->db->delete('features');
		}
	}
	
	function get_feature_details($feature_id=NULL){
		$this->db->select('*');
		$this->db->from('features');
		$this->db->where('feature_id',$feature_id);
		
		$query =$this->db->get();

		if($query->num_rows() > 0){
			$result = $query->result();
			return $result[0];
		}
		else
			return NULL;
	}
	
	function clean_product_features($product_id=NULL,$language_id=NULL){
		if($product_id!=NULL && $language_id!=NULL){
			$this->db->where('product_id',$product_id);
			$this->db->where('language_id',$language_id);
			
			$this->db->delete('product_features');
		}
	}

	function add_feature_to_product($feature_id=NULL, $product_id=NULL, $language_id=NULL, $feature_value=NULL){
		if($feature_id!=NULL && $product_id!=NULL && $language_id!=NULL){
			$this->db->set('product_id',$product_id);
			$this->db->set('feature_id',$feature_id);
			$this->db->set('language_id',$language_id);
			$this->db->set('feature_value',$feature_value);
			$this->db->insert('product_features');
		}
	}

	function get_product_features($product_id=NULL, $language_id=NULL){
		if($product_id!=NULL && $language_id!=NULL){
			$this->db->select('*');
			$this->db->from('product_features');
			$this->db->join('features','product_features.feature_id=features.feature_id','left');
			$this->db->where('product_id',$product_id);
			$this->db->where('product_features.language_id',$language_id);
			
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