<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage_menus extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('session' , 'form_validation' , 'grocery_CRUD' , 'ajax_grocery_crud'));
		checkUserLogin();
    }
    public function _example_output($output = null) {
        $this->load->view('setting' , $output);
    }
	
	public function menus(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_subject('Manage Menus');
		$crud->unset_print();
		$crud->unset_export();
		//$crud->unset_delete();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_menus');
		$crud->required_fields('menu_title', 'menu_status');
		$output = $crud->render();
		$page_title = array('page_title' => 'Manage Menus');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	
	public function menu_items(){
		$crud = new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_subject('Manage Menu Items');
		$crud->unset_print();
		$crud->unset_export();
		//$crud->unset_delete();
		$crud->unset_bulk_delete();
		$crud->unset_bulk_publish();
		$crud->unset_bulk_unpublish();
		$crud->set_table('cms_menu_item');
		$crud->set_relation('menu_id','cms_menus','menu_title');
		$crud->set_add_url_path(site_url('manage_menus/add_menu_items'));
		$crud->set_edit_url_path(site_url('manage_menus/edit_menu_items'));
		$crud->columns('menu_id','mi_title','mi_alias','mi_status');
		$crud->display_as('menu_id','Menu Category');
		$crud->display_as('mi_title','title');
		$crud->display_as('mi_alias','alias');
		$crud->display_as('mi_status','status');
		$output = $crud->render();
		$page_title = array('page_title' => 'Manage Category');
		$outputData = array_merge((array) $output , $page_title);
		$this->_example_output($outputData);
	}
	
	public function add_menu_items(){
		if($this->input->post()){
			
			$post = $this->input->post();
			$checkFormValidation = $this->__setFormRules();	
			
			if($post['mi_item_type'] == '3' && strpos($post['mi_link'], 'http://') === false){
				$link = 'http://'.$post['mi_link'];
			}else{
				$link = $post['mi_link'];
			}
			if($checkFormValidation){
				$insert_data = array(
					'menu_id' => $post['menu_id'],
					'mi_parant_menu' => $post['mi_parant_menu'],
					'mi_title' => $post['mi_title'],
					'mi_alias' => $post['mi_alias'],
					'mi_item_type' => $post['mi_item_type'],
					'content_id' => isset($post['content_id']) ? $post['content_id'] : '',
					'section_id' => isset($post['section_id']) ? $post['section_id'] : '',
					'mi_link' => $link,
					'visible_to' => $post['visible_to'],
					'mi_target' => $post['mi_target'],
					'mi_template' => $post['mi_template']
				);
				$this->db->insert('cms_menu_item',$insert_data);
				redirect('manage_menus/menu_items');
			}
		}
		$this->load->view('cms/add_menu_item');
	}
	
	public function edit_menu_items(){
		//$this->load->view('cms/add_menu_item');
	}
	
	function __setFormRules(){
		$this->form_validation->set_rules('mi_link', 'Menu Link',  'required');
		
		$this->form_validation->set_rules('menu_id', 'Menu',  'required');
		$this->form_validation->set_rules('mi_alias', 'Alias',  'required|is_unique[cms_menu_item.mi_alias]|callback_customAlpha');
		$this->form_validation->set_rules('mi_title', 'Menu title',  'required|callback_customAlpha');
		$this->form_validation->set_rules('mi_template', 'Template',  'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button data-dismiss="alert" class="close">×</button><i class="fa fa-times-circle"></i> ', '</div>');
		return $this->form_validation->run();
	}
	public function customAlpha($str){
		
		if ( !preg_replace('/[^A-Za-z0-9\-]/', '', $str) )	{
			 $this->form_validation->set_message('customAlpha', "Special character are not allowed in %s");
            return FALSE;
		}
	}

	
}
