<?php
class Pages extends CI_Controller{	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
        parent::__construct();
        // Your own constructor code
		$this->load->library(array('myvalidation','fileuploader','pagination'));
		$this->load->model('manage/page_model');			
		$this->load->model('manage/language_model');
		$this->load->model('manage/menu_model');			
		$this->userauthentication->check_sessionexpire();
		$this->language_id = $this->userauthentication->get_language();
		$this->template->assign('lang_id',$this->language_id);
	}
	
	function index(){
		$this->phpsession->clear('m_ref_page_id');
		if($this->input->post('save_page_order')){
			$page_ids = $this->input->post('page_ids');
			$page_ids = explode(",", $page_ids);
			foreach($page_ids as $key=>$p_id){
				$order = $this->input->post("page_order_".$p_id);
				$this->page_model->update_page_order($p_id,$order);
			}
		}

		$this->template->assign('section','Pages');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_pages = $this->page_model->get_total_pages($this->language_id);
		
		$config['base_url'] = base_url()."manage/pages/page";
		$config['total_rows'] = $total_pages;
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
		$all_pages = $this->page_model->get_all_pages($this->per_page,$offset,$this->language_id);
		$this->template->assign('pagelist',$all_pages);
		
		$subpages2 = array();
		$page_ids2 = array();
		$subpages = array();
		$page_ids = array();
		if($all_pages!=NULL)
		foreach($all_pages as $key=>$value){
			$s_pages = $this->page_model->get_subpages($value->page_id);
			array_push($subpages, $s_pages);
			array_push($page_ids,$value->page_id);
			if($s_pages!=NULL)
			foreach($s_pages as $k=>$v){
				$s_pages2 = $this->page_model->get_subpages($v->page_id);
				array_push($subpages2, $s_pages2);
				array_push($page_ids,$v->page_id);
				if($s_pages2!=NULL)
					foreach($s_pages2 as $k2=>$v2){
						array_push($page_ids,$v2->page_id);
					}
			}
		}
		$this->template->assign('sub_page_list',$subpages);
		$this->template->assign('sub_page_list2',$subpages2);
		

		$this->template->assign('page_ids',implode(",", $page_ids));

		$this->template->assign('page_create_successfully',$this->phpsession->get('page_create_successfully'));
		$this->phpsession->clear('page_create_successfully');
		
		$this->template->assign('page_updated_successfully',$this->phpsession->get('page_updated_successfully'));
		$this->phpsession->clear('page_updated_successfully');
		
		$this->template->assign('page','manage/pages/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function create2(){
		$this->phpsession->clear('m_ref_page_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/pages/create/?lang='.$lang_code, 'refresh');
	}
		   
	function create(){	
		$this->template->assign('section','Page');
		$this->template->assign('operation','Create');
		
		$m_ref_page_id = $this->phpsession->get('m_ref_page_id');
		$this->template->assign('m_ref_page_id',$m_ref_page_id);
		
		if($this->page_model->is_exists_this_page($m_ref_page_id, $this->language_id)){
			$page_id = $this->page_model->get_page_id_from_ref_id($m_ref_page_id, $this->language_id);
			$lang_code = $this->language_model->get_language_code($this->language_id);
			redirect('manage/pages/edit2/'.$page_id.'/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->myvalidation->data['m_ref_page_id'] =  $this->input->post('m_ref_page_id');
				$page_id = $this->page_model->save_content($this->myvalidation->data);
				
				$menu_ids = $this->input->post('menu_ids');
				if(!empty($menu_ids)){
					foreach($menu_ids as $k=>$v){
						$this->menu_model->assign_page_to_menus($page_id,$v);
					}
				}
				
				
				
				$total_additional_field = $this->input->post('total_additional_field');
				if($total_additional_field!=0){
					for($i=0; $i<$total_additional_field; $i++){
						$additiona_field_id = $this->input->post('additional_field_id_'.$i);
						$additional_field_value = $this->input->post('additional_filed_value_'.$additiona_field_id);
						$this->page_model->update_additional_field_value($additional_field_value,$additiona_field_id);
					}
				}				
				$this->phpsession->save('page_create_successfully',"yes");
				if($m_ref_page_id!=NULL){
					$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
					$this->template->assign('m_ref_page_id',$m_ref_page_id);
				}else{
					$this->page_model->update_m_ref_page_id($page_id);
					$this->phpsession->save('m_ref_page_id',$page_id);
					$this->template->assign('m_ref_page_id',$page_id);
				}
				$this->template->assign('page_create_successfully',"yes");
				//redirect('manage/pages','refresh');
			} 	
		}
		
		if($this->input->post('page_id'))
			$page_id = $this->input->post('page_id');
		else
			$page_id = $this->page_model->get_new_page_id();
		//$this->page_model->clear_temp_field($page_id);		
		$additional_fields = $this->page_model->get_additional_fields($page_id);
		$this->template->assign('additional_fields',$additional_fields);			
		
		$template_dir = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('project_folder_name')."/application/views/templates";
		$list_of_templates = scandir($template_dir);
		$files = array();
		foreach($list_of_templates as $file){
    		if (!is_dir($template_dir."/".$file)){
        		array_push($files, $file);
    		}
		}
		$list_of_templates = $files;
		
		$list_of_pages = $this->page_model->get_mother_pages($this->language_id);
		
		$menu_list = $this->menu_model->get_all_menus();
		$this->template->assign('list_of_menus',$menu_list);
		
		$this->template->assign('list_of_pages',$list_of_pages);			
		$this->template->assign('list_of_templates',$list_of_templates);
		$this->template->assign('page_id',$page_id);			
		$this->template->assign('page','manage/pages/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function edit2($page_id=NULL){
		$this->phpsession->clear('m_ref_page_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/pages/edit/'.$page_id.'/?lang='.$lang_code, 'refresh');
	}
	
	function edit($page_id=NULL){	
		$this->template->assign('section','Page');
		$this->template->assign('operation','Create');		
		
		$m_ref_page_id = $this->phpsession->get('m_ref_page_id');
		$this->template->assign('m_ref_page_id',$m_ref_page_id);
		
		if($m_ref_page_id==NULL)
			$m_ref_page_id = $this->page_model->get_m_ref_page_id_from_page_id($page_id);
		
		if($this->page_model->is_exists_this_page($m_ref_page_id, $this->language_id)){
			$page_id = $this->page_model->get_page_id_from_ref_id($m_ref_page_id, $this->language_id);			
		}else if($m_ref_page_id!=NULL){
			$lang_code = $this->language_model->get_language_code($this->language_id);
			$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
			redirect('manage/pages/create/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$page_id =  $this->input->post('page_id');
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->page_model->update_content($this->myvalidation->data, $page_id);
				
				$menu_ids = $this->input->post('menu_ids');
				if(!empty($menu_ids)){
					$this->menu_model->clear_page_from_menu($page_id);
					foreach($menu_ids as $k=>$v){
						$this->menu_model->assign_page_to_menus($page_id,$v);
					}
				}
				
				$total_additional_field = $this->input->post('total_additional_field');
				if($total_additional_field!=0){
					for($i=0; $i<$total_additional_field; $i++){
						$additiona_field_id = $this->input->post('additional_field_id_'.$i);
						$additional_field_value = $this->input->post('additional_filed_value_'.$additiona_field_id);
						$this->page_model->update_additional_field_value($additional_field_value,$additiona_field_id);
					}
				}
				if($m_ref_page_id!=NULL){
					$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
					$this->template->assign('m_ref_page_id',$m_ref_page_id);
				}else{
					$m_ref_page_id = $this->page_model->get_m_ref_page_id_from_page_id($page_id);
					$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
					$this->template->assign('m_ref_page_id',$m_ref_page_id);
				}				
				$this->phpsession->save('page_updated_successfully',"yes");
				$this->template->assign('page_updated_successfully',"yes");
				//redirect('manage/pages','refresh');
			} 	
		}
		
		if($this->input->post('page_id'))
			$page_id = $this->input->post('page_id');

		//$this->page_model->clear_temp_field($page_id);		
		$additional_fields = $this->page_model->get_additional_fields($page_id);
		$this->template->assign('additional_fields',$additional_fields);			
		
		$template_dir = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('project_folder_name')."/application/views/templates";
		$list_of_templates = scandir($template_dir);
		$files = array();
		foreach($list_of_templates as $file){
    		if (!is_dir($template_dir."/".$file)){
        		array_push($files, $file);
    		}
		}
		$list_of_templates = $files;
		
		$list_of_pages = $this->page_model->get_mother_pages($this->language_id);
		
		$page_details = $this->page_model->get_page_details($page_id);
		$this->template->assign('page_details',$page_details);
		
		$menu_list = $this->menu_model->get_all_menus();
		$this->template->assign('list_of_menus',$menu_list);
		$assign_to_menus = $this->menu_model->get_menu_ids($page_id);
		$this->template->assign('included_in_menu_ids',$assign_to_menus);
		
		$this->template->assign('list_of_pages',$list_of_pages);			
		$this->template->assign('list_of_templates',$list_of_templates);
		$this->template->assign('page_id',$page_id);			
		$this->template->assign('page','manage/pages/edit.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_page_details();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function add_addition_field(){
		if($this->input->post('salva')){
			$data = array();
			foreach($_POST as $key=>$value){
				$data[$key] = $value;
			}			
			$field_id = $this->page_model->save_additional_fiels($data);
			
			if($field_id!=NULL){
				$field_details = $this->page_model->get_additional_field_details($field_id);
				$number_of_fields = $this->page_model->get_number_of_fields($data);
				
				$this->template->assign('number_of_fields',$number_of_fields-1);	
				$this->template->assign('field_details',$field_details[0]);	
				$this->template->display('manage/pages/additional_field.tpl');
			}
		}
	}
	
	
	function delete($page_id=NULL){
		if($page_id!=NULL){			
			$this->page_model->delete_page($page_id);
			redirect('manage/pages','refresh');
		}
	}
	
	function delete_additional_field(){
		$field_id = $this->input->post('field_id');
		$this->page_model->delete_additional_field($field_id);
	}
	
	function homepage($page_id=NULL){
		if($page_id!=NULL){
			$this->page_model->clear_home_page($this->language_id);
			$this->page_model->make_home_page($page_id,$this->language_id);
			redirect('manage/pages','refresh');
		}
		else{
			redirect('manage/pages','refresh');
		}
	}
	
}
?>