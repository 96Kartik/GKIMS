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
	 * @see http://codeigniter.com/item_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Item extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       
		$this->load->model('item_model');
		$this->lang->load('item');
        check_logged_user();

    }

    public function index(){
		
		$options = new stdClass();
		$this->data['module_assets'] = 'item/module_assets';
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
            redirect('item');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		public function view($id = false) {
		//dump($id);
       if (!$id){
            redirect('item');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'view';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 
	  public function delete_data($id = false) {
         if (!$id) {
             redirect('item');
         }else{
			
			 $this->item_model->setId($id);
             $deleted = $this->item_model->delete_data();
			 if($deleted) {
				  $this->session->set_flashdata('success_message', lang('delete_success_message'));
			 }else{
				 $this->session->set_flashdata('error_message', lang('error_message'));
			 }
             redirect('item');
         }
     }
	public function process() {
	
        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('item_name', 'item', 'required|trim|xss_clean|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('item_model_number', 'Model No.', 'required|trim|xss_clean|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('category_id', 'Category ID', 'required');
            $this->form_validation->set_rules('item_identification_key', 'Identification Key', 'required|trim|xss_clean|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('item_description', 'Description', 'required|trim|xss_clean');
           $this->form_validation->set_rules('item_cost_price', 'Cost', 'required|trim|xss_clean|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('item_vendor_id', 'Vendor ID', 'required|trim|xss_clean|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('item_purchase_date', 'Purchase Date', 'required|trim|xss_clean|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('item_location', 'Location', 'required|trim|xss_clean|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('item_quantity', 'Quantity', 'required|trim|xss_clean|min_length[1]|max_length[10]');
          
			}
            
            if ($this->form_validation->run() == TRUE) {
                $this->set_model_data();
                if ($this->input->post('id') == 'new') {
                    $inseretd = $this->item_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->item_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
                redirect('item');
            } else {
                if ($this->input->post('id') == 'new') {
                    $this->create();
                } else {
                    $this->edit($this->input->post('id'));
                }
            }
        }
    
	
	public function set_model_data() {
        $itemObj = $this->item_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $itemObj->setId($id);
        }
        $item_name = $this->input->post('item_name');
        $itemObj->setItemName($item_name);

         $item_model_number = $this->input->post('item_model_number');
        $itemObj->setItemModelNumber($item_model_number);

		 $category_id = $this->input->post('category_id');
        $itemObj->setCategoryId($category_id);

		 $item_identification_key = $this->input->post('item_identification_key');
        $itemObj->setItemIdentificationKey($item_identification_key);

		
		$item_description = $this->input->post('item_description');
        $itemObj->setItemDescription($item_description);
		
		$item_cost_price = $this->input->post('item_cost_price');
        $itemObj->setItemCostPrice($item_cost_price);
		
		$item_vendor_id = $this->input->post('item_vendor_id');
        $itemObj->setItemVendorId($item_vendor_id);
		
		$item_purchase_date = $this->input->post('item_purchase_date');
        $itemObj->setItemPurchaseDate($item_purchase_date);
		
		$item_location = $this->input->post('item_location');
        $itemObj->setItemLocation($item_location);
		
		$item_quantity = $this->input->post('item_quantity');
        $itemObj->setItemQuantity($item_quantity);
		
		
        $itemObj->setStatus(1);
    

        return true;
    }
	
	public function get_model_data($id) {
        $itemObj = $this->item_model;
        $itemObj->setId($id);
        $itemObj->get_row();
        $response = new stdClass();
        $response->id = $itemObj->getId();
        $response->item_name = $itemObj->getItemName();
        $response->item_model_number = $itemObj->getItemModelNumber();
        $response->category_id = $itemObj->getCategoryId();
        $response->item_identification_key = $itemObj->getItemIdentificationKey();
        $response->item_description = $itemObj->getItemDescription();
        $response->item_cost_price = $itemObj->getItemCostPrice();
        $response->item_vendor_id = $itemObj->getItemVendorId();
        $response->item_purchase_date = $itemObj->getItemPurchaseDate();
        $response->item_location = $itemObj->getItemLocation();
        $response->item_quantity = $itemObj->getItemQuantity();
     //  dump($response);
		return $response;
    }
	public function update_status() {
        $id = $this->input->get('id');
        if (!$id) {
            redirect('item');
        } else {
            $this->item_model->setId($id);

            $status = $this->input->get('status');
            $this->item_model->setStatus($status);
            $this->item_model->update_status();
            die;
        }
    }
	
	

	 
	 
	}

	
