<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Document_model extends CI_Model {
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_documents(){
		$this->db->select('*');
		$this->db->from('documents');
		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	
	function create_new_document($data){
		$this->db->set('document_name',$data['document_name']);
		$this->db->set('document_category_id',$data['document_category_id']);
		$this->db->set('document_file_name',$data['document_file_name']);		
			
		$this->db->insert('documents');
			
		return $this->db->insert_id();
	}
	
	function create_new_document_for_clients($data,$user_id){
		$this->db->set('document_name',$data['document_name']);
		$this->db->set('document_category_id',$data['document_category_id']);
		$this->db->set('document_file_name',$data['document_file_name']);
		$this->db->set('user_id',$user_id);
			
		$this->db->insert('client_documents');
	}
	
	function delete_client_file($file_id=NULL, $user_id=NULL){
		if($file_id!=NULL && $user_id!=NULL){
			$this->db->where('document_id',$file_id);
			$this->db->where('user_id',$user_id);
			$this->db->delete('client_documents');
		}
	}
	
	function update_document($data,$document_id=NULL){
		if($document_id!=NULL){
			$this->db->set('document_name',$data['document_name']);
			$this->db->set('document_category_id',$data['document_category_id']);
			if(array_key_exists('document_file_name',$data) && $data['document_file_name']!=NULL)
			$this->db->set('document_file_name',$data['document_file_name']);
						
			$this->db->where('document_id',$document_id);			
			$this->db->update('documents');
		}
	}
	
	function get_all_documents($limit=NULL,$offset=NULL){
		
		$query_str = "select * from trv_documents left join trv_categories on trv_documents.document_category_id=trv_categories.category_id where 1";
		
		if($limit!=NULL)
		$query_str .= " limit ".$offset." , ". $limit;


		$query = $this->db->query($query_str);

		if($query->num_rows()>0)
			return $query->result();
		else
			return NULL;
	}
	
	function delete_document($document_id=NULL){
		if($document_id!=NULL){
			$this->db->where('document_id',$document_id);
			$this->db->delete('documents');
		}
	}
	
	function get_document_details($document_id=NULL){
		if($document_id!=NULL){
			$this->db->select('*');
			$this->db->from('documents');
			$this->db->where('document_id',$document_id);
			
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

	function get_client_documents($user_id=NULL){
		if($user_id!=NULL){
			$this->db->select('*');
			$this->db->from('client_documents');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result;
			}
			else
				return NULL;
		}else{
			return NULL;
		}
		
	}
}
?>