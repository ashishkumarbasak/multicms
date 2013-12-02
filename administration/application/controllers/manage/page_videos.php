<?php
class Page_videos extends CI_Controller {
	
	public $per_page = 10;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/category_model');
			$this->load->model('manage/page_model');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
	}
	
	function index(){
		$this->template->assign('section','Categories');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_categories = $this->category_model->get_total_categories($this->language_id);
		
		$config['base_url'] = base_url()."manage/categories/page";
		$config['total_rows'] = $total_categories;
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
		$all_categories = $this->category_model->get_all_categories($this->per_page,$offset,$this->language_id);
		$this->template->assign('categorylist',$all_categories);
		
		$this->template->assign('page','manage/categories/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($category_id=NULL){
		if($category_id!=NULL){			
			$this->category_model->delete_category($category_id);
			redirect('manage/categories','refresh');
		}
	}

	
	function create($page_id=NULL){
		$this->template->assign('section','SlideShow');
		$this->template->assign('operation','Create');
		$this->template->assign('javascript3','yes');
		$this->template->assign('page_id',$page_id);
		$this->template->assign('from_page',$this->uri->segment(2));
		@session_start();
		$_SESSION['page_id'] = $page_id;

		if($this->input->post('save_slideshow')){
			//$submitok=$this->validation();			
			print_r($_POST);
			exit(0);
			$submitok = false;
			if($submitok){ 
				$this->upload_category_image();
				$this->myvalidation->data['language_id'] = $this->input->post('language_id');
				$user_id=$this->category_model->create_new_category($this->myvalidation->data);
				//$toemail=$this->myvalidation->data['email_address'];				
				//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
				//$this->myemaillibrary->set_email_category('user_signup');
				//$this->myemaillibrary->send_email($toemail,$replace);
				$this->template->assign('category_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
		
		if($this->input->post('Salva')){
			$image_descriptions = $this->input->post('image_descriptions');
			$uploaded_files = $this->input->post('uploaded_files');
			foreach($uploaded_files as $key=>$image){
				$description = NULL;
				if(array_key_exists($key, $image_descriptions)){
					$description = $image_descriptions[$key];				
				}
				if($this->page_model->is_exists_video_file($image, $page_id)){
					$this->page_model->update_video_description($image, $description, $page_id);	
				}else{
					$this->page_model->save_video_description($image, $description, $page_id);
				}
				
			}
		}
		
		$this->template->assign('page','manage/page_videos/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function upload_category_image(){
		if(!empty($_FILES)){
			$category_attachment=array();
			$form_field_name_it="category_image_it";
			
			if($_FILES[$form_field_name_it]['name']!=NULL){
				$this->fileuploader->upload_category_attachments($form_field_name_it);
				$this->myvalidation->data['category_image_it'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['category_image_it'] = NULL;										
		}
		else
			{
				$this->myvalidation->data['category_image_it'] = NULL;
			}
	}
	
	function edit($category_id=NULL){
		if($category_id!=NULL){
			$this->template->assign('section','Category');
			$this->template->assign('operation','Edit');
			
			if($this->input->post('update_category')){
				$submitok=$this->validation();
				if($submitok){
					$this->upload_category_image();
					$category_id = $this->input->post('category_id'); 
					$this->myvalidation->data['language_id'] = $this->input->post('language_id');					
					$this->category_model->update_category($this->myvalidation->data,$category_id);
					//$toemail=$this->myvalidation->data['email_address'];				
					//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
					//$this->myemaillibrary->set_email_category('user_signup');
					//$this->myemaillibrary->send_email($toemail,$replace);
					$this->template->assign('category_updated_successfully',"yes");
				}
				else{
					$this->template->assign('form_error',$this->myvalidation->error);
				}
			}
			
			$all_categories = $this->category_model->get_all_categories(NULL,NULL);
			$this->template->assign('categorylist',$all_categories);
			
			$category_details = $this->category_model->get_category_details($category_id);
			$this->template->assign('category_details',$category_details);
			
			$this->template->assign('page','manage/categories/edit.tpl');	
			$this->template->display('layouts/layout.tpl');
		}
		else{
			redirect('manage/categories','refresh');
		}
	}
	
	function saveorder($page_id=NULL){
		if($page_id!=NULL){
			$image_dir = $_SERVER['DOCUMENT_ROOT']."/assets/slideshow/".$page_id."/";
			$list_of_images = scandir($image_dir);
			print_r($list_of_images);
			$files = array();
			foreach($list_of_images as $file){
				if (!is_dir($image_dir."/".$file)){
					array_push($files, $file);
				}
			}
			$list_of_images = $files;
		}
		$posted_files_order = $this->input->post('file');
		if($posted_files_order!=NULL)
		foreach($posted_files_order as $key=>$value){
			foreach($list_of_images as $k=>$v){
				if($value==$v){
					$file_name_order = explode("~",$v);
					if(array_key_exists(0,$file_name_order) && is_numeric($file_name_order[0])){
						$file_name_order[0] = ($key+1);
						$file_name = implode("~",$file_name_order);
					}else{
						$file_name = ($key+1)."~".$v;
					}
					@rename($image_dir.$v, $image_dir.$file_name);
					@rename($image_dir."thumbnail/".$v, $image_dir."thumbnail/".$file_name);
				}
			}
		}
	}
	
	function validation(){
		$this->myvalidation->validate_categoryname();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
}
?>