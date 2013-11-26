<?php



class Document_model extends CI_Model{



	function __construct(){

        // Call the Model constructor

        parent::__construct();

    }

	

	function get_total_documents($category_id=NULL,$search_text=NULL){
		$query = "select * from trv_documents_download where (user_privilege='2' or user_privilege='0')";
		if($category_id!=NULL)	
			$query .= " and document_category_id='".$category_id."'";
		
		if($search_text!=NULL)
			$query .= "  and document_name like '%".$search_text."%'";
		
		$query = $this->db->query($query);
		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;

	}

	

	function get_all_documents($category_id=NULL,$offset=NULL,$limit=NULL,$search_text=NULL){

		$query = "select * from trv_documents_download where (user_privilege='2' or user_privilege='0')";
		if($category_id!=NULL)	
			$query .= " and document_category_id='".$category_id."'";
		
		if($search_text!=NULL)
			$query .= "  and document_name like '%".$search_text."%'";
			
		if($offset!=NULL)
			$query .= " limit ".$limit.", ".$offset;
		
		$query = $this->db->query($query);
		if($query->num_rows() > 0)
			return $query->result();
		else
			return 0;

	}
	
	
	
	function get_total_documents_for_user($category_id=NULL,$search_text=NULL){
		$query = "select * from trv_documents where (user_privilege='1' or user_privilege='0')";
		if($category_id!=NULL)	
			$query .= " and document_category_id='".$category_id."'";
		
		if($search_text!=NULL)
			$query .= "  and document_name like '%".$search_text."%'";
		
		$query = $this->db->query($query);
		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;

	}

	

	function get_all_documents_for_user($category_id=NULL,$offset=NULL,$limit=NULL,$search_text=NULL){

		$query = "select * from trv_documents where (user_privilege='1' or user_privilege='0')";
		if($category_id!=NULL)	
			$query .= " and document_category_id='".$category_id."'";
		
		if($search_text!=NULL)
			$query .= "  and document_name like '%".$search_text."%'";
			
		if($offset!=NULL)
			$query .= " limit ".$limit.", ".$offset;
		
		$query = $this->db->query($query);
		if($query->num_rows() > 0)
			return $query->result();
		else
			return 0;

	}

}

?>