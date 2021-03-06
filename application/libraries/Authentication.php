<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{
    public $username,$userid,$obj;
	public $no_of_dashboard_visit=0;
	public $user_authentication_counter=1;
	public $login_fail_counter=0;
	public $language_id;
    function __construct(){
		$this->obj =& get_instance();
		$this->obj->load->library('phpsession');
		$this->obj->load->model('user_model','User');
		$this->obj->load->model('userprofile_model','UserProfile');
		$this->obj->load->model('settings_model','SiteSetting');
		$this->obj->load->model('language_model');
		
		$this->obj->load->model('category_model','Category');

		$this->language_id = $this->obj->language_model->get_language_id(CURRENT_LANGUAGE);
		
		$subcategories = array();
		$rootcategorylist = $this->obj->Category->get_categories(NULL,3,true);
		if($rootcategorylist!=NULL)
		foreach($rootcategorylist as $key=>$category){
			$subcategory = $this->obj->Category->get_categories($category->category_id,NULL,NULL);
			$subcategories[$category->category_id] = $subcategory;
		}
		$this->obj->template->set('rootcategorylist',$rootcategorylist);
		$this->obj->template->set('subcategories',$subcategories);
		
		$this->obj->load->model('page_model');
		
		$motherpage_lists = $this->obj->page_model->get_motherpage_lists($this->language_id);		
		$this->obj->template->set('motherpage_lists',$motherpage_lists);
		$subpages = array();
		if($motherpage_lists!=NULL)
		foreach($motherpage_lists as $key=>$value){
			array_push($subpages,$this->obj->page_model->get_sub_pages($value->page_id));
		}
		$this->obj->template->set('subpages',$subpages);
		
		$all_languages = $this->obj->language_model->get_all_languages(NULL, NULL);
		$this->obj->template->set('langlist',$all_languages);
		
		$this->is_loggedin();
    }

	function authenticate_user($redirect=true){
		$username=$this->obj->input->post('username_email');
		$user_id = $this->obj->User->get_userid($username);
		$salt = $this->obj->User->get_salt($user_id);
		$password=hash_password($this->obj->input->post('password_signup'),$salt);
		$recaptcha_validate = $this->obj->input->post('recaptcha_validate');

		$auth_result=$this->obj->User->authenticate_user($username,$password);
		if($recaptcha_validate=="yes"){
			$privatekey=$this->obj->config->item('recaptcha_private_key');
			$resp =recaptcha_check_answer($privatekey,
                                			$_SERVER["REMOTE_ADDR"],
                                			$_POST["recaptcha_challenge_field"],
                                			$_POST["recaptcha_response_field"]);
			if (!$resp->is_valid){
  				
				if($this->obj->phpsession->get('login_fail_counter'))
					$this->login_fail_counter = $this->obj->phpsession->get('login_fail_counter');
				
				$this->login_fail_counter++;
				$this->obj->phpsession->save('login_fail_counter',$this->login_fail_counter);
				$this->obj->phpsession->save('display_error','yes');
				$this->obj->phpsession->save('error_message',$this->obj->lang->line('login_fail_for_captcha'));
				if($this->obj->config->item('project_type')=="multicms"){
					redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('login_url'),'refresh');	
				}else{
					redirect($this->obj->config->item('login_url'),'refresh');
				}
				
			}
		}
		//exit(0);
		if($auth_result){
			//echo "here";
			//exit(0);
			$loggedin_username = $this->obj->User->get_username($username);
			$this->obj->phpsession->save('loggedin_username', $loggedin_username);
			$this->obj->phpsession->save('no_of_dashboard_visit', $this->no_of_dashboard_visit);
			$this->obj->phpsession->save('user_authentication_counter', $this->user_authentication_counter);
			$autoLogin = $this->obj->input->post('sign_in_remember_me');
			if($autoLogin){
				$username_cookie = array('name'   => 'usercookie',
				                   		'value'  => $username,
										'expire' => '1209600',
										'path'   => '/',
										'prefix' => 'travelly_',
										);
				$password_cookie = array('name'   => 'pcookie',
										'value'  => $password,
										'expire' => '1209600',
										'path'   => '/',
										'prefix' => 'travelly_',
										);
				set_cookie($username_cookie);
				set_cookie($password_cookie);
				$remember_me='1';
			}
			else{
				delete_cookie("travelly_usercookie");
				delete_cookie("travelly_pcookie");
				$remember_me='0';
			}

			$this->obj->User->update_keepmesignin($username,$remember_me);
			$usertype=$this->obj->User->getusertype($username);
			if($redirect){
				$redirect_url = $this->obj->phpsession->get("redirect_url");
				$this->obj->phpsession->clear('redirect_url');
				if($redirect_url!=NULL)
					redirect(str_replace("itlink/","",$redirect_url), 'refresh');
				else{
					if($this->obj->config->item('project_type')=="multicms"){
						redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('dashboard_url'), 'refresh');	
					}else{
						redirect($this->obj->config->item('dashboard_url'), 'refresh');
					}
				}
					
			}else
				return true;
		}
		else{
			if($this->obj->phpsession->get('login_fail_counter'))
				$this->login_fail_counter = $this->obj->phpsession->get('login_fail_counter');	
				$this->login_fail_counter++;
				$this->obj->phpsession->save('login_fail_counter',$this->login_fail_counter);
				if($redirect){
					//echo "there";
					//exit(0);
					$this->obj->phpsession->save('display_error','yes');
					$this->obj->phpsession->save('error_message',$this->obj->lang->line('login_fail_error'));
					if($this->obj->config->item('project_type')=="multicms"){
						redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('login_url'),'refresh');	
					}else{
						redirect($this->obj->config->item('login_url'),'refresh');
					}
					
				}else
					return false;
		}
	}
	
	function is_loggedin(){
		//print_r($_SESSION);
		//exit(0);
		$this->obj->phpsession->get('loggedin_username');
		if($this->obj->phpsession->get('loggedin_username')){
			$this->set_loggedin_username();
			$this->set_loggedin_userid();
			$this->set_loggedin_usertype();
			
			$profile_details = $this->obj->UserProfile->get_user_profile($this->userid);
			if($profile_details!=NULL){
				$this->obj->template->set('profile_details',$profile_details[0]);
				$this->obj->load->model('category_model','Category');
				
				$this->obj->template->set('rootCategories',$this->obj->Category->get_all());
				if($profile_details[0]->category!=NULL)
					$this->obj->template->set('subCategories',$this->obj->Category->get_all_subcategory($profile_details[0]->category));
				else
					$this->obj->template->set('subCategories',$this->obj->Category->get_all_subcategory(1));	
				
				if($profile_details[0]->is_first_login=="1" || $this->obj->phpsession->get('is_first_login')){
					$this->obj->phpsession->save('is_first_login',"1");
					$this->obj->template->set('is_first_login',"1");
				}
			}
			$this->obj->template->set('is_loggedin','true');
			$this->obj->template->set('loggedin_username',$this->username);
			$this->obj->template->set('loggedin_usertype',$this->usertype);
			$this->obj->template->set('display_name',$this->obj->User->get_loggedin_display_name($this->username));

			return true;
		}
		else{
			$username_from_cookie = get_cookie('travelly_usercookie');
			//echo "<br>";
			$this->obj->template->set('username_from_cookie',$username_from_cookie);
			$password_from_cookie = get_cookie('travelly_pcookie');
			//echo "<br>";
			$is_remember_username = $this->obj->User->get_remember_me($username_from_cookie);
			if($is_remember_username){
				$auth_result=$this->obj->User->authenticate_user($username_from_cookie,$password_from_cookie);
				if($auth_result){
					$loggedin_username = $this->obj->User->get_username($username_from_cookie);
					$this->obj->phpsession->save('loggedin_username', $loggedin_username);
					$this->obj->phpsession->save('no_of_dashboard_visit', $this->no_of_dashboard_visit);
					$this->obj->phpsession->save('come_from_cookie', 'yes');
					$usertype=$this->obj->User->getusertype($loggedin_username);
					if($this->obj->config->item('project_type')=="multicms"){
						redirect(CURRENT_LANGUAGE.'/dashboard', 'refresh');
					}else{
						redirect('dashboard', 'refresh');
					}
					
				}
			}
			else{
				$this->obj->template->set('is_loggedin','false');
				return false;
			}
		}
	}

	function is_exist_username($username){
		$is_exist=$this->obj->User->is_exist_username($username);
		if($is_exist)
			return true;
		else
			return false;
	}

	function is_exist_email($email_address){
		$is_exist=$this->obj->User->is_exist_email($email_address);
		if($is_exist)
			return true;
		else
			return false;
	}

    function set_loggedin_username(){
    	$this->username=$this->obj->phpsession->get('loggedin_username');
    }

	function get_loggedin_username(){
    	return $this->username;
    }

    function set_loggedin_userid(){
    	$this->userid=$this->obj->User->get_userid($this->username);
    }

	function get_loggedin_userid(){
		return $this->userid;
	}

	function get_loggedin_usertype(){
		return $this->usertype;
	}

	function set_loggedin_usertype(){
		$this->usertype=$this->obj->User->getusertype($this->username);
	}

	function check_uertype(){
		if($this->username!=NULL){
			//0 normal user, 1 premium user //will use later not first phase
			if($this->usertype==1){
				if($this->obj->config->item('project_type')=="multicms"){
					redirect(CURRENT_LANGUAGE.'/permissiondeny','refresh');
				}else{
					redirect('permissiondeny','refresh');
				}
				
			}
		}
	}

	function check_sessionexpire(){
		if(!$this->is_loggedin()){
			$this->obj->phpsession->save('display_error','yes');
			$this->obj->phpsession->save('error_message',$this->obj->lang->line('session_expire_error'));
			$this->obj->phpsession->save('redirect_url',$_SERVER['REQUEST_URI']);
			if($this->obj->config->item('project_type')=="multicms"){
				redirect(CURRENT_LANGUAGE.'/users/login','refresh');
			}else{
				redirect('users/login','refresh');
			}
			
		}
	}
	
	function check_hotel_profile_credit_to_add_offer(){
		if($this->is_loggedin()){
			$credit_per_offer = $this->obj->SiteSetting->get_credit_per_offer();
			$users_available_credit = $this->obj->User->get_available_credit($this->userid);
			$getusertype = $this->obj->User->getusertype($this->username);
			$account_expire_date = $this->obj->User->get_account_expire_date($this->userid);
			
			if($getusertype==1){
				if($account_expire_date!=NULL){
					$date1 = date("Y-m-d");
					$date2 = $account_expire_date;
					$diff = strtotime($date2) - strtotime($date1);
					if($diff>=0) {
							$is_profile_complete = $this->obj->UserProfile->is_complete_profile($this->userid);
							if($is_profile_complete)
								return true;
							else{
								$this->obj->phpsession->save('show_profile_notification','yes');
								$this->obj->phpsession->save('profile_notification_message',lang('please_complete_your_profile'));
								if($this->obj->config->item('project_type')=="multicms"){
									redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('user_profile_edit_url'),'refresh');	
								}else{
									redirect($this->obj->config->item('user_profile_edit_url'),'refresh');	
								}
								
							}
						} 
					else{
							$this->obj->phpsession->save('show_payment_notification','yes');
							$this->obj->phpsession->save('payment_notification_message',lang('please_recharge_your_account'));
							if($this->obj->config->item('project_type')=="multicms"){
								redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('subscribe_credit_url'),'refresh');	
							}else{
								redirect($this->obj->config->item('subscribe_credit_url'),'refresh');	
							}
							
						}
				}
				else{
					$this->obj->phpsession->save('show_payment_notification','yes');
					$this->obj->phpsession->save('payment_message',lang('please_recharge_your_account'));
					if($this->obj->config->item('project_type')=="multicms"){
						redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('subscribe_credit_url'),'refresh');
					}else{
						redirect($this->obj->config->item('subscribe_credit_url'),'refresh');
					}
						
				}
			}else{
				$this->obj->phpsession->save('display_error','yes');
				$this->obj->phpsession->save('error_message',$this->obj->lang->line('dont_have_permission_to_buy_credit'));
				if($this->obj->config->item('project_type')=="multicms"){
					redirect(CURRENT_LANGUAGE."/".$this->obj->config->item('dashboard_url'),'refresh');
				}else{
					redirect($this->obj->config->item('dashboard_url'),'refresh');
				}
				
			}
			
		}
	}
}

?>