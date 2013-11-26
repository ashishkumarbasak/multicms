<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
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
		$this->load->model('language_model');		
		$this->language_id = $this->language_model->get_language_id(CURRENT_LANGUAGE);
	}
	
	function index(){
		if($this->input->post('search')){
			$search_text = $this->input->post('search_text');
		}else{
			$search_text = NULL;
		}
		
		$category_id = $this->uri->segment(4);
		if($category_id==NULL)
			$category_id = "all";	
		if($this->uri->segment(6)==NULL)
			$offset = 0;
		else
			$offset = $this->per_page*($this->uri->segment(6)-1);

		$config['base_url'] = base_url()."download/category/".$category_id."/page";
		if($category_id=="all") $category_id=NULL;
		$total_documents = $this->Document->get_total_documents($category_id,$search_text);
	
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
		$config['uri_segment'] = 6;		
		
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

		$all_documents = $this->Document->get_all_documents($category_id,$this->per_page,$offset,$search_text);
		$this->template->set('all_documents',$all_documents);

		$this->template->set('selected_tab',"dashboard");
		$this->template->set('page_js',array());
		$this->template->set('page_css',array());
		$this->template->render();

	}
}

?>