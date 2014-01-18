<?php
class Products extends CI_Controller{	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
        parent::__construct();
        // Your own constructor code
		$this->load->library(array('myvalidation','fileuploader','pagination'));
		$this->load->model('manage/page_model');
		$this->load->model('manage/language_model');
		$this->load->model('manage/packaging_model');
		$this->load->model('manage/feature_model');			
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
		
		$total_pages = $this->page_model->get_total_products($this->language_id);
		
		$config['base_url'] = base_url()."manage/products/page";
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
		$all_pages = $this->page_model->get_all_products($this->per_page,$offset,$this->language_id);
		$this->template->assign('pagelist',$all_pages);
		
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
		

		$this->template->assign('page_ids',implode(",", $page_ids));

		$this->template->assign('product_create_successfully',$this->phpsession->get('product_create_successfully'));
		$this->phpsession->clear('product_create_successfully');
		
		$this->template->assign('product_updated_successfully',$this->phpsession->get('product_updated_successfully'));
		$this->phpsession->clear('product_updated_successfully');
		
		$this->template->assign('page','manage/products/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function create2(){
		$this->phpsession->clear('m_ref_page_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/products/create/?lang='.$lang_code, 'refresh');
	}
	   
	function create(){	
		$this->template->assign('section','Products');
		$this->template->assign('operation','Create');
		
		$m_ref_page_id = $this->phpsession->get('m_ref_page_id');
		$this->template->assign('m_ref_page_id',$m_ref_page_id);
		
		if($this->page_model->is_exists_this_page($m_ref_page_id, $this->language_id)){
			$page_id = $this->page_model->get_page_id_from_ref_id($m_ref_page_id, $this->language_id);
			$lang_code = $this->language_model->get_language_code($this->language_id);
			redirect('manage/products/edit2/'.$page_id.'/?lang='.$lang_code,'refresh');
		}
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->myvalidation->data['m_ref_page_id'] =  $this->input->post('m_ref_page_id');
				$page_id = $this->page_model->save_content($this->myvalidation->data);
				$product_id = $this->page_model->save_product($page_id);
				$page_ids = $this->input->post('page_ids');
				foreach($page_ids as $key=>$value){
					if($this->input->post('page_included_'.$value)){
						$this->page_model->include_products_in_page($product_id,$value);
					}
					else{
						$this->page_model->delete_products_from_page($product_id,$value);
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
				
				$included_in_page_ids = $this->page_model->get_product_included_in_page($product_id);
				$this->template->assign('included_in_page_ids',$included_in_page_ids);
								
				$this->phpsession->save('product_create_successfully',"yes");
				if($m_ref_page_id!=NULL){
					$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
					$this->template->assign('m_ref_page_id',$m_ref_page_id);
				}else{
					$this->page_model->update_m_ref_page_id($page_id);
					$this->phpsession->save('m_ref_page_id',$page_id);
					$this->template->assign('m_ref_page_id',$page_id);
				}
				$this->template->assign('product_create_successfully',"yes");
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
		
		$template_dir = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('project_folder_name')."/application/views/templates/products";
		$list_of_templates = scandir($template_dir);
		
		$all_pages = $this->page_model->get_all_pages(NULL,NULL,$this->language_id);
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
		$this->template->assign('pagelist',$all_pages);	
		
		$this->template->assign('list_of_templates',$list_of_templates);
		$this->template->assign('page_id',$page_id);			
		$this->template->assign('page','manage/products/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function edit2($page_id=NULL){
		$this->phpsession->clear('m_ref_page_id');
		$lang_code = $this->language_model->get_language_code($this->language_id);
		redirect('manage/products/edit/'.$page_id.'/?lang='.$lang_code, 'refresh');
	}
	
	function edit($page_id=NULL){	
		$this->template->assign('section','Product');
		$this->template->assign('operation','Edit');
		
		$m_ref_page_id = $this->phpsession->get('m_ref_page_id');
		$this->template->assign('m_ref_page_id',$m_ref_page_id);
		
		if($m_ref_page_id==NULL)
			$m_ref_page_id = $this->page_model->get_m_ref_page_id_from_page_id($page_id);
		
		if($this->page_model->is_exists_this_page($m_ref_page_id, $this->language_id)){
			$page_id = $this->page_model->get_page_id_from_ref_id($m_ref_page_id, $this->language_id);			
		}else if($m_ref_page_id!=NULL){
			$lang_code = $this->language_model->get_language_code($this->language_id);
			$this->phpsession->save('m_ref_page_id',$m_ref_page_id);
			redirect('manage/products/create/?lang='.$lang_code,'refresh');
		}
		//print_r($_POST);
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$page_id =  $this->input->post('page_id');
				$this->myvalidation->data['language_id'] =  $this->input->post('language_id');
				$this->page_model->update_content($this->myvalidation->data, $page_id);
				
				$product_id = $this->page_model->get_product_id($page_id);
				$page_ids = $this->input->post('page_ids');
				foreach($page_ids as $key=>$value){
					if($this->input->post('page_included_'.$value)){
						$this->page_model->include_products_in_page($product_id,$value);
					}
					else{
						$this->page_model->delete_products_from_page($product_id,$value);
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
				$product_packagings = $this->input->post('packagings');
				//print_r($_POST);
				if(is_array($product_packagings) && !empty($product_packagings)){
					$this->packaging_model->clean_product_packagings($product_id, $this->language_id);
					$i=1;
					foreach($product_packagings as $p_pack_key=>$p_pack){
						if($p_pack!=NULL){
							$packaging_id = explode("#",$p_pack);
							$packaging_id = $packaging_id[0];
							$packaging_code_value = $this->input->post('packaging_code_'.$i);
							$this->packaging_model->add_package_to_product($packaging_id, $product_id, $this->language_id, $packaging_code_value);
							$i++;
						}		
					}
				}
				
				$feature_ids = $this->input->post('feature_ids');
				if(is_array($feature_ids) && !empty($feature_ids)){
					$this->feature_model->clean_product_features($product_id, $this->language_id);
					foreach($feature_ids as $feature_key=>$feature_id){
						$feature_value = $this->input->post('feature_value_'.$feature_id);
						if($feature_value!=NULL){
							$this->feature_model->add_feature_to_product($feature_id, $product_id, $this->language_id, $feature_value);
						}
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
				$this->phpsession->save('product_updated_successfully',"yes");
				$this->template->assign('product_updated_successfully',"yes");
				//redirect('manage/pages','refresh');
			} 	
		}
		
		if($this->input->post('page_id'))
			$page_id = $this->input->post('page_id');
		
		//$this->page_model->clear_temp_field($page_id);		
		$additional_fields = $this->page_model->get_additional_fields($page_id);
		$this->template->assign('additional_fields',$additional_fields);			
		
		$template_dir = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('project_folder_name')."/application/views/templates/products";
		$list_of_templates = scandir($template_dir);
		
		$all_pages = $this->page_model->get_all_pages(NULL,NULL,$this->language_id);
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
		$this->template->assign('pagelist',$all_pages);
		
		$page_details = $this->page_model->get_page_details($page_id);
		$this->template->assign('page_details',$page_details);
		
		$product_id = $this->page_model->get_product_id($page_id);
		$included_in_page_ids = $this->page_model->get_product_included_in_page($product_id);
		$this->template->assign('included_in_page_ids',$included_in_page_ids);
		
		$packagings_list = $this->packaging_model->get_all_packagings($limit=NULL, $offset=NULL,$this->language_id);
		$this->template->assign('packagings_list',$packagings_list);
		
		$product_packagings = $this->packaging_model->get_product_packagings($product_id, $this->language_id);
		$this->template->assign('product_packagings',$product_packagings);
		$packaging_ids = array();
		if($product_packagings!=NULL)
		foreach($product_packagings as $k=>$v){
			array_push($packaging_ids, $v->packaging_id);
		}
		$this->template->assign('packaging_ids',$packaging_ids);
		
		$features_list = $this->feature_model->get_all_features($limit=NULL, $offset=NULL,$this->language_id);
		$this->template->assign('features_list',$features_list);
		
		$product_features = $this->feature_model->get_product_features($product_id, $this->language_id);
		$feature_values = array();
		if($product_features!=NULL)
		foreach($product_features as $k=>$v){
			$feature_values[$v->feature_id] = $v->feature_value;
		}
		$this->template->assign('feature_values',$feature_values);
		
		
		$this->template->assign('list_of_templates',$list_of_templates);
		$this->template->assign('page_id',$page_id);			
		$this->template->assign('page','manage/products/edit.tpl');	
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
				
				$this->template->assign('field_details',$field_details[0]);	
				$this->template->display('manage/pages/additional_field.tpl');
			}
		}
	}
	
	
	function delete($product_id=NULL, $page_id=NULL){
		if($product_id!=NULL && $page_id!=NULL){			
			$this->page_model->delete_page($page_id);
			$this->page_model->delete_products_in_page($product_id,$page_id);
			$this->page_model->delete_products($product_id,$page_id);
			redirect('manage/products','refresh');
		}
	}
	
	function delete_additional_field(){
		$field_id = $this->input->post('field_id');
		$this->page_model->delete_additional_field($field_id);
	}
	
	public function import(){
		$this->template->assign('section','Product');
		$this->template->assign('operation','Import');
		
		if($this->input->post('Import')){
			$filename = $this->upload_import_file();
			if($filename!=NULL){
				$this->import_products($filename);
				$this->template->assign('product_create_successfully',"yes");
			}
		}
		
		$this->template->assign('page','manage/products/import.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function import_products($filename=NULL){
		if($filename!=NULL){
			$upload_path = IMPORT_FILE_UPLOAD_PATH;
			$filename = $upload_path.$filename;
			$handle = fopen("$filename", "r");
			$row = 1;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				$productID = mysql_real_escape_string($data[0]);
				$categoryID = mysql_real_escape_string($data[1]);
				$productType = mysql_real_escape_string($data[2]);
				$product_name_italian = mysql_real_escape_string($data[3]);
				$product_description_italian = mysql_real_escape_string($data[4]);
				$product_keyword_italian = mysql_real_escape_string($data[5]);
				$product_image_italian = mysql_real_escape_string($data[6]);
				
				$product_name_english = mysql_real_escape_string($data[7]);
				$product_description_english = mysql_real_escape_string($data[8]);
				$product_keyword_english = mysql_real_escape_string($data[9]);
				$product_image_english = mysql_real_escape_string($data[10]);
				
				$product_name_french = mysql_real_escape_string($data[11]);
				$product_description_french = mysql_real_escape_string($data[12]);
				$product_keyword_french = mysql_real_escape_string($data[13]);
				$product_image_french = mysql_real_escape_string($data[14]);
				
				
				if($row>1) {		 			  
					$this->myvalidation->data['page_template'] = "products.php";
					$this->myvalidation->data['mother_page'] = "-1";
					$this->myvalidation->data['is_home_page'] = "0";
					$this->myvalidation->data['page_title'] = $product_name_italian;
					$this->myvalidation->data['page_seotitle'] = "";
					$this->myvalidation->data['page_seokeywords'] = "";
					$this->myvalidation->data['page_seodescription'] = "";
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('it');
					$this->myvalidation->data['page_url'] = str_replace(" ", "-", $product_name_italian);
					
					
					$this->myvalidation->data['main_photo'] = $product_image_italian;
					$this->myvalidation->data['description_1'] = $product_description_italian;
					$this->myvalidation->data['photo_1'] = "";
					$this->myvalidation->data['description_2'] = "";
					$this->myvalidation->data['photo_2'] = "";
					$this->myvalidation->data['m_ref_page_id'] = 0;
					
					$page_id = $this->page_model->save_content($this->myvalidation->data);
					$product_id = $this->page_model->save_product($page_id, $productID, $categoryID, $product_keyword_italian, $productType);
					$this->myvalidation->data['m_ref_page_id'] = $page_id;
					$this->page_model->update_m_ref_page_id($page_id);
					
					$this->myvalidation->data['page_title'] = $product_name_english;
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('en');
					$this->myvalidation->data['page_url'] = str_replace(" ", "-", $product_name_english);
					$this->myvalidation->data['description_1'] = $product_description_english;
					$this->myvalidation->data['main_photo'] = $product_image_english;
					$page_id = $this->page_model->save_content($this->myvalidation->data);
					$product_id = $this->page_model->save_product($page_id, $productID, $categoryID, $product_keyword_english, $productType);
					
					$this->myvalidation->data['page_title'] = $product_name_french;
					$this->myvalidation->data['language_id'] = $this->language_model->get_language_id('fr');
					$this->myvalidation->data['page_url'] = str_replace(" ", "-", $product_name_french);
					$this->myvalidation->data['description_1'] = $product_description_french;
					$this->myvalidation->data['main_photo'] = $product_image_french;
					$page_id = $this->page_model->save_content($this->myvalidation->data);
					$product_id = $this->page_model->save_product($page_id, $productID, $categoryID, $product_keyword_french, $productType);
					
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