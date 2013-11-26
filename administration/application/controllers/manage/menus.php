<?php
class Menus extends CI_Controller {
	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/category_model');
			$this->load->model('manage/page_model');	
			$this->load->model('manage/menu_model');
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
		
		$total_categories = $this->menu_model->get_total_menus();
	
		$config['base_url'] = base_url()."manage/menus/page";
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
		$all_menus = $this->menu_model->get_all_menus($this->per_page,$offset);
		$this->template->assign('menulist',$all_menus);
		
		$this->template->assign('page','manage/menus/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($menu_id=NULL){
		if($menu_id!=NULL){			
			$this->menu_model->delete_menu($menu_id);
			$lang_code = get_cookie('lang_code');		
			redirect('manage/menus/?lang='.$lang_code,'refresh');
		}
	}

	
	function create(){
		$this->template->assign('section','New Language');
		$this->template->assign('operation','Install');

		if($this->input->post('save_menu')){
			$submitok=$this->validation();
			$submitok = true;			
			if($submitok){ 
				$menu_id = $this->menu_model->add_new_menu($this->myvalidation->data);
				$assign_page_ids = $this->input->post('assigned_pages');
				if(!empty($assign_page_ids)){
					$this->menu_model->clear_assign_pages_from_menu($menu_id);
					foreach($assign_page_ids as $key=>$value){
						$this->menu_model->assign_page_to_menus($value,$menu_id);
					}
				}
				$assigned_page_ids = $this->menu_model->get_assigned_pages($menu_id);
				$this->template->assign('assigned_page_ids',$assigned_page_ids);
				$this->template->assign('menu_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}

		$all_pages = $this->page_model->get_mother_pages($this->language_id);
		$subpages = array();
		$page_ids = array();
		if($all_pages!=NULL)
		foreach($all_pages as $key=>$value){
			$s_pages = $this->page_model->get_subpages($value->page_id);
			array_push($subpages, $s_pages);
			array_push($page_ids,$value->page_id);
			if($s_pages!=NULL)
			foreach($s_pages as $k=>$v){
				array_push($page_ids,$v->page_id);
			}
		}
		$this->template->assign('sub_page_list',$subpages);		
		$this->template->assign('pagelist',$all_pages);	
		$this->template->assign('page','manage/menus/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}


	function edit($menu_id=NULL){
		$this->template->assign('section','New Language');
		$this->template->assign('operation','Install');

		if($this->input->post('save_menu') && $this->input->post('menu_id')){
			$submitok=$this->validation();
			$submitok = true;			
			if($submitok){
				$menu_id = $this->input->post('menu_id'); 
				$this->menu_model->update_menu($this->myvalidation->data, $menu_id );
				$assign_page_ids = $this->input->post('assigned_pages');
				if(!empty($assign_page_ids)){
					$this->menu_model->clear_assign_pages_from_menu($menu_id);
					foreach($assign_page_ids as $key=>$value){
						$this->menu_model->assign_page_to_menus($value,$menu_id);
					}
				}
				$this->template->assign('menu_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}

		$all_pages = $this->page_model->get_mother_pages($this->language_id);
		$subpages = array();
		$page_ids = array();
		if($all_pages!=NULL)
		foreach($all_pages as $key=>$value){
			$s_pages = $this->page_model->get_subpages($value->page_id);
			array_push($subpages, $s_pages);
			array_push($page_ids,$value->page_id);
			if($s_pages!=NULL)
			foreach($s_pages as $k=>$v){
				array_push($page_ids,$v->page_id);
			}
		}
		
		$menu_detail = $this->menu_model->get_detail($menu_id);
		$this->template->assign('menu_detail',$menu_detail);
		$assigned_page_ids = $this->menu_model->get_assigned_pages($menu_id);
		$this->template->assign('assigned_page_ids',$assigned_page_ids);
				
		$this->template->assign('sub_page_list',$subpages);		
		$this->template->assign('pagelist',$all_pages);	
		$this->template->assign('menu_id',$menu_id);		
		$this->template->assign('page','manage/menus/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	
	
	function validation(){
		$this->myvalidation->data['menu_name'] = $this->input->post('menu_name');	
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