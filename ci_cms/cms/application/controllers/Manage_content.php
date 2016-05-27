<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage_content extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('session' , 'form_validation' , 'grocery_CRUD' , 'ajax_grocery_crud'));
		
		checkUserLogin();
    }
    public function _example_output($output = null) {
        $this->load->view('setting' , $output);
    }
	
	public function section(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_subject('Manage Section');
		$crud->unset_print();
		$crud->unset_export();
		//$crud->unset_delete();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_section');
		$crud->change_field_type('section_slug', 'hidden');
		$crud->required_fields('section_name','section_slug', 'section_status');
		$crud->set_rules('section_slug', 'Section','trim|callback_section_slug_validity');
		$crud->callback_before_insert(array($this,'make_section_alias'));
		$crud->callback_before_update(array($this,'make_section_alias'));
		$output = $crud->render();
		$page_title = array('page_title' => 'Manage Section');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	
	public function category(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_subject('Manage Category');
		$crud->unset_print();
		$crud->unset_export();
		//$crud->unset_delete();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_category');
		$crud->set_relation('section_id','cms_section','section_name');
		$crud->change_field_type('category_slug', 'hidden');
		$crud->columns('section_id','category_name', 'category_desc','category_status');
		$crud->fields('section_id','category_name','category_slug', 'category_desc','category_image','category_status');
		$crud->required_fields('section_id','category_name','category_slug', 'category_desc','category_status');
		$crud->set_rules('category_slug', 'Category','trim|callback_category_slug_validity');
		$crud->set_field_upload('category_image','media/');
		$crud->callback_before_insert(array($this,'make_category_alias'));
		$crud->callback_before_update(array($this,'make_category_alias'));
		$output = $crud->render();
		$page_title = array('page_title' => 'Manage Category');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	
	public function content(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_subject('Manage Content');
		$crud->unset_print();
		$crud->unset_export();
		//$crud->unset_delete();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_content');
		$crud->set_relation('section_id','cms_section','section_name');
		$crud->set_relation('category_id','cms_category','category_name');
		$crud->columns('section_id','category_id','content_title','title_alias','content','content_status');
		$crud->change_field_type('title_alias', 'hidden');
		$crud->required_fields('section_id','category_id','content_title','content','content_status');
		$crud->fields('section_id','category_id','content_title','title_alias','content','content_image','meta_keyword','meta_desc','publish_date','unpublish_date','content_status');
		$crud->set_rules('title_alias', 'Content Alias','trim|callback_content_alias_validity');
		$crud->set_field_upload('content_image','media/');
		$crud->callback_before_insert(array($this,'make_alias'));
		$crud->callback_before_update(array($this,'make_alias'));
	
		//DEPENDENT DROPDOWN SETUP
			$dd_data = array(
				//GET THE STATE OF THE CURRENT PAGE - E.G LIST | ADD
				'dd_state' =>  $crud->getState(),
				//SETUP YOUR DROPDOWNS
				//Parent field item always listed first in array, in this case countryID
				//Child field items need to follow in order, e.g stateID then cityID
				'dd_dropdowns' => array('section_id','category_id'),
				//SETUP URL POST FOR EACH CHILD
				//List in order as per above
					'dd_url' => array('', site_url().'/manage_content/get_category/'),
				//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
				'dd_ajax_loader' => base_url().'ajax-loader.gif'
			);
			
		$output = $crud->render();	
		$output->dropdown_setup = $dd_data;
		
		$page_title = array('page_title' => 'Manage Content');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	public function get_category(){
		$section_id = $this->uri->segment(3);
		$this->db->select("*")->from('cms_category')->where('section_id', $section_id);
		$db = $this->db->get();
		$array = array();
		foreach($db->result() as $row):
		$array[] = array("value" => $row->category_id, "property" => $row->category_name);
		endforeach;
		echo json_encode($array);
		exit;
	}
	
	function make_alias($post_array) {
	 
	  $str = str_replace(' ','-',$post_array['content_title']);
	  $post_array['title_alias'] =  strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $str)); // Removes special chars.
	
	  return $post_array;
	} 
	 
	function make_category_alias($post_array) {
	 
	  $str = str_replace(' ','-',$post_array['category_name']);
	  $post_array['category_slug'] =  strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $str)); // Removes special chars.
	
	  return $post_array;
	}  
	
	function make_section_alias($post_array) {
	 
	  $str = str_replace(' ','-',$post_array['section_name']);
	  $post_array['section_slug'] =  strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $str)); // Removes special chars.
	
	  return $post_array;
	}  
	
	public function content_alias_validity($alias){
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id)){   
			$this->db->where("title_alias",$alias);
			$this->db->where("content_id !=",$id);
			$check_alias = $this->db->get('cms_content');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('content_alias_validity', 'Alias already in use');
				return false;
			}else{
				return true;
			}
			
		}else{
			$this->db->where("title_alias",$alias);
			$check_alias = $this->db->get('cms_content');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('content_alias_validity', 'Alias already in use');
				return false;
			}else{
				return true;
			}
		
		}
	}
	public function section_slug_validity($alias){
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id)){   
			$this->db->where("section_slug",$alias);
			$this->db->where("section_id !=",$id);
			$check_alias = $this->db->get('cms_section');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('section_slug_validity', 'Slug already in use');
				return false;
			}else{
				return true;
			}
			
		}else{
			$this->db->where("section_slug",$alias);
			$check_alias = $this->db->get('cms_section');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('section_slug_validity', 'Slug already in use');
				return false;
			}else{
				return true;
			}
		
		}
	}
	
	
	public function category_slug_validity($alias){
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id)){   
			$this->db->where("category_slug",$alias);
			$this->db->where("category_id !=",$id);
			$check_alias = $this->db->get('cms_category');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('category_slug_validity', 'Slug already in use');
				return false;
			}else{
				return true;
			}
			
		}else{
			$this->db->where("category_slug",$alias);
			$check_alias = $this->db->get('cms_category');
			if($check_alias->num_rows() > 0){
				$this->form_validation->set_message('category_slug_validity', 'Slug already in use');
				return false;
			}else{
				return true;
			}
		
		}
	}
	
	
	public function slider(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$where = '1 GROUP BY slider_name';
		$crud->where ($where);
		$crud->set_subject('Manage slider');
		$crud->unset_print();
		$crud->unset_export();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_slider');
		
		$crud->set_add_url_path(site_url('manage_content/manage_slider'));
		//$crud->add_action('Unlock', '', '','fa-unlock',array($this,'unlock_link'));
		$crud->add_action('Edit', '', '', 'btn btn-info',array($this,'edit_link'));
		$crud->add_action('Delete', '', '', 'btn btn-info',array($this,'delete_link'));
		
		$crud->columns('slider_name','shortcode');
		$output = $crud->render();
		$page_title = array('page_title' => 'Manage slider');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	
	function edit_link($primary_key , $row){
    	return site_url('manage_content/manage_slider/'.$row->slider_name).'" id="'.$primary_key.'" class="unlock_app btn btn-default';
	}
	function delete_link($primary_key , $row){
    	return site_url('manage_content/delete_slider/'.$row->slider_name).'" id="'.$primary_key.'" class="unlock_app btn btn-default';
	}
	
	
	public function manage_slider($slider=""){
		
	
		if($this->input->post()){
			$post = $this->input->post();
			
			$upload_directory = FCPATH."media/slider/";
			$short_code = str_replace(' ','-',$post['slider_name']);
			foreach($post['id'] as $key=>$val){
				if($post['id'][$key] != ''){
					$warehouse_image= array(
						'slider_name' => $short_code ,
						'image_title' => $post['image_title'][$key],
						'shortcode' => '{SLIDER-'.strtoupper($short_code).'}'
					 );
					 
					 $this->db->update('cms_slider',$warehouse_image,array('id' => $post['id'][$key]));
					
				}else{
					if(array_key_exists($key,$_FILES['image_name']['name'])){
						$file_name = $_FILES['image_name']['name'][$key];
						if($file_name != ''){
							$temp_name = $_FILES['image_name']['tmp_name'][$key];
							$ext = @pathinfo($file_name, PATHINFO_EXTENSION);
							$file_name   = time().rand(1000,99999).'.'.$ext;
							$file_path = $upload_directory.$file_name; 
							@move_uploaded_file($temp_name, $file_path);
							$img = resize_images($file_path,1300,400, $upload_directory.'1300400/'); 	   					 	
							$img = resize_images($file_path,800,600, $upload_directory.'800600/');
							$slider_image= array(
								'slider_name' => $short_code ,
								'image_name'=> $file_name,
								'image_title' => $post['image_title'][$key],
								'shortcode' => '{SLIDER-'.strtoupper($short_code).'}'
								
								);
							$this->db->insert('cms_slider',$slider_image);
						}
					}
				}
			}
			
			$this->session->set_flashdata('warehouse_success', 'slider Information saved.');
			redirect('manage_content/slider');
		}else{
			$data['slider_images'] = $this->db->get_where('cms_slider',array('slider_name' => $slider))->result_array();
			$this->load->view('cms/slider_images',$data);
		}
		
		
	
	}
	
	function delete_slider($slider){
		$this->db->where('slider_name',$slider);
		$this->db->delete('cms_slider');
		$this->session->set_flashdata('warehouse_success', 'Slider Deleted.');
		redirect('manage_content/slider');
	}
	
	function delete_images($id){
		$slider_image_id = explode('_',$id);
		$image = $this->db->get_where('cms_slider',array('id' => $slider_image_id[2]))->row_array();
		unlink(FCPATH."media/slider/".$image['image_name']);
		unlink(FCPATH."media/slider/1300400/".$image['image_name']);
		unlink(FCPATH."media/slider/800600/".$image['image_name']);
		$this->db->where('id',$slider_image_id[2]);
		$this->db->delete('cms_slider');
		
	}
	
	
	
}
