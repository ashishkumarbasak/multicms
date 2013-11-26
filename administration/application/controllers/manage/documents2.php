<?php
class Documents2 extends CI_Controller {
	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/document_model2');
			$this->load->model('manage/category_model');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
			
			$this->userauthentication->check_sessionexpire();
			$this->language_id = $this->userauthentication->get_language();
			$this->template->assign('lang_id',$this->language_id);
	}
	
	function index(){
		$this->template->assign('section','Categories');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_documents = $this->document_model2->get_total_documents();
		
		$config['base_url'] = base_url()."manage/documents2/page";
		$config['total_rows'] = $total_documents;
		$config['per_page'] = $this->per_page;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="currentpage"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);
		
		$this->template->assign('pagination_link', $this->pagination->create_links());
		$all_documents = $this->document_model2->get_all_documents($this->per_page,$offset);
		$this->template->assign('documentlist',$all_documents);
		
		$this->template->assign('page','manage/documents2/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($document_id=NULL){
		if($document_id!=NULL){			
			$this->document_model2->delete_document($document_id);
			redirect('manage/documents2','refresh');
		}
	}

	
	function create(){
		$this->template->assign('section','Document');
		$this->template->assign('operation','Create');

		if($this->input->post('cretae_document')){
			$submitok=$this->validation();			
			if($submitok){ 
				$this->upload_document_file();
				$user_id=$this->document_model2->create_new_document($this->myvalidation->data);
				//$toemail=$this->myvalidation->data['email_address'];				
				//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
				//$this->myemaillibrary->set_email_category('user_signup');
				//$this->myemaillibrary->send_email($toemail,$replace);
				$this->template->assign('document_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
		
		$all_categories = $this->category_model->get_all_categories(NULL,NULL);
		$this->template->assign('categorylist',$all_categories);
		$this->template->assign('page','manage/documents2/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function upload_document_file(){
		if(!empty($_FILES)){
			$category_attachment=array();
			$form_field_name_it="document_file";
			
			if($_FILES[$form_field_name_it]['name']!=NULL){
				$this->fileuploader->upload_document_attachments($form_field_name_it);
				$this->myvalidation->data['document_file_name'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['document_file_name'] = NULL;										
		}
		else
			{
				$this->myvalidation->data['document_file_name'] = NULL;
			}
	}
	
	function edit($document_id=NULL){
		if($document_id!=NULL){
			$this->template->assign('section','Category');
			$this->template->assign('operation','Edit');
			
			if($this->input->post('update_document')){
				$submitok=$this->validation();
				if($submitok){
					$this->upload_document_file();
					$document_id = $this->input->post('document_id'); 					
					
					$this->document_model2->update_document($this->myvalidation->data,$document_id);
					//$toemail=$this->myvalidation->data['email_address'];				
					//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
					//$this->myemaillibrary->set_email_category('user_signup');
					//$this->myemaillibrary->send_email($toemail,$replace);
					$this->template->assign('document_updated_successfully',"yes");
				}
				else{
					$this->template->assign('form_error',$this->myvalidation->error);
				}
			}
			
			$all_categories = $this->category_model->get_all_categories(NULL,NULL);
			$this->template->assign('categorylist',$all_categories);
			
			$document_details = $this->document_model2->get_document_details($document_id);
			$this->template->assign('document_details',$document_details);
			
			$this->template->assign('page','manage/documents2/edit.tpl');	
			$this->template->display('layouts/layout.tpl');
		}
		else{
			redirect('manage/documents','refresh');
		}
	}
	
	function validation(){
		$this->myvalidation->validate_documentname();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
}
?>