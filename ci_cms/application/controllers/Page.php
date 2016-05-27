<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
    {
		parent::__construct();	
		$this->load->helper(array('cms'));
		$this->load->library(array('pagination','encryption'));
		//$this->load->model('user_model');
		//$this->load->database();
    }
	
	public function index($alias=''){
		if($alias == ''){
			show_404();
		}
		$data['page_title'] = 'Transport Solutions';
		$data['meta_keywords'] = 'Transport Solutions';
		$data['meta_description'] = 'Transport Solutions';
		$requested_menu_data = $this->db->get_where('cms_menu_item',array('mi_alias' => $alias))->row_array();
		
		if(!empty($requested_menu_data)){
			
			if($requested_menu_data['content_id'] != '' && $requested_menu_data['mi_item_type'] == 1){
				
				$data['content'] = $this->db->get_where('cms_content',array('content_id' => $requested_menu_data['content_id']))->row_array();
				
				
				
			}else if($requested_menu_data['section_id'] != '' && $requested_menu_data['mi_item_type'] == 4){
				
				
				$this->db->select('cms_category.category_name,cms_category.category_id as category_ids,cms_category.category_slug,cms_content.*');
				$this->db->from('cms_category');
				$this->db->join('cms_content','cms_category.category_id=cms_content.category_id','left');
				$this->db->where('cms_category.section_id',$requested_menu_data['section_id']);
				$this->db->where('cms_category.category_status','Active');
				$query = $this->db->get();
				$data['all_data'] = $query->result_array();
				
			}
			
			$this->load->view(''.$requested_menu_data['mi_template'],$data);
		}else{
			show_404();
		}//Check not empty
	}//end of function
	
	function category($alias){
		
		$this->db->select('cms_category.category_name,cms_category.category_id as category_ids,cms_category.category_slug,cms_content.*');
		$this->db->from('cms_category');
		$this->db->join('cms_content','cms_category.category_id=cms_content.category_id','left');
		$this->db->where('cms_category.category_slug',$alias);
		$this->db->where('cms_category.category_status','Active');
		$query = $this->db->get();
		$data['all_data'] = $query->result_array();
		
		$this->db->where('section_id = (select section_id from cms_category where category_slug="'.$alias.'")');
		$data['categories'] = $this->db->get('cms_category')->result_array();
		
		$this->load->view('blog_category',$data);
		
	}
	
	function article($alias){
		
		$this->db->select('cms_category.category_name,cms_category.category_id as category_ids,cms_category.category_slug,cms_content.*');
		$this->db->from('cms_content');
		$this->db->join('cms_category','cms_category.category_id=cms_content.category_id','left');
		$this->db->where('cms_content.title_alias',$alias);
		$query = $this->db->get();
		$data['content_detail'] = $query->row_array();
		
		
		$data['categories'] = $this->db->get_where('cms_category',array('section_id' => $data['content_detail']['section_id']))->result_array();
		
		$this->load->view('blog_detail',$data);
	}
	

}
