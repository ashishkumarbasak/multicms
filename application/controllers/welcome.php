<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Welcome extends CI_Controller {
	
	public $latest_offer_limit=4;
	public $hotel_profile_for_map=50;
	public $language_id;
	function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->model('page_model');
		$this->load->model('language_model');		
		$this->language_id = $this->language_model->get_language_id(CURRENT_LANGUAGE);
		
		$this->template->set('page','home');
	}
	
	function index(){
		//echo $url_slug;
		$page_id = $this->page_model->get_homepage_id($this->language_id);
		if($page_id!=NULL){
			$page_content = $this->page_model->get_page_content($page_id);
			$addition_content =  $this->page_model->get_page_additional_content($page_id);
			
			$this->template->set('page_id',$page_content->page_id);
			$this->template->set('page_template',$page_content->page_template);
			$this->template->set('mother_page_id',$page_content->mother_page_id);
			$this->template->set('is_homepage',$page_content->is_homepage);
			$this->template->set('page_title',$page_content->page_title);
			
			if($page_content->page_seotitle!=NULL)
				$this->template->set('seo_title',$page_content->page_seotitle);
			else
				$this->template->set('seo_title',$page_content->page_title);
			if($page_content->page_seodescription!=NULL)
				$this->template->set('seo_description',$page_content->page_seodescription);
			else
				$this->template->set('seo_description',$page_content->description_1);
			$this->template->set('seo_keywords',$page_content->page_seokeywords);
			
			$this->template->set('page_url',$page_content->page_url);
			$this->template->set('photo_1',$page_content->photo);
			$this->template->set('description_1',$page_content->description_1);
			$this->template->set('photo_2',$page_content->photo_1);
			$this->template->set('description_2',$page_content->description_2);
			$this->template->set('photo_3',$page_content->photo_2);
			$this->template->set('date_created',$page_content->date_created);
			$this->template->set('status',$page_content->status);
			$this->template->set('author',$page_content->author);
			
			if($page_content->mother_page_id!="0")
				$subpagelist = $this->page_model->get_sub_pages($page_content->mother_page_id, $this->language_id);
			else
				$subpagelist = $this->page_model->get_sub_pages($page_id, NULL);
				
			if($this->uri->segment(1)!=NULL)
			$this->template->set('mother_page_url',$this->uri->segment(2));
			$this->template->set('subpagelist',$subpagelist);
			
			$additional_title = array();
			$additional_description = array();
			$additional_photo = array();
			$additional_file = array();	
			$additional_field_value = array();		
			if($addition_content!=NULL){
				foreach($addition_content as $ke=>$va){
					if($va->field_type=="description"){
						array_push($additional_description,$va->field_value);
					}
					elseif($va->field_type=="title"){
						array_push($additional_title,$va->field_value);
					}
					elseif($va->field_type=="photo"){
						array_push($additional_photo,$va->field_value);
					}
					elseif($va->field_type=="file"){
						array_push($additional_file,$va->field_value);
					}
					else{
						array_push($additional_field_value,$va->field_value);
					}
					
					$this->template->set('additional_description',$additional_description);
					$this->template->set('additional_title',$additional_title);
					$this->template->set('additional_photo',$additional_photo);
					$this->template->set('additional_file',$additional_file);
					$this->template->set('additiona_field_value',$additional_field_value);
				}
			}

			$list_products = "";
			$list_of_products = $this->page_model->get_list_of_products($page_id);
			if($list_of_products!=NULL)
				foreach ($list_of_products as $key => $value) {
					if($value->photo!=NULL || $value->photo!="")
						$image = base_url().'assets/pages/'.$value->photo;
					else
						$image = base_url().'assets/images/ser.jpg';

					$list_products .= '<div class="one-third column" style="margin-bottom:20px;">
						<div class="item-img">
							<a href="'.base_url()."products/".$value->page_url.'/?lang='.CURRENT_LANGUAGE.'" title="'.$value->page_title.'">
								<img src="'.$image .'" alt=""/>
							</a>
						</div>
						<div class="portfolio-item-meta">
							<h5>
								<a href="'.base_url()."products/".$value->page_url.'/?lang='.CURRENT_LANGUAGE.'">
									<font>
										<font>'.$value->page_title.'</font>
									</font>
								</a>
							</h5>
							<p>
								<font>
									<font>'.$this->limit_text(strip_tags($value->description_1), 10).'</font>
								</font>
							</p>
						</div>
					</div>';
				}
			$this->template->set('list_products',$list_products);	

			
			$list_products_small = "";
			$list_of_products_small = $this->page_model->get_list_of_products($page_id);
			if($list_of_products_small!=NULL)
				foreach ($list_of_products_small as $key => $value) {
					if($value->photo!=NULL || $value->photo!="")
						$image = base_url().'assets/pages/'.$value->photo;
					else
						$image = base_url().'assets/images/ser.jpg';

					$list_products_small .= '<div class="one-third alpha omega column" style="margin-bottom:20px;">
						<div class="item-img">
							<a href="'.base_url()."products/".$value->page_url.'/?lang='.CURRENT_LANGUAGE.'" title="'.$value->page_title.'">
								<img src="'.$image .'" alt=""/>
							</a>
						</div>
						<div class="portfolio-item-meta">
							<h5>
								<a href="'.base_url()."products/".$value->page_url.'/?lang='.CURRENT_LANGUAGE.'">
									<font>
										<font>'.$value->page_title.'</font>
									</font>
								</a>
							</h5>
							<p>
								<font>
									<font>'.$this->limit_text(strip_tags($value->description_1), 10).'</font>
								</font>
							</p>
						</div>
					</div>';
				}
			$this->template->set('list_products_small',$list_products_small);	
			
			
			
			$list_news = "";
			$list_of_news = $this->page_model->get_list_of_news($page_id);
			if($list_of_news!=NULL)
				foreach ($list_of_news as $key => $value) {
					$list_news .= '<div class="two-thirds column alpha omega margin-bottom-20">
						<div class="portfolio-item-meta">
							<h5>
								<a href="'.base_url()."news/".$value->page_url.'/?lang='.CURRENT_LANGUAGE.'">
									<font>
										<font>'.$value->page_title.'</font>
									</font>
								</a>
							</h5>
							<p>
								<font>
									<font>'.$this->limit_text(strip_tags($value->description_1), 15).'</font>
								</font>
							</p>
						</div>
					</div>';
				}
			$this->template->set('list_news',$list_news);
			
			if($page_content->mother_page_id==-1)
			$this->config->set_item('OCU_layout_folder','templates/products/');
			else if($page_content->mother_page_id==-2)
			$this->config->set_item('OCU_layout_folder','templates/news/');
			else
			$this->config->set_item('OCU_layout_folder','templates/');

			$this->template->render($page_content->page_template);
		}else{
			$this->config->set_item('OCU_layout_folder','layouts/');
			$this->template->render('default_home_page');
		}
		
	}

	function limit_text($text=NULL, $limit) {
      if($text!=NULL){
      	if (str_word_count($text, 0) > $limit) {
	          $words = str_word_count($text, 2);
	          $pos = array_keys($words);
	          $text = substr($text, 0, $pos[$limit]) . '...';
	      }
	      return $text;
      }else{
      	return "";
      }
    }
	
}
?>