<?php

	/**
	 * Home Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://globier.com/home
	 *	- or -  
	 * 		http://globtier.com/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/category_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Category extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       
		$this->load->model('category_model');
		$this->lang->load('category');
		check_logged_user();

    }

    public function index(){
		
		//$category_role = $this->session->categorydata['ehs_category_role_id'];
		$options = new stdClass();
		$this->data['module_assets'] = 'category/module_assets';
		$this->data['view'] = 'main';
		
		$this->load->view('theme/admin/layout',$this->data);
    }
	
	 public function create() {
      $this->data['view'] = 'create';
      $this->load->view('theme/admin/layout', $this->data);
     }
	public function edit($id = false) {
		//dump($id);
       if (!$id){
            redirect('category');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		public function view($id = false) {
		//dump($id);
       if (!$id){
            redirect('category');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'view';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 
	  public function delete_data($id = false) {
         if (!$id) {
             redirect('category');
         }else{
			
			 $this->category_model->setId($id);
             $deleted = $this->category_model->delete_data();
			 if($deleted) {
				  $this->session->set_flashdata('success_message', lang('delete_success_message'));
			 }else{
				 $this->session->set_flashdata('error_message', lang('error_message'));
			 }
             redirect('category');
         }
     }
	public function process() {
	
        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('category_name', 'Category', 'required|trim|xss_clean|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('category_description', 'Description', 'required|trim|xss_clean');
           $this->form_validation->set_rules('category_code', 'Code', 'required|trim|xss_clean|min_length[4]|max_length[10]');
          
           $this->form_validation->set_rules('no_of_items', 'No. Of Items', 'required');
			
			}
            
            if ($this->form_validation->run() == TRUE) {
                $this->set_model_data();
                if ($this->input->post('id') == 'new') {
                    $inseretd = $this->category_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->category_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
                redirect('category');
            } else {
                if ($this->input->post('id') == 'new') {
                    $this->create();
                } else {
                    $this->edit($this->input->post('id'));
                }
            }
        }
    
	
	public function set_model_data() {
        $categoryObj = $this->category_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $categoryObj->setId($id);
        }
        $category_name = $this->input->post('category_name');
        $categoryObj->setCategoryName($category_name);

        $category_description = $this->input->post('category_description');
        $categoryObj->setCategoryDescription($category_description);
		
		
		
		$category_code = $this->input->post('category_code');
        $categoryObj->setCategoryCode($category_code);
		
		$no_of_items = $this->input->post('no_of_items');
        $categoryObj->setNoOfItems($no_of_items);
		
		
        $categoryObj->setStatus(1);
    

        return true;
    }
	
	public function get_model_data($id) {
        $categoryObj = $this->category_model;
        $categoryObj->setId($id);
        $categoryObj->get_row();
        $response = new stdClass();
        $response->id = $categoryObj->getId();
        $response->category_name = $categoryObj->getCategoryName();
        $response->category_description = $categoryObj->getCategoryDescription();
        $response->category_code = $categoryObj->getCategoryCode();
        $response->no_of_items = $categoryObj->getNoOfItems();
     //  dump($response);
		return $response;
    }
	public function update_status() {
        $id = $this->input->get('id');
        if (!$id) {
            redirect('category');
        } else {
            $this->category_model->setId($id);

            $status = $this->input->get('status');
            $this->category_model->setStatus($status);
            $this->category_model->update_status();
            die;
        }
    }
	
	

	 
	 
	}

	
