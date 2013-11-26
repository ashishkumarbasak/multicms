<?php
class Dashboard extends CI_Controller {
	public $language_id;
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			$this->load->library(array('myvalidation'));
			$this->load->helper('recaptcha');			
			$this->userauthentication->check_sessionexpire();
			$this->language_id = $this->userauthentication->get_language();
			$this->template->assign('lang_id',$this->language_id);
       }
	   
	
	
	function index(){		
		$this->template->assign('section','Dashboard');
		$this->template->assign('operation','Overview');
		
		$this->template->assign('page','dashboard/index.tpl');	
		$this->template->display('layouts/layout.tpl');
	}

}
?>