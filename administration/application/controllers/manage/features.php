<?php
class Features extends CI_Controller{	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
        parent::__construct();
        // Your own constructor code
		$this->load->library(array('myvalidation','fileuploader','pagination'));
		$this->load->model('manage/page_model');
		$this->load->model('manage/feature_model');
		$this->load->model('manage/language_model');			
		$this->userauthentication->check_sessionexpire();
		$this->language_id = $this->userauthentication->get_language();
		$this->template->assign('lang_id',$this->language_id);
	}
	
	function index(){
		$this->phpsession->clear('m_ref_feature_id');
		$this->template->assign('section','Features');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_pages = $this->feature_model->get_total_features($this->language_id);
		
		$config['base_url'] = base_url()."manage/features/page";
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
		$all_pages = $this->feature_model->get_all_features($this->per_page,$offset,$this->language_id);
		$this->template->assign('pagelist',$all_pages);
		
		$this->template->assign('feature_create_successfully',$this->phpsession->get('feature_create_successfully'));
		$this->phpsession->clear('feature_create_successfully');
		
		$this->template->assign('feature_update_successfully',$this->phpsession->get('feature_update_successfully'));
		$this->phpsession->clear('feature_update_successfully');
		
		$this->template->assign('page','manage/features/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function create2(){
		$this->phpsession->clear('m_ref_feature_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/features/create/?lang='.$lang_code, 'refresh');
	}
	   
	function create(){	
		$this->template->assign('section','Features');
		$this->template->assign('operation','Create');
		
		$m_ref_feature_id = $this->phpsession->get('m_ref_feature_id');
		$this->template->assign('m_ref_feature_id',$m_ref_feature_id);
		
		if($this->feature_model->is_exists_this_feature($m_ref_feature_id, $this->language_id)){
			$feature_id = $this->feature_model->get_feature_id_from_ref_id($m_ref_feature_id, $this->language_id);
			$lang_code = $this->language_model->get_language_code($this->language_id);
			redirect('manage/features/edit2/'.$feature_id.'/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->myvalidation->data['m_ref_feature_id'] =  $this->input->post('m_ref_feature_id');
				$feature_id = $this->feature_model->save_feature($this->myvalidation->data);
								
				$this->phpsession->save('feature_create_successfully',"yes");
				if($m_ref_feature_id!=NULL){
					$this->phpsession->save('m_ref_feature_id',$m_ref_feature_id);
					$this->template->assign('m_ref_feature_id',$m_ref_feature_id);
				}else{
					$this->feature_model->update_m_ref_feature_id($feature_id);
					$this->phpsession->save('m_ref_feature_id',$feature_id);
					$this->template->assign('m_ref_feature_id',$feature_id);
				}
				$this->template->assign('feature_create_successfully',"yes");
			} 	
		}
		
			
		$this->template->assign('page','manage/features/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function edit2($feature_id=NULL){
		$this->phpsession->clear('m_ref_feature_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/features/edit/'.$feature_id.'/?lang='.$lang_code, 'refresh');
	}
	
	function edit($feature_id=NULL){	
		$this->template->assign('section','Feature');
		$this->template->assign('operation','Edit');
		
		$m_ref_feature_id = $this->phpsession->get('m_ref_feature_id');
		$this->template->assign('m_ref_feature_id',$m_ref_feature_id);
		
		if($m_ref_feature_id==NULL)
			$m_ref_feature_id = $this->feature_model->get_m_ref_feature_id_from_feature_id($feature_id);
		
		if($this->feature_model->is_exists_this_feature($m_ref_feature_id, $this->language_id)){
			$feature_id = $this->feature_model->get_feature_id_from_ref_id($m_ref_feature_id, $this->language_id);			
		}else if($m_ref_feature_id!=NULL){
			$lang_code = $this->language_model->get_language_code($this->language_id);
			$this->phpsession->save('m_ref_feature_id',$m_ref_feature_id);
			redirect('manage/features/create/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$feature_id =  $this->input->post('feature_id');
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->feature_model->update_feature($this->myvalidation->data, $feature_id);
				
				if($m_ref_feature_id!=NULL){
					$this->phpsession->save('m_ref_feature_id',$m_ref_feature_id);
					$this->template->assign('m_ref_feature_id',$m_ref_feature_id);
				}else{
					$m_ref_feature_id = $this->feature_model->get_m_ref_feature_id_from_feature_id($feature_id);
					$this->phpsession->save('m_ref_feature_id',$m_ref_feature_id);
					$this->template->assign('m_ref_feature_id',$m_ref_feature_id);
				}					
				$this->phpsession->save('feature_update_successfully',"yes");
				$this->template->assign('feature_update_successfully',"yes");
			} 	
		}
		
		if($this->input->post('feature_id'))
			$feature_id = $this->input->post('feature_id');
		
		$feature_details = $this->feature_model->get_feature_details($feature_id);
		$this->template->assign('feature_details',$feature_details);
		
		$this->template->assign('feature_id', $feature_id);			
		$this->template->assign('page','manage/features/edit.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_feature_details();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function delete($feature_id=NULL){
		if($feature_id!=NULL){			
			$this->feature_model->delete_feature($feature_id);
			redirect('manage/features','refresh');
		}
	}
}
?>