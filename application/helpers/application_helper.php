<?php
function short_description($text,$number_of_words=NULL){
	if($number_of_words==NULL) $number_of_words = 25;	
	$content_body = strip_tags($text);
	preg_match('/^([^.!?\s]*[\.!?\s]+){0,'.$number_of_words.'}/', strip_tags($content_body), $abstract);
	return $abstract[0].'...';
}

function short_title($title,$number_of_letter=NULL){
	if($number_of_letter==NULL) $number_of_letter = 30;	
	$title = strip_tags($title);
	if(strlen($title)<=$number_of_letter) return $title;
	else return substr($title, 0,$number_of_letter).'...';
	return $title;
}

function offer_seo_description($offer){
	$seo_description = $offer->offer_package_description;
	return $seo_description;
}

function hotel_seo_description($hotel){
	$seo_description = $hotel->hotel_description;
	return $seo_description;
}

function offer_seo_title($offer){
	$CI =& get_instance(); //offer %hotel_name% %city% - %offer_title%
	$seo_title = str_replace('%id%',$offer->offer_id,$CI->config->item('offers_seo_title'));
	$seo_title = str_replace('%city%',$offer->city_name,$seo_title);
	$seo_title = str_replace('%hotel_name%',$offer->hotel_name,$seo_title);
	$seo_title = str_replace('%offer_title%',$offer->offer_title,$seo_title);
	return $seo_title;
}

function hotel_seo_title($hotel){
	$CI =& get_instance(); //%hotel_type% a %city% - %hotel_name%
	$seo_title = str_replace('%id%',$hotel->user_id,$CI->config->item('hotel_seo_title'));
	if($hotel->hotel_city=="-1") $city = $hotel->hotel_town; else $city = $hotel->city_name;
	$seo_title = str_replace('%city%',$city,$seo_title);
	$seo_title = str_replace('%hotel_type%',$hotel->hotel_type,$seo_title);
	$seo_title = str_replace('%hotel_name%',$hotel->hotel_name,$seo_title);
	//$seo_title = str_replace(' ','-',$seo_title);
	return $seo_title;
}

function offers_url($offer){
	$CI =& get_instance();
	$url = str_replace('%id%',$offer->offer_id,$CI->config->item('offers_detail_url'));
	$url = str_replace('%location%',$offer->city_name,$url);
	$url = str_replace('%name%',$offer->hotel_name,$url);
	$url = str_replace('%title%',$offer->offer_title,$url);
	$url = str_replace(' ','-',$url);
	return $url;
}

function hotel_url($hotel){
	$CI =& get_instance();
	$url = str_replace('%id%',$hotel->user_id,$CI->config->item('hotel_detail_url'));
	if($hotel->hotel_city=="-1") $city = $hotel->hotel_town; else $city = $hotel->city_name;
	$url = str_replace('%location%',$city,$url);
	$url = str_replace('%star%',$hotel->hotel_rating,$url);
	$url = str_replace('%name%',$hotel->hotel_name,$url);
	$url = str_replace(' ','-',$url);
	return $url;
}

function is_liked_this_offer($offer_id,$user_id){
	$CI =& get_instance();
	$CI->load->model('offer_model','Offer');
	return $CI->Offer->is_liked_this_offer($offer_id,$user_id);
}

function is_liked_this_profile($hotel_id,$user_id){
	$CI =& get_instance();
	$CI->load->model('userprofile_model','UserProfile');
	return $CI->UserProfile->is_liked_this_profile($hotel_id,$user_id);
}

function is_followed_this_profile($hotel_id,$user_id){
	$CI =& get_instance();
	$CI->load->model('userprofile_model','UserProfile');
	return $CI->UserProfile->is_followed_this_profile($hotel_id,$user_id);
}

function render_slideshow($page_id=NULL, $with_thumb = true){
	if($page_id!=NULL){
		$CI =& get_instance();
		$CI->load->model('page_model');
		$dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/slideshow/".$page_id."/";
		$thumb_dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/slideshow/".$page_id."/";
		$slideshow_images = getDirectoryList($dir);
		//print_r($slideshow_images);
		//$slideshow_images = sort($slideshow_images, SORT_NATURAL | SORT_FLAG_CASE);
		//print_r($slideshow_images);
		//print_r($slideshow_images = asort($slideshow_images));
		$thumb_images = getDirectoryList($thumb_dir);
		//$thumb_images = asort($thumb_images);
		$slideshow_html = '';
		$slideshow_images_ul = '';
		$thumb_images_ul = '';
		if(!empty($slideshow_images)){
			$slideshow_images_ul .= '';
			foreach($slideshow_images as $key => $slideshow_image){
				if($slideshow_image!="thumbnail"){
					$image_description = $CI->page_model->get_slideshow_image_description($slideshow_image, $page_id);
					$slideshow_images_ul .= '<div class="four-small-gallery columns alpha"><a rel="imagebox[gallery]" href="'.base_url().'assets/slideshow/'.$page_id.'/'.$slideshow_image.'"><img src="'.base_url().'assets/slideshow/'.$page_id.'/'.$slideshow_image.'" /></a></div>';
					if($image_description!=NULL){
						$slideshow_images_ul .= '<div class="description">'.$image_description.'</div>';
					}
				} 
			}
			$slideshow_images_ul .= '';
			
			$thumb_images_ul .= '<ul>';
			foreach($thumb_images as $key => $thumb_image){
				if($thumb_image!="thumbnail") $thumb_images_ul .= '<a href="#"><li><img src="'.base_url().'assets/slideshow/'.$page_id.'/thumbnail/'.$thumb_image.'" /></li></a>';
			}
			$thumb_images_ul .= '</ul>';
			
			$slideshow_html .= ''.$slideshow_images_ul.'';
			if($with_thumb){ $slideshow_html .=  '<div class="thumb_images">'.$thumb_images_ul.'</div>'; }
			return $slideshow_html;
		}else{
			return "";
		}
	}else{
		return "";
	}
}

function render_page_files($page_id=NULL, $with_thumb = true){
	if($page_id!=NULL){
		$CI =& get_instance();
		$CI->load->model('page_model');
		$dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/page_files/".$page_id."/";
		$thumb_dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/page_files/".$page_id."/";
		$slideshow_images = getDirectoryList($dir);
		//print_r($slideshow_images);
		//$slideshow_images = sort($slideshow_images, SORT_NATURAL | SORT_FLAG_CASE);
		//print_r($slideshow_images);
		//print_r($slideshow_images = asort($slideshow_images));
		$thumb_images = getDirectoryList($thumb_dir);
		//$thumb_images = asort($thumb_images);
		$slideshow_html = '';
		$slideshow_images_ul = '';
		$thumb_images_ul = '';
		if(!empty($slideshow_images)){
			$slideshow_images_ul .= '';
			foreach($slideshow_images as $key => $slideshow_image){
				if($slideshow_image!="thumbnail") {
					$image_description = $CI->page_model->get_page_files_description($slideshow_image, $page_id);
					$slideshow_images_ul .= '<div class="four-small-gallery columns alpha"><a href="'.base_url().'download/files/page_files/'.$page_id.'/'.$slideshow_image.'">'.$slideshow_image.'</a></div>';
					if($image_description!=NULL){
						$slideshow_images_ul .= '<div class="description">'.$image_description.'</div>';
					}	
				}
			}
			$slideshow_images_ul .= '';
			
			$slideshow_html .= ''.$slideshow_images_ul.'';
			return $slideshow_html;
		}else{
			return "";
		}
	}else{
		return "";
	}
}

function render_page_videos($page_id=NULL, $with_thumb = true){
	if($page_id!=NULL){
		$CI =& get_instance();
		$CI->load->model('page_model');
		$dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/page_videos/".$page_id."/";
		$thumb_dir = $_SERVER['DOCUMENT_ROOT']."/".$CI->config->item('project_folder_name')."/assets/page_videos/".$page_id."/";
		$slideshow_images = getDirectoryList($dir);
		//print_r($slideshow_images);
		//$slideshow_images = sort($slideshow_images, SORT_NATURAL | SORT_FLAG_CASE);
		//print_r($slideshow_images);
		//print_r($slideshow_images = asort($slideshow_images));
		$thumb_images = getDirectoryList($thumb_dir);
		//$thumb_images = asort($thumb_images);
		$slideshow_html = '';
		$slideshow_images_ul = '';
		$thumb_images_ul = '';
		if(!empty($slideshow_images)){
			$slideshow_images_ul .= '';
			foreach($slideshow_images as $key => $slideshow_image){
				if($slideshow_image!="thumbnail") {
					$image_description = $CI->page_model->get_page_video_description($slideshow_image, $page_id);
					$slideshow_images_ul .= '<div class="four-small-gallery columns alpha"><a href="'.base_url().'assets/page_videos/'.$page_id.'/'.$slideshow_image.'">'.$slideshow_image.'</a></div>';
					if($image_description!=NULL){
						$slideshow_images_ul .= '<div class="description">'.$image_description.'</div>';
					}	
				}
			}
			$slideshow_images_ul .= '';
			
			$slideshow_html .= ''.$slideshow_images_ul.'';
			
			return $slideshow_html;
		}else{
			return "";
		}
	}else{
		return "";
	}
}

function getDirectoryList($directory){
    // create an array to hold directory list
    $results = array();
    // create a handler for the directory
    $handler = @opendir($directory);
    // open directory and walk through the filenames
    while ($file = @readdir($handler)) {
      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != "..") {
        $results[] = $file;
      }
    }
    // tidy up: close the handler
    @closedir($handler);
    // done!
	sort($results , SORT_STRING);
    return $results;
}

function list_events(){
	$CI =& get_instance();
	$CI->load->model('event_model');
	if($CI->input->get('month'))
		$m = $CI->input->get('month');
	else
		$m = date('m');

	$months_name = array('Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
	
	if($CI->input->get('year'))
		$y = $CI->input->get('year');
	else
		$y = date('Y');
	
	for($i=1;$i<=31;$i++){
		$event_str = "";
		$d = $i;
		$date = $y."-".$m."-".$d." 00:00:00";
		$all_events = $CI->event_model->get_all_events($date);
		if($all_events!=NULL){
			$event_str = $event_str. '<div class="post-eventi">
			
											<div class="alpha omega two columns">
												<div class="news-data"><h5>'.$d.'</h5>'.$months_name[($m-1)].'<br><strong>'.date("Y").'</strong></div>
											</div>
											<div class="alpha nine columns omega">
												<div class="post-content-eventi">		
													<div class="clearfix-small"></div>';
										
			foreach($all_events as $key=>$value){
				$event_str = $event_str. '<h4><a href="'.base_url().'events/detail/'.$value->event_id.'">'.$value->event_name.' <span class="time">ore '.$value->event_start_time.'</span></a></h4>';
			}
			$event_str = $event_str. '</div>
											</div>		
										</div>
										<div class="clearfix-big"></div>';		
			echo $event_str;	
		}
	}
}

function print_month_name(){
	$CI =& get_instance();
	if($CI->input->get('month'))
		$m = $CI->input->get('month');
	else
		$m = date('m');

	$months_name = array('Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
	if($CI->input->get('year'))
		$y = $CI->input->get('year');
	else
		$y = date('Y');

	echo $months_name[($m-1)].", ".$y;
}


function show_event_widget($count=NULL){
	$CI =& get_instance();
	$CI->load->model('event_model');
	$d = date('d');
	$m = date('m');
	$months_name = array('Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
	$y = date('Y');
	$i=$d;
	if($count1=NULL) $count = $count; else $count=4;
	$cn = 0;
	for($m;$m<=12;$m++){
		for($i;$i<=31;$i++){
			$event_str = "";
			$d = $i;
			$date = $y."-".$m."-".$d." 00:00:00";
			$all_events = $CI->event_model->get_all_events($date);
			if($all_events!=NULL){
				$event_str = $event_str. '';
											
				foreach($all_events as $key=>$value){
					$event_str = $event_str. '
						<h4><strong>'.$d.' '.$months_name[($m-1)].' '.date("Y").'</strong>  | <a href="'.base_url().'events/detail/'.$value->event_id.'">'.$value->event_name.'</a> <span class="time">ore '.$value->event_start_time.'</span></h4>
			';
				}
				$event_str = $event_str. '';		
				echo $event_str;
				$cn++;
				if($cn==$count) 
				break;	
			}
			if($cn==$count) 
			break;
		}
		$i=0;
	}
}


function list_subpages_upto3level($page_id=NULL){
	if($page_id!=NULL){
		$CI =& get_instance();
		$CI->load->model('page_model');
		$page_content = $CI->page_model->get_page_content($page_id);
		$mother_page_url="";
		if($page_content->page_url!=NULL)
		$mother_page_url = $page_content->page_url;
		
		$subpagelist = $CI->page_model->get_sub_pages($page_id);
		if($subpagelist!=NULL){
			echo "<ul>";
			foreach ($subpagelist as $key => $value) {
				echo "<li><a href='".base_url() . CURRENT_LANGUAGE. "/" .$mother_page_url."/".$value->page_url. "'>".$value->page_title."</a></li>";
				$subpagelist2 = $CI->page_model->get_sub_pages($value->page_id);
				if($subpagelist2!=NULL){
					echo "<ul>";
					foreach ($subpagelist2 as $key2 => $value2) {
						echo "<li><a href='".base_url() . CURRENT_LANGUAGE. "/" .$mother_page_url ."/". $value->page_url."/".$value2->page_url. "'>".$value2->page_title."</a></li>";
					}
					echo "</ul>";
				}
				
			}
			echo "</ul>";
		}
	}
}
?>