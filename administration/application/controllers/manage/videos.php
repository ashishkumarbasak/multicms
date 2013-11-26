<?php
class Videos extends CI_Controller {
	
	public $per_page = 10;

	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');
			$this->load->model('manage/category_model');			
			$this->load->model('manage/usermodel');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
			$this->load->model('manage/video_model','Video');
			
			$this->userauthentication->check_sessionexpire();
	}
	   
	function index(){
		$this->template->assign('section','Videos');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_users = $this->Video->get_total_videos();
		
		$config['base_url'] = base_url()."manage/videos/page";
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
		$all_videos = $this->Video->get_all_videos($this->per_page,$offset);
		$this->template->assign('videolist',$all_videos);
		
		$this->template->assign('page','manage/videos/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($video_id=NULL){
		if($video_id!=NULL){			
			$this->Video->delete_video($video_id);
			redirect('manage/videos','refresh');
		}
	}
	
	function block($user_id=NULL){
		if($user_id!=NULL){			
			$this->usermodel->block_user($user_id);
			redirect('manage/user','refresh');
		}
	}
	function unblock($user_id=NULL){
		if($user_id!=NULL){			
			$this->usermodel->unblock_user($user_id);
			redirect('manage/user','refresh');
		}
	}
	
	function create(){
		ini_set('max_execution_time',0);
		$this->template->assign('section','Videos');
		$this->template->assign('operation','Create');

		if($this->input->post('create_video')){
			$submitok=$this->validation();
			
			if($submitok){ 
				//$this->upload_video_image();
				//$this->upload_video();
				$this->myvalidation->data['video_category_id'] = $this->input->post('video_category');
				$this->Video->create_video($this->myvalidation->data);
				
				
				//$toemail=$this->myvalidation->data['email_address'];				
				//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
				//$this->myemaillibrary->set_email_category('user_signup');
				//$this->myemaillibrary->send_email($toemail,$replace);
				$this->template->assign('video_uploaded_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
		
		$all_categories = $this->category_model->get_all_categories(NULL,NULL);
		$this->template->assign('categorylist',$all_categories);

		$this->template->assign('page','manage/videos/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function upload_video_image(){
		if(!empty($_FILES)){
			$form_field_name_it="video_image_it";
			$form_field_name_en="video_image_en";
			$form_field_name_fr="video_image_fr";
			$form_field_name_br="video_image_br";
			if($_FILES[$form_field_name_it]['name']!=NULL){
				$this->fileuploader->upload_video_image($form_field_name_it);
				$this->myvalidation->data['video_image_it'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_image_it'] = NULL;
				
			if($_FILES[$form_field_name_en]['name']!=NULL){
				$this->fileuploader->upload_video_image($form_field_name_en);
				$this->myvalidation->data['video_image_en'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_image_en'] = NULL;
				
			if($_FILES[$form_field_name_fr]['name']!=NULL){
				$this->fileuploader->upload_video_image($form_field_name_fr);
				$this->myvalidation->data['video_image_fr'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_image_fr'] = NULL;
				
			if($_FILES[$form_field_name_br]['name']!=NULL){
				$this->fileuploader->upload_video_image($form_field_name_br);
				$this->myvalidation->data['video_image_br'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_image_br'] = NULL;
		}
		else
			{
				$this->myvalidation->data['video_image_it'] = NULL;
				$this->myvalidation->data['video_image_fr'] = NULL;
				$this->myvalidation->data['video_image_br'] = NULL;
				$this->myvalidation->data['video_image_en'] = NULL;
			}
	}
	
	function upload_video(){
		if(!empty($_FILES)){
			$form_field_name_it="video_file_it";
			$form_field_name_en="video_file_en";
			$form_field_name_fr="video_file_fr";
			$form_field_name_br="video_file_br";
			if($_FILES[$form_field_name_it]['name']!=NULL){
				$this->fileuploader->upload_video($form_field_name_it);
				$this->myvalidation->data['video_file_it'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_file_it'] = NULL;
				
			if($_FILES[$form_field_name_en]['name']!=NULL){
				$this->fileuploader->upload_video($form_field_name_en);
				$this->myvalidation->data['video_file_en'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_file_en'] = NULL;
				
			if($_FILES[$form_field_name_fr]['name']!=NULL){
				$this->fileuploader->upload_video($form_field_name_fr);
				$this->myvalidation->data['video_file_fr'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_file_fr'] = NULL;
				
			if($_FILES[$form_field_name_br]['name']!=NULL){
				$this->fileuploader->upload_video($form_field_name_br);
				$this->myvalidation->data['video_file_br'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['video_file_br'] = NULL;
		}
		else
			{
				$this->myvalidation->data['video_file_it'] = NULL;
				$this->myvalidation->data['video_file_fr'] = NULL;
				$this->myvalidation->data['video_file_br'] = NULL;
				$this->myvalidation->data['video_file_en'] = NULL;
			}
	}
	
	function edit($video_id=NULL){
		if($video_id!=NULL){
			$this->template->assign('section','Videos');
			$this->template->assign('operation','Create');
	
			if($this->input->post('VideoEdit')){
				$submitok=$this->validation_for_edit();				
				if($submitok){ 
					$this->myvalidation->data['trv_video_id'] = $this->input->post('trv_video_id');
					//$this->upload_video_image();
					//$this->upload_video();
					$this->myvalidation->data['video_category_id'] = $this->input->post('video_category');
					$this->Video->update_video($this->myvalidation->data);
				
				
					//$toemail=$this->myvalidation->data['email_address'];				
					//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
					//$this->myemaillibrary->set_email_category('user_signup');
					//$this->myemaillibrary->send_email($toemail,$replace);
					$this->template->assign('video_updated_successfully',"yes");
				}
				else{
					$this->template->assign('form_error',$this->myvalidation->error);
				}
			}
			
			$video_details = $this->Video->get_video_details($video_id);
			if($video_details==NULL) redirect('manage/videos','refresh');
			$this->template->assign('video_details',$video_details);
			
			$all_categories = $this->category_model->get_all_categories(NULL,NULL);
			$this->template->assign('categorylist',$all_categories);
			
			$this->template->assign('page','manage/videos/edit.tpl');	
			$this->template->display('layouts/layout.tpl');
		}
		else{
			redirect('manage/user','refresh');
		}
	}
	
	function validation_for_edit(){
		$this->myvalidation->validate_video_add();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function validation(){
		$this->myvalidation->validate_video_add();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function delete_video($video_id=NULL, $lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$video_details = $this->Video->get_video_details($video_id);
			if($video_details!=NULL){
				if($lang=="it") $video_file_name = $video_details->video_file_name_it;
				else if($lang=="en") $video_file_name = $video_details->video_file_name_en;
				else if($lang=="br") $video_file_name = $video_details->video_file_name_br;
				else if($lang=="fr") $video_file_name = $video_details->video_file_name_fr;
				@unlink($_SERVER['DOCUMENT_ROOT']."assets/videos/".$video_file_name);
				$this->Video->delete_video_individual($video_id,$lang);
				redirect("manage/videos/edit/".$video_id,'refresh');
				
			} 
		}
	}
	
	function delete_attachment($video_id=NULL, $lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$video_details = $this->Video->get_video_details($video_id);
			if($video_details!=NULL){
				if($lang=="it") $video_file_name = $video_details->attachment_it;
				else if($lang=="en") $video_file_name = $video_details->attachment_en;
				else if($lang=="br") $video_file_name = $video_details->attachment_br;
				else if($lang=="fr") $video_file_name = $video_details->attachment_fr;
				@unlink($_SERVER['DOCUMENT_ROOT']."assets/videos/".$video_file_name);
				$this->Video->delete_video_attachment($video_id,$lang);
				redirect("manage/videos/edit/".$video_id,'refresh');
				
			} 
		}
	}
	
	function delete_video_image($video_id=NULL, $lang=NULL){
		if($video_id!=NULL && $lang!=NULL){
			$video_details = $this->Video->get_video_details($video_id);
			if($video_details!=NULL){
				if($lang=="it") $video_file_name = $video_details->video_image_name_it;
				else if($lang=="en") $video_file_name = $video_details->video_image_name_en;
				else if($lang=="br") $video_file_name = $video_details->video_image_name_br;
				else if($lang=="fr") $video_file_name = $video_details->video_image_name_fr;
				@unlink($_SERVER['DOCUMENT_ROOT']."assets/videos/".$video_file_name);
				$this->Video->delete_video_image_attachment($video_id,$lang);
				redirect("manage/videos/edit/".$video_id,'refresh');
				
			} 
		}
	}
}
?>