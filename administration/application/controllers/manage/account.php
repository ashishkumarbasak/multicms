<?php
class Account extends CI_Controller {
	
	public $per_page = 10;
	public $language_id;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation','fileuploader','pagination'));
			$this->load->model('user_model');
			
			$this->userauthentication->check_sessionexpire();
			$this->language_id = $this->userauthentication->get_language();
			$this->template->assign('lang_id',$this->language_id);
	}
	   
	function index(){
		$this->template->assign('section','Account');
		$this->template->assign('operation','Change Password');
		
		if($this->input->post('change_password')){
			$submitok = $this->validation();
			if($submitok){
				$admin_user_id = $this->userauthentication->get_loggedin_userid();
				$this->user_model->update_user_password($this->myvalidation->data,$admin_user_id);
				
				$this->template->assign('update_password_successfully','true');
			}else{
				$this->template->assign('form_error',$this->myvalidation->error);
			}
		}

		$this->template->assign('page','manage/account/settings.tpl');	
		$this->template->display('layouts/layout.tpl');
	}
	
	function validation(){
		$this->myvalidation->validate_adminloginpassword();
		if(empty($this->myvalidation->error))
			return true;
		else
			return false;
	}
}
?>