<?php
class Comuni extends CI_Controller {
	
	public $per_page = 10;

	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->helper('recaptcha');			
			$this->load->model('manage/comune_model');
			$this->load->model('manage/userprofile_model','UserProfile');
			$this->load->model('manage/usersetting_model','UserSetting');
			
			$this->userauthentication->check_sessionexpire();
	}
	
	function index(){
		$this->template->assign('section','Comune');
		$this->template->assign('operation','List');
		
		if($this->uri->segment(4)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(4)-1);
		
		$total_comune = $this->comune_model->get_total_comune();
		
		$config['base_url'] = base_url()."manage/comuni/page";
		$config['total_rows'] = $total_comune;
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
		$all_comune = $this->comune_model->get_all_comune($this->per_page,$offset);
		$this->template->assign('comunelist',$all_comune);
		
		$this->template->assign('page','manage/comuni/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function delete($comune_id=NULL){
		if($comune_id!=NULL){			
			$this->comune_model->delete_comune($comune_id);
			redirect('manage/comuni','refresh');
		}
	}

	
	function create(){
		$this->template->assign('section','Comune');
		$this->template->assign('operation','Create');

		if($this->input->post('cretae_comune')){
			$submitok=$this->validation();
			
			if($submitok){ 
				$user_id=$this->comune_model->create_new_comune($this->myvalidation->data);
				//$toemail=$this->myvalidation->data['email_address'];				
				//$replace['verify_link']=base_url().'users/verifyemail/'.md5($user_id).'/'.md5($this->myvalidation->data['email_address']);
				//$this->myemaillibrary->set_email_category('user_signup');
				//$this->myemaillibrary->send_email($toemail,$replace);
				$this->template->assign('comune_created_successfully',"yes");
			}
			else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}
		
		$this->template->assign('page','manage/comuni/create.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_comunename();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
}
?>