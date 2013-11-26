<?php
class Events extends CI_Controller{	
	public $per_page = 10;
	public function __construct(){
        parent::__construct();
        // Your own constructor code
		$this->load->library(array('myvalidation','fileuploader','pagination'));
		$this->load->model('manage/event_model');
		
		$this->userauthentication->check_sessionexpire();
	}
	
	function index(){
		$this->template->assign('section','Eventi');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_pages = $this->event_model->get_total_events();
		
		$config['base_url'] = base_url()."manage/events/page";
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
		$all_events = $this->event_model->get_all_events($this->per_page,$offset);
		$this->template->assign('eventlist',$all_events);
		
		$this->template->assign('product_create_successfully',$this->phpsession->get('product_create_successfully'));
		$this->phpsession->clear('product_create_successfully');
		
		$this->template->assign('product_updated_successfully',$this->phpsession->get('product_updated_successfully'));
		$this->phpsession->clear('product_updated_successfully');
		
		$this->template->assign('page','manage/events/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	   
	function create(){
		$this->template->assign('section','Eventi');
		$this->template->assign('operation','Create');
			
		if($this->input->post('add_event')){
			$submitok=$this->validation();			
			if($submitok){
				$user_id = $this->userauthentication->get_loggedin_userid();
				$this->upload_event_file($user_id);
				$this->upload_event_photo($user_id);
				$page_id = $this->event_model->save_event($this->myvalidation->data);
				
				$this->phpsession->save('product_create_successfully',"yes");
				$this->template->assign('product_create_successfully',"yes");
			} 	
		}
		
		$this->template->assign('page','manage/events/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function upload_event_file($user_id){
		if(!empty($_FILES)){
			$form_field_name="event_file";
			
			if($_FILES[$form_field_name]['name']!=NULL){
				$this->fileuploader->upload_event_file($form_field_name,$user_id);
				$this->myvalidation->data['event_file'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['event_file'] = NULL;										
		}
		else
			{
				$this->myvalidation->data['event_file'] = NULL;
			}
	}
	
	function upload_event_photo($user_id){
		if(!empty($_FILES)){
			$form_field_name="event_photo";
			
			if($_FILES[$form_field_name]['name']!=NULL){
				$this->fileuploader->upload_event_photo($form_field_name, $user_id);
				$this->myvalidation->data['event_photo'] = $this->fileuploader->filedata['file_name'];
			}
			else
				$this->myvalidation->data['event_photo'] = NULL;										
		}
		else
			{
				$this->myvalidation->data['event_photo'] = NULL;
			}
	}
	
	function edit($event_id=NULL){	
		$this->template->assign('section','Eventi');
		$this->template->assign('operation','Edit');
			
		
		if($this->input->post('Salva')){
			$submitok=$this->validation();			
			if($submitok){
				$page_id =  $this->input->post('page_id');
				$this->event_model->update_event($this->myvalidation->data, $page_id);
							
				$this->phpsession->save('product_updated_successfully',"yes");
				$this->template->set('product_updated_successfully',"yes");
				//redirect('manage/pages','refresh');
			} 	
		}
		
		$event_detail = $this->event_model->get_event_details($event_id);
		$this->template->assign('event_details',$event_detail);
		
		$this->template->assign('page','manage/events/edit.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_event_details();
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
	
	
	function delete($event_id=NULL){
		if($event_id!=NULL){			
			$this->event_model->delete_event($event_id);
			redirect('manage/events','refresh');
		}
	}
	
	function delete_additional_field(){
		$field_id = $this->input->post('field_id');
		$this->page_model->delete_additional_field($field_id);
	}
	
}
?>