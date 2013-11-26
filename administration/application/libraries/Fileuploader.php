<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Fileuploader
{
	public $error=array(),$data,$filedata;
	
	function Fileuploader(){
    	$this->obj =& get_instance();
    }
	
	function upload_bills($form_field_name,$user_id){
		$upload_path = BILLS_ATTACHMENT_UPLOAD_PATH."/".$user_id;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = true;
		$config['max_size']	= 1000;
		$this->obj->load->library('upload', $config);
	
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->set('file_upload_error',$this->error[0]);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
	}
	
	function upload_category_attachments($form_field_name){
		$upload_path = CATEGORY_ATTACHMENT_UPLOAD_PATH;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['allowed_types'] = 'png|jpeg|jpg|gif';
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = true;
		$config['max_size']	= 1000;
		$this->obj->load->library('upload', $config);
	
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->assign('file_upload_error',$this->error[0]);
			print_r($this->error);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
	}
	
	function upload_document_attachments($form_field_name){
		$upload_path = DOCUMENT_ATTACHMENT_UPLOAD_PATH;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = TRUE;
		$config['max_size']	= 1000;
		$this->obj->load->library('upload', $config);
	
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->assign('file_upload_error',$this->error[0]);
			print_r($this->error);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
	}
	
	function upload_video_image($form_field_name){
		$upload_path = VIDEO_ATTACHMENT_UPLOAD_PATH;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['allowed_types'] = 'jpeg|jpg';
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = true;
		$config['max_size']	= 10000;
		$this->obj->load->library('upload', $config);
	
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->assign('file_upload_error',$this->error[0]);
			print_r($this->error);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
	}
	
	function upload_video($form_field_name){
		$upload_path = VIDEO_ATTACHMENT_UPLOAD_PATH;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$allowedExts = array("mp4", "mpeg", "mpg", "wmv", "flv", "avi");
		$extension = end(explode(".", $_FILES[$form_field_name]["name"]));
		if ((($_FILES[$form_field_name]["type"] == "video/mp4")
		|| ($_FILES[$form_field_name]["type"] == "video/wmv")
		|| ($_FILES[$form_field_name]["type"] == "video/x-ms-wmv")
		|| ($_FILES[$form_field_name]["type"] == "video/x-flv")
		|| ($_FILES[$form_field_name]["type"] == "video/mpeg")
		|| ($_FILES[$form_field_name]["type"] == "video/x-msvideo"))
		&& in_array($extension, $allowedExts)){
		  if ($_FILES[$form_field_name]["error"] > 0){
				echo "Return Code: " . $_FILES[$form_field_name]["error"] . "<br>";
			}
		  else{		
				if(file_exists($upload_path. $_FILES[$form_field_name]["name"])){
			  		echo $_FILES[$form_field_name]["name"] . " already exists. ";
				}
				else{
					$video_file_name = time().$_FILES[$form_field_name]["name"];
			  		move_uploaded_file($_FILES[$form_field_name]["tmp_name"], $upload_path . $video_file_name);
			 		$this->filedata['file_name'] = $video_file_name;
			  	}
			}
		  }
		else{
		  echo "Invalid file";
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		
		
		
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['allowed_types'] = '*';
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = true;
		$config['max_size']	= 0;  
		$this->obj->load->library('upload', $config);
		print_r($_FILES['video_file']);
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->assign('file_upload_error',$this->error[0]);
			print_r($this->error);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
		*/
	}
	
	function upload_instruction($form_field_name){
		$upload_path = VIDEO_ATTACHMENT_UPLOAD_PATH;
		if(!is_dir($upload_path)) mkdir($upload_path,0777,true);
		$config['upload_path'] = $upload_path; // after baseurl, ./uploads/
		$config['encrypt_name']=TRUE;
		$config['remove_spaces'] = true;
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size']	= 10000;
		$this->obj->load->library('upload', $config);
	
		if ( ! $this->obj->upload->do_upload($form_field_name)){
			array_push($this->error,$this->obj->upload->display_errors());
			$this->obj->template->assign('file_upload_error',$this->error[0]);
			print_r($this->error);
		}	
		else{	
			$data = array('upload_data' => $this->obj->upload->data());
			$this->filedata=$data['upload_data'];
			//print_r($this->filedata);
		}
	}
}
?>