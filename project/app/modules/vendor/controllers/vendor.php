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
	 * @see http://codeigniter.com/vendor_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Vendor extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       
		$this->load->model('vendor_model');
		$this->lang->load('vendor');
		check_logged_user();

    }

    public function index(){
		
		//$vendor_role = $this->session->vendordata['ehs_vendor_role_id'];
		$options = new stdClass();
		$this->data['module_assets'] = 'vendor/module_assets';
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
            redirect('vendor');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		public function view($id = false) {
		//dump($id);
       if (!$id){
            redirect('vendor');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'view';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 
	  public function delete_data($id = false) {
         if (!$id) {
             redirect('vendor');
         }else{
			
			 $this->vendor_model->setId($id);
             $deleted = $this->vendor_model->delete_data();
			 if($deleted) {
				  $this->session->set_flashdata('success_message', lang('delete_success_message'));
			 }else{
				 $this->session->set_flashdata('error_message', lang('error_message'));
			 }
             redirect('vendor');
         }
     }
	public function process() {
	
        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('vendor_name', 'vendor', 'required|trim|xss_clean|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('vendor_address', 'Address', 'required|trim|xss_clean');
           $this->form_validation->set_rules('vendor_contact', 'Contact', 'required');
          
          
			
			}
            
            if ($this->form_validation->run() == TRUE) {
                $this->set_model_data();
                if ($this->input->post('id') == 'new') {
                    $inseretd = $this->vendor_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->vendor_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
                redirect('vendor');
            } else {
                if ($this->input->post('id') == 'new') {
                    $this->create();
                } else {
                    $this->edit($this->input->post('id'));
                }
            }
        }
    
	
	public function set_model_data() {
        $vendorObj = $this->vendor_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $vendorObj->setId($id);
        }
        $vendor_name = $this->input->post('vendor_name');
        $vendorObj->setVendorName($vendor_name);

        $vendor_address = $this->input->post('vendor_address');
        $vendorObj->setVendorAddress($vendor_address);
		
		
		
		$vendor_contact = $this->input->post('vendor_contact');
        $vendorObj->setVendorContact($vendor_contact);
		
		
        $vendorObj->setStatus(1);
    

        return true;
    }
	
	public function get_model_data($id) {
        $vendorObj = $this->vendor_model;
        $vendorObj->setId($id);
        $vendorObj->get_row();
        $response = new stdClass();
        $response->id = $vendorObj->getId();
        $response->vendor_name = $vendorObj->getVendorName();
        $response->vendor_address = $vendorObj->getVendorAddress();
        $response->vendor_contact = $vendorObj->getVendorContact();
     //  dump($response);
		return $response;
    }
	public function update_status() {
        $id = $this->input->get('id');
        if (!$id) {
            redirect('vendor');
        } else {
            $this->vendor_model->setId($id);

            $status = $this->input->get('status');
            $this->vendor_model->setStatus($status);
            $this->vendor_model->update_status();
            die;
        }
    }
	
	

	 
	 
	}

	
