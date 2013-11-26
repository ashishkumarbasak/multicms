<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $first_limit = 50;
	private $second_limit = 10;
	private $first_offset = 0;
	public $max_number_of_list = 250;
	public $user_id;
	public $per_page = 10;
	public $language_id;
	
	public function __construct(){
		parent::__construct();
		$this->load->library(array('pagination'));
		$this->load->model('user_model','User');
		$this->load->model('userprofile_model','UserProfile');
		$this->load->model('usersetting_model','UserSetting');
		$this->load->model('offer_model','Offer');
		$this->load->model('comment_model','Comment');
		$this->load->model('category_model','Category');
		$this->load->model('video_model','Video');
		$this->load->model('document_model','Document');
		
		$this->authentication->check_sessionexpire();
		$this->user_id = $this->authentication->get_loggedin_userid();
		$this->template->set('is_dashboard',"true");
		$this->load->model('language_model');		
		$this->language_id = $this->language_model->get_language_id(CURRENT_LANGUAGE);
	}

	   

	function index(){
		//$this->load_users_offers($this->user_id);
		//$this->load_offers_you_like($this->user_id);
		//$this->load_recent_comments($this->user_id);
		if($this->input->post('search')){
			$search_text = $this->input->post('search_text');
		}else{
			$search_text = NULL;
		}
	
		$category_id = $this->uri->segment(3);
		if($category_id==NULL)
			$category_id = "all";	
		
		if($this->uri->segment(5)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(5)-1);

		$config['base_url'] = base_url()."documents/category/".$category_id."/page";		

		if($category_id=="all") $category_id=NULL;
		$total_documents = $this->Document->get_total_documents_for_user($category_id,$search_text);

		$config['total_rows'] = $total_documents;
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
		$config['uri_segment'] = 5;		
		$this->pagination->initialize($config);		
		$this->template->set('pagination_link', $this->pagination->create_links());
		
		$display_error=$this->phpsession->get('display_error');
		$this->template->set('display_error',$display_error);
		$this->template->set('error_message',$this->phpsession->get('error_message'));
		$this->phpsession->clear('display_error');
		$this->phpsession->clear('error_message');
		
		$display_message = $this->phpsession->get('display_message');
		$this->template->set('display_message',$display_message);
		$this->template->set('message',$this->phpsession->get('message'));
		$this->phpsession->clear('display_message');
		$this->phpsession->clear('message');
		
		$rootcategories = $this->Category->get_categories($parent_id=0,$limit=NULL,$for_show_in_homepage=NULL,$this->language_id);
		$this->template->set('rootcategories',$rootcategories);
		
		$all_documents = $this->Document->get_all_documents_for_user($category_id,$this->per_page,$offset,$search_text);
		$this->template->set('all_documents',$all_documents);
		
		$this->template->set('selected_tab',"dashboard");
		$this->template->set('page_js',array());

		$this->template->set('page_css',array());

		$this->template->render();

	}

	

	function category($category_id=NULL){

		if($category_id!=NULL){

			$display_error=$this->phpsession->get('display_error');

			$this->template->set('display_error',$display_error);

			$this->template->set('error_message',$this->phpsession->get('error_message'));

			$this->phpsession->clear('display_error');

			$this->phpsession->clear('error_message');

			

			$display_message = $this->phpsession->get('display_message');

			$this->template->set('display_message',$display_message);

			$this->template->set('message',$this->phpsession->get('message'));

			$this->phpsession->clear('display_message');

			$this->phpsession->clear('message');

			

			$rootcategories = $this->Category->get_categories($category_id,$limit=NULL,$for_show_in_homepage=NULL);

			$this->template->set('rootcategories',$rootcategories);

			

			$category_details = $this->Category->get_category_details($category_id);

			if($category_details!=NULL){

				$this->template->set('breadcmp_first',$category_details->category_name);

				$this->template->set('breadcmp_first_url',"category/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));

				$this->phpsession->save('breadcmp_first',$category_details->category_name);

				$this->phpsession->save('breadcmp_first_url',"category/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));

			}

			

			$this->template->set('selected_tab',"dashboard");

			$this->template->set('page_js',array());

			$this->template->set('page_css',array());

			$this->template->current_view = 'dashboard/category';

			$this->template->render();

		}

		else

			redirect('dashboard','refresh');

	}

	

	function subcategory_details($category_id=NULL){

		if($category_id!=NULL){

			$display_error=$this->phpsession->get('display_error');

			$this->template->set('display_error',$display_error);

			$this->template->set('error_message',$this->phpsession->get('error_message'));

			$this->phpsession->clear('display_error');

			$this->phpsession->clear('error_message');

			

			$display_message = $this->phpsession->get('display_message');

			$this->template->set('display_message',$display_message);

			$this->template->set('message',$this->phpsession->get('message'));

			$this->phpsession->clear('display_message');

			$this->phpsession->clear('message');

			

			$category_details = $this->Category->get_category_details($category_id);

			$this->template->set('category_details',$category_details);

			

			if($category_details!=NULL){

				$this->template->set('breadcmp_second',$category_details->category_name);

				$this->template->set('breadcmp_second_url',"category/sub-category/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));

				

				$this->phpsession->save('breadcmp_second',$category_details->category_name);

				$this->phpsession->save('breadcmp_second_url',"category/sub-category/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));

				

				$this->template->set('breadcmp_first',$this->phpsession->get('breadcmp_first'));

				$this->template->set('breadcmp_first_url',$this->phpsession->get('breadcmp_first_url'));

			}

			

			

			$rootcategories = $this->Category->get_categories($category_id,$limit=NULL,$for_show_in_homepage=NULL);

			$this->template->set('rootcategories',$rootcategories);

			

			$this->template->set('selected_tab',"dashboard");

			$this->template->set('page_js',array());

			$this->template->set('page_css',array());

			$this->template->current_view = 'dashboard/subcategory_details';

			$this->template->render();

		}

		else

			redirect('dashboard','refresh');

	}

	

	function category_details($category_id=NULL){

		if($category_id!=NULL){

			$display_error=$this->phpsession->get('display_error');

			$this->template->set('display_error',$display_error);

			$this->template->set('error_message',$this->phpsession->get('error_message'));

			$this->phpsession->clear('display_error');

			$this->phpsession->clear('error_message');

			

			$display_message = $this->phpsession->get('display_message');

			$this->template->set('display_message',$display_message);

			$this->template->set('message',$this->phpsession->get('message'));

			$this->phpsession->clear('display_message');

			$this->phpsession->clear('message');

			

			$category_details = $this->Category->get_category_details($category_id);

			$this->template->set('category_details',$category_details);

			

			if($category_details!=NULL){

				$this->template->set('breadcmp_third',$category_details->category_name);

				$this->template->set('breadcmp_third_url',"details/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));

				

				$this->phpsession->save('breadcmp_third',$category_details->category_name);

				$this->phpsession->save('breadcmp_third_url',"details/".$category_details->category_id."/".str_replace(" ","-",$category_details->category_name));				

				

				$this->template->set('breadcmp_second',$this->phpsession->get('breadcmp_second'));

				$this->template->set('breadcmp_second_url',$this->phpsession->get('breadcmp_second_url'));

				

				$this->template->set('breadcmp_first',$this->phpsession->get('breadcmp_first'));

				$this->template->set('breadcmp_first_url',$this->phpsession->get('breadcmp_first_url'));

			}

			

			

			$rootcategories = $this->Category->get_categories($category_id,$limit=NULL,$for_show_in_homepage=NULL);

			$this->template->set('rootcategories',$rootcategories);

			

			$videos = $this->Video->get_videos($category_id);

			$this->template->set('videos',$videos);

			

			$this->template->set('selected_tab',"dashboard");

			$this->template->set('page_js',array());

			$this->template->set('page_css',array());

			$this->template->current_view = 'dashboard/category_details';

			$this->template->render();

		}

		else

			redirect('dashboard','refresh');

	}

	

	function lastminute()

	{

		$this->load_users_offers($this->user_id);

		

		$display_error=$this->phpsession->get('display_error');

		$this->template->set('display_error',$display_error);

		$this->template->set('error_message',$this->phpsession->get('error_message'));

		$this->phpsession->clear('display_error');

		$this->phpsession->clear('error_message');

		

		$display_message = $this->phpsession->get('display_message');

		$this->template->set('display_message',$display_message);

		$this->template->set('message',$this->phpsession->get('message'));

		$this->phpsession->clear('display_message');

		$this->phpsession->clear('message');

		

		$this->template->set('page_js',array('jquery.rating'));

		$this->template->set('page_css',array('jquery.rating'));

		$this->template->set('selected_tab',"lastminute");

		$this->template->render();

	}





	function load_users_offers($user_id=NULL){

		$user_active_offers = $this->Offer->get_active_offers($user_id);

		$user_past_offers = $this->Offer->get_past_offers($user_id);

				

		$this->template->set('user_active_offers',$user_active_offers);

		$this->template->set('user_past_offers',$user_past_offers);

	}

	

	function load_offers_you_like($user_id){

		$offers_you_like = $this->Offer->get_offers_user_like($user_id);

		$this->template->set('offers_you_like',$offers_you_like);

	}

	

	function load_recent_comments($user_id){

		$my_recent_comments = $this->Comment->get_user_comments($user_id,$limit=NULL,$offset=NULL);

		$this->template->set('my_recent_comments',$my_recent_comments);

	}

	

	function account(){

		$this->template->set('selected_tab',"account");

		$this->template->set('page_js',array('profile','jquery.rating','account_profile'));

		$this->template->set('page_css',array('jquery.rating'));

		$this->template->render();

	}

	 

}

?>