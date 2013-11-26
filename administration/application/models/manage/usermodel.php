<?php
/*
 * Created on Jul 16, 2011
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class Usermodel extends CI_Model {

	public $display_name;
	public $username;	
	
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_total_users($user_type=NULL){
		$this->db->select('*');
		$this->db->from('users');
		if($user_type!=NULL)
		$this->db->where('user_type',$user_type); //members

		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->num_rows();
		else
			return 0;
	}
	
	function get_all_users($limit=NULL,$offset=NULL, $user_type=NULL){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('userprofiles','userprofiles.user_id=users.user_id','left');
		if($user_type!=NULL)
		$this->db->where('user_type',$user_type); //members
		
		if($limit!=NULL)
		$this->db->limit($limit,$offset);

		$query =$this->db->get();

		if($query->num_rows()>0)
			return $query->result();
		else
			return NULL;
	}
	
	function get_allhotel_profiles($user_id=NULL){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('userprofiles','userprofiles.user_id=users.user_id','left');
		$this->db->join('usersettings','userprofiles.user_id=usersettings.user_id','left');
		$this->db->join('usershotel_profiles','userprofiles.user_id=usershotel_profiles.user_id','left');
		$this->db->join('userspayment_profiles','userprofiles.user_id=userspayment_profiles.user_id','left');
		$this->db->where('users.user_type','1');
		$this->db->where('users.user_id',$user_id);

		$query = $this->db->get();

		if($query->num_rows() > 0)
			return $query->result();
		else
			return NULL;
	}
	
	function save_invoice_attachment($filename=NULL,$userid=NULL,$pk_invoice=NULL){
		if($filename!=NULL && $userid!=NULL && $pk_invoice!=NULL){
			$this->db->set('invoice_attachment',$filename);
			$this->db->set('payment_status','Success');
			$this->db->where('user_id',$userid);
			$this->db->where('pk_invoice',$pk_invoice);
			
			$this->db->update('invoices');
		}
	}
	
	function update_users_account_permission($userid=NULL){
		if($userid!=NULL){
			$this->db->set('available_credit','available_credit+request_credit',FALSE);
			$this->db->set('request_credit',0);
			$this->db->set('account_expiry_date',date('Y-m-d',strtotime('+1 year')));
			$this->db->where('user_id',$userid);
			$this->db->update('users');
		}
	}




	function delete_user($user_id=NULL){
		if($user_id!=NULL){
			$this->db->where('user_id',$user_id);
			$this->db->delete('users');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('userprofiles');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('usershotel_profiles');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('userspayment_profiles');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('invoicing_profile');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('usersettings');	
			
			$this->db->where('ref_user_id',$user_id);
			$this->db->delete('twitterconnects');
			
			$this->db->where('profile_id',$user_id);
			$this->db->delete('profile_themes');
			
			$this->db->where('profile_id',$user_id);
			$this->db->delete('profile_services');
			
			$this->db->where('profile_id',$user_id);
			$this->db->delete('profile_attachments');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('offers');
			
			$this->db->where('ref_user_id',$user_id);
			$this->db->delete('facebookconnects');
			
			$this->db->where('user_id',$user_id);
			$this->db->delete('booking_request');
		}		
	}
	
	function block_user($user_id=NULL){
		if($user_id!=NULL){
			$this->db->set('is_active','0');
			$this->db->where('user_id',$user_id);
			$this->db->update('users');
		}		
	}
	function unblock_user($user_id=NULL){
		if($user_id!=NULL){
			$this->db->set('is_active','1');
			$this->db->where('user_id',$user_id);
			$this->db->update('users');
		}		
	}

	function create_new_user($data){
		$salt = sha1(uniqid(rand(), true));
		$password = $data['password'];
			
		$this->db->set('username',$data['username']);
		$this->db->set('email',$data['email_address']);
		$this->db->set('password',hash_password($password,$salt));
		$this->db->set('org_password',$data['org_password']);
		$this->db->set('salt',$salt);
		$this->db->set('display_name',$data['full_name']);
		$this->db->set('avatar','');
		$this->db->set('u_created_on',date("Y-m-d H:m:s"));
		$this->db->set('created_on_ip',$this->input->ip_address());
		$this->db->set('last_updated',date("Y-m-d H:m:s"));
		$this->db->set('last_login_ip',$this->input->ip_address());
		$this->db->set('user_type',$data['account_type']); //1= member 2= clients
		$this->db->set('user_activation_key',md5(uniqid(rand(), true)));
		$this->db->set('password_request_code',md5(uniqid(rand(), true)));
		$this->db->set('user_auto_signin','0');
		$this->db->set('is_admin','0');
		$this->db->set('is_active',$data['is_active']); //2=account deactivate by user himself and all data would be delete after 30 days, 1=active, 0=deactivated by admin or content admin for violation
		$this->db->set('upload_permission',$data['upload_permission']);
			
		$this->db->insert('users');
			
		return $this->db->insert_id();
	}
	
	function update_user($data,$user_id=NULL){
		if($user_id!=NULL)
		{
			$salt = sha1(uniqid(rand(), true));
			$password = $data['password'];
				
			$this->db->set('username',$data['username']);
			$this->db->set('email',$data['email_address']);
			
			if($data['password']!=NULL){
				$this->db->set('password',hash_password($password,$salt));
				$this->db->set('org_password',$data['org_password']);
				$this->db->set('salt',$salt);
			}

			$this->db->set('display_name',$data['full_name']);
			$this->db->set('is_active',$data['is_active']);
			$this->db->set('upload_permission',$data['upload_permission']);
			
			$this->db->set('last_updated',date("Y-m-d H:m:s"));
			$this->db->where('user_id',$user_id);
				
			$this->db->update('users');
		}
	}
	
	function get_user_details($user_id=NULL){
		if($user_id!=NULL){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('userprofiles','userprofiles.user_id=users.user_id','left');
			$this->db->where('users.user_id',$user_id);
			
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$result = $query->result();
				return $result[0];
			}
			else
				return NULL;
		}
		else
			return NULL;
	}
	
	function save_user_documents($data=NULL,$user_id=NULL){
		if($data!=NULL && $user_id!=NULL){
			$this->db->set('is_active','0');
			$this->db->where('user_id', $user_id);
			$this->db->update('user_documents');
			
			
			$this->db->set('document_file_name',$data['user_file']);
			$this->db->set('user_id', $user_id);
			$this->db->insert('user_documents');
		}
	}

}
?>