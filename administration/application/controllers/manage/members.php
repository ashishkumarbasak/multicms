<?php
class Members extends CI_Controller {
	
	public $per_page = 10;

	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/usermodel');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
			
			$this->userauthentication->check_sessionexpire();
			$this->language_id = $this->userauthentication->get_language();
			$this->template->assign('lang_id',$this->language_id);
	}
	   
	function index(){
		$this->template->assign('section','Users');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_users = $this->usermodel->get_total_users($user_type='1');
		
		$config['base_url'] = base_url()."manage/members/page";
		$config['total_rows'] = $total_users;
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
		$all_users = $this->usermodel->get_all_users($this->per_page,$offset,$user_type='1');
		$this->template->assign('userlist',$all_users);
		
		$this->template->assign('page','manage/members/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($user_id=NULL){
		if($user_id!=NULL){			
			$this->usermodel->delete_user($user_id);
			redirect('manage/members','refresh');
		}
	}
	
	function block($user_id=NULL){
		if($user_id!=NULL){			
			$this->usermodel->block_user($user_id);
			redirect('manage/members','refresh');
		}
	}
	function unblock($user_id=NULL){
		if($user_id!=NULL){			
			$this->usermodel->unblock_user($user_id);
			redirect('manage/members','refresh');
		}
	}
	
	function create(){
		$this->template->assign('section','Users');
		$this->template->assign('operation','Create');

		if($this->input->post('cretae_my_account')){
			$submitok=$this->validation();
			//print_r($this->myvalidation->data);
			if($submitok){ 
				$user_id=$this->usermodel->create_new_user($this->myvalidation->data);
				$this->UserProfile->create_user_profile($this->myvalidation->data,$user_id);
				$this->UserProfile->create_usershotel_profile($this->myvalidation->data,$user_id);
				$this->UserProfile->create_userspayment_profile($this->myvalidation->data,$user_id);
				//$this->UserProfile->create_user_invoicing_profile($this->myvalidation->data,$user_id);
				$this->UserSetting->create_user_setting($this->myvalidation->data,$user_id);
				
				//$toemail=$this->myvalidation->data['email_address'];				
				//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
				//$this->myemaillibrary->set_email_category('user_signup');
				//$this->myemaillibrary->send_email($toemail,$replace);
				$this->template->assign('user_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
	
		$this->template->assign('account_type','1');
		$this->template->assign('page','manage/members/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function edit($user_id=NULL){
		if($user_id!=NULL){
			$this->template->assign('section','Members');
			$this->template->assign('operation','Edit');
	
			if($this->input->post('update_my_account')){
				$submitok=$this->validation_for_edit();
				
				if($submitok){ 
					$user_id = $this->input->post('user_id');
					$this->usermodel->update_user($this->myvalidation->data,$user_id);
					$this->UserProfile->update_user_profile($this->myvalidation->data,$user_id);
					
					$this->template->assign('user_updated_successfully',"yes");
				}
				else{
					$this->template->assign('form_error',$this->myvalidation->error);
				}
			}
			
			$user_details = $this->usermodel->get_user_details($user_id);
			if($user_details==NULL) redirect('manage/members','refresh');
			$this->template->assign('user_details',$user_details);
			
			$this->template->assign('page','manage/members/edit.tpl');	
			$this->template->display('layouts/layout.tpl');
		}
		else{
			redirect('manage/members','refresh');
		}
	}
	
	function validation_for_edit(){
		$this->myvalidation->validate_fullname();
		$this->myvalidation->validate_hotelloginusername_for_edit();
		$this->myvalidation->validate_hotelloginemailaddress_for_edit();
		$this->myvalidation->validate_loginpassword_for_edit();
		$this->myvalidation->data['send_newsletter'] = $this->input->post('send_newsletter');
		$this->myvalidation->data['timezone_offset'] = $this->input->post('timezone_offset');
		$this->myvalidation->data['account_type'] = $this->input->post('account_type');
		$this->myvalidation->data['user_country'] = $this->input->post('user_country');
		$this->myvalidation->data['is_active'] = $this->input->post('is_active');
		$this->myvalidation->data['upload_permission'] = $this->input->post('upload_permission');
		
		$this->template->assign('account_type',$this->myvalidation->data['account_type']);
		$this->template->assign('user_country',$this->myvalidation->data['user_country']);
		$this->template->assign('is_active',$this->myvalidation->data['is_active']);
		$this->template->assign('upload_permission',$this->myvalidation->data['upload_permission']);
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function validation(){
		$this->myvalidation->validate_fullname();
		$this->myvalidation->validate_hotelloginusername();
		$this->myvalidation->validate_hotelloginemailaddress();
		$this->myvalidation->validate_loginpassword();
		$this->myvalidation->data['send_newsletter'] = $this->input->post('send_newsletter');
		$this->myvalidation->data['timezone_offset'] = $this->input->post('timezone_offset');
		$this->myvalidation->data['account_type'] = $this->input->post('account_type');
		$this->myvalidation->data['user_country'] = $this->input->post('user_country');
		$this->myvalidation->data['is_active'] = $this->input->post('is_active');
		$this->myvalidation->data['upload_permission'] = $this->input->post('upload_permission');
		
		$this->template->assign('account_type',$this->myvalidation->data['account_type']);
		$this->template->assign('user_country',$this->myvalidation->data['user_country']);
		$this->template->assign('is_active',$this->myvalidation->data['is_active']);
		$this->template->assign('upload_permission',$this->myvalidation->data['upload_permission']);
		
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}

	function upload_users_file($user_id){
		if(!empty($_FILES)){
			$form_field_name="user_file";
			
			if($_FILES[$form_field_name]['name']!=NULL){
				$this->fileuploader->upload_user_file($form_field_name,$user_id);
				$this->myvalidation->data['user_file'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['user_file'] = NULL;										
		}
		else
			{
				$this->myvalidation->data['user_file'] = NULL;
			}
	}
}
?>