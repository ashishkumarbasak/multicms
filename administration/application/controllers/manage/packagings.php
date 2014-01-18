<?php
class Packagings extends CI_Controller{	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
        parent::__construct();
        // Your own constructor code
		$this->load->library(array('myvalidation','fileuploader','pagination'));
		$this->load->model('manage/page_model');
		$this->load->model('manage/packaging_model');
		$this->load->model('manage/language_model');			
		$this->userauthentication->check_sessionexpire();
		$this->language_id = $this->userauthentication->get_language();
		$this->template->assign('lang_id',$this->language_id);
	}
	
	function index(){
		$this->phpsession->clear('m_ref_packaging_id');
		$this->template->assign('section','Pages');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_pages = $this->packaging_model->get_total_packagings($this->language_id);
		
		$config['base_url'] = base_url()."manage/packagings/page";
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
		$all_pages = $this->packaging_model->get_all_packagings($this->per_page,$offset,$this->language_id);
		$this->template->assign('pagelist',$all_pages);
		
		$this->template->assign('package_create_successfully',$this->phpsession->get('package_create_successfully'));
		$this->phpsession->clear('package_create_successfully');
		
		$this->template->assign('package_update_successfully',$this->phpsession->get('package_update_successfully'));
		$this->phpsession->clear('package_update_successfully');
		
		$this->template->assign('page','manage/packagings/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function create2(){
		$this->phpsession->clear('m_ref_packaging_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/packagings/create/?lang='.$lang_code, 'refresh');
	}
	   
	function create(){	
		$this->template->assign('section','Products');
		$this->template->assign('operation','Create');
		
		$m_ref_packaging_id = $this->phpsession->get('m_ref_packaging_id');
		$this->template->assign('m_ref_packaging_id',$m_ref_packaging_id);
		
		if($this->packaging_model->is_exists_this_package($m_ref_packaging_id, $this->language_id)){
			$packaging_id = $this->packaging_model->get_packaging_id_from_ref_id($m_ref_packaging_id, $this->language_id);
			$lang_code = $this->language_model->get_language_code($this->language_id);
			redirect('manage/packagings/edit2/'.$packaging_id.'/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->myvalidation->data['m_ref_packaging_id'] =  $this->input->post('m_ref_packaging_id');
				$packaging_id = $this->packaging_model->save_packaging($this->myvalidation->data);
								
				$this->phpsession->save('package_create_successfully',"yes");
				if($m_ref_packaging_id!=NULL){
					$this->phpsession->save('m_ref_packaging_id',$m_ref_packaging_id);
					$this->template->assign('m_ref_packaging_id',$m_ref_packaging_id);
				}else{
					$this->packaging_model->update_m_ref_packaging_id($packaging_id);
					$this->phpsession->save('m_ref_packaging_id',$packaging_id);
					$this->template->assign('m_ref_packaging_id',$packaging_id);
				}
				$this->template->assign('package_create_successfully',"yes");
			} 	
		}
		
			
		$this->template->assign('page','manage/packagings/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function edit2($packaging_id=NULL){
		$this->phpsession->clear('m_ref_packaging_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/packagings/edit/'.$packaging_id.'/?lang='.$lang_code, 'refresh');
	}
	
	function edit($packaging_id=NULL){	
		$this->template->assign('section','Product');
		$this->template->assign('operation','Edit');
		
		$m_ref_packaging_id = $this->phpsession->get('m_ref_packaging_id');
		$this->template->assign('m_ref_packaging_id',$m_ref_packaging_id);
		
		if($m_ref_packaging_id==NULL)
			$m_ref_packaging_id = $this->packaging_model->get_m_ref_packaging_id_from_packaging_id($packaging_id);
		
		if($this->packaging_model->is_exists_this_packaging($m_ref_packaging_id, $this->language_id)){
			$packaging_id = $this->packaging_model->get_packaging_id_from_ref_id($m_ref_packaging_id, $this->language_id);			
		}else if($m_ref_packaging_id!=NULL){
			$lang_code = $this->language_model->get_language_code($this->language_id);
			$this->phpsession->save('m_ref_packaging_id',$m_ref_packaging_id);
			redirect('manage/packagings/create/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$packaging_id =  $this->input->post('packaging_id');
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->packaging_model->update_packaging($this->myvalidation->data, $packaging_id);
				
				if($m_ref_packaging_id!=NULL){
					$this->phpsession->save('m_ref_packaging_id',$m_ref_packaging_id);
					$this->template->assign('m_ref_packaging_id',$m_ref_packaging_id);
				}else{
					$m_ref_packaging_id = $this->packaging_model->get_m_ref_packaging_id_from_packaging_id($packaging_id);
					$this->phpsession->save('m_ref_packaging_id',$m_ref_packaging_id);
					$this->template->assign('m_ref_packaging_id',$m_ref_packaging_id);
				}					
				$this->phpsession->save('package_update_successfully',"yes");
				$this->template->assign('package_update_successfully',"yes");
			} 	
		}
		
		if($this->input->post('packaging_id'))
			$packaging_id = $this->input->post('packaging_id');
		
		$packaging_details = $this->packaging_model->get_packaging_details($packaging_id);
		$this->template->assign('packaging_details',$packaging_details);
		
		$this->template->assign('packaging_id', $packaging_id);			
		$this->template->assign('page','manage/packagings/edit.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_package_details();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
	
	function delete($packaging_id=NULL){
		if($packaging_id!=NULL){			
			$this->packaging_model->delete_package($packaging_id);
			redirect('manage/packagings','refresh');
		}
	}
	
	public function import(){
		$this->template->assign('section','Product');
		$this->template->assign('operation','Import');
		
		if($this->input->post('Import')){
			$filename = $this->upload_import_file();
			if($filename!=NULL){
				$this->import_packages($filename);
				$this->template->assign('package_create_successfully',"yes");
			}
		}
		
		$this->template->assign('page','manage/packagings/import.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function import_packages($filename=NULL){
		if($filename!=NULL){
			$upload_path = IMPORT_FILE_UPLOAD_PATH;
			$filename = $upload_path.$filename;
			$handle = fopen("$filename", "r");
			$row = 1;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				$packCode = mysql_real_escape_string($data[0]);
				$packTitleItalian = mysql_real_escape_string($data[1]);
				$packDescriptionItalian = mysql_real_escape_string($data[2]);
				
				$packTitleEnglish = mysql_real_escape_string($data[3]);
				$packDescriptionEnglish = mysql_real_escape_string($data[4]);
				
				$packTitleFrench = mysql_real_escape_string($data[5]);
				$packDescriptionFrench = mysql_real_escape_string($data[6]);
				
				if($row>1) {		 			  
					$this->myvalidation->data['packaging_title'] = $packTitleItalian;
					$this->myvalidation->data['packaging_code'] = $packCode;
					$this->myvalidation->data['packaging_description'] = $packDescriptionItalian;
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('it');
					$this->myvalidation->data['m_ref_packaging_id'] = 0;
					
					$packaging_id = $this->packaging_model->save_packaging($this->myvalidation->data);
					$this->myvalidation->data['m_ref_packaging_id'] = $packaging_id;
					$this->packaging_model->update_m_ref_packaging_id($packaging_id);
					
					$this->myvalidation->data['packaging_title'] = $packTitleEnglish;
					$this->myvalidation->data['packaging_code'] = $packCode;
					$this->myvalidation->data['packaging_description'] = $packDescriptionEnglish;
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('en');
					$packaging_id = $this->packaging_model->save_packaging($this->myvalidation->data);
					
					$this->myvalidation->data['packaging_title'] = $packTitleEnglish;
					$this->myvalidation->data['packaging_code'] = $packCode;
					$this->myvalidation->data['packaging_description'] = $packDescriptionEnglish;
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('fr');
					$packaging_id = $this->packaging_model->save_packaging($this->myvalidation->data);
					
				}	
				$row++;		
				//echo "<hr>";	  			
			}	
		 	fclose($handle);
		 }
	}
	
	function upload_import_file(){
		if(!empty($_FILES)){
			$form_field_name="files";
			
			if($_FILES[$form_field_name]['name']!=NULL){
				$this->fileuploader->upload_import_file($form_field_name);
				$this->myvalidation->data['user_file'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['user_file'] = NULL;										
		}
		else{
			$this->myvalidation->data['user_file'] = NULL;
		}
		return $this->myvalidation->data['user_file'];
	}
	
}
?>