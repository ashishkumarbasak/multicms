<?php
class Language extends CI_Controller {
	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/category_model');
			$this->load->model('manage/language_model');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
			
			$this->userauthentication->check_sessionexpire();
			$this->language_id = $this->userauthentication->get_language();
			$this->template->assign('lang_id',$this->language_id);
	}
	
	function index(){
		$this->template->assign('section','Languages');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_categories = $this->language_model->get_total_language();
		
		$config['base_url'] = base_url()."manage/language/page";
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
		$all_languages = $this->language_model->get_all_languages($this->per_page,$offset);
		$this->template->assign('languagelist',$all_languages);
		
		$this->template->assign('page','manage/language/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($category_id=NULL){
		if($category_id!=NULL){			
			$this->category_model->delete_category($category_id);
			redirect('manage/categories','refresh');
		}
	}

	
	function create(){
		$this->template->assign('section','New Language');
		$this->template->assign('operation','Install');

		if($this->input->post('install_language')){
			$submitok=$this->validation();
			$submitok = true;			
			if($submitok){ 
				$this->language_model->install_new_language($this->myvalidation->data);
				$this->template->assign('language_installed_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
		
		$this->template->assign('page','manage/language/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	
	
	function validation(){
		$this->myvalidation->data['language_name'] = $this->input->post('language_name');
		$this->myvalidation->data['short_code'] = $this->input->post('country');		
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function uninstall($language_id=NULL	){
		if($language_id!=NULL){
			$this->language_model->uninstall_language($language_id);
			redirect('manage/language','refresh');
		}
	}
	
	function make_default($language_id=NULL	){
		if($language_id!=NULL){
			$this->language_model->clear_default();
			$this->language_model->make_default($language_id);
			redirect('manage/language','refresh');
		}
	}
}
?>