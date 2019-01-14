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
	 * @see http://codeigniter.com/member_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Member extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       
		$this->load->model('member_model');
		$this->lang->load('member');
        check_logged_user();

    }

    public function index(){
		
		//$member_role = $this->session->memberdata['ehs_member_role_id'];
		$options = new stdClass();
		$this->data['module_assets'] = 'member/module_assets';
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
            redirect('member');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		public function view($id = false) {
		//dump($id);
       if (!$id){
            redirect('member');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'view';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 
	  public function delete_data($id = false) {
         if (!$id) {
             redirect('member');
         }else{
			
			 $this->member_model->setId($id);
             $deleted = $this->member_model->delete_data();
			 if($deleted) {
				  $this->session->set_flashdata('success_message', lang('delete_success_message'));
			 }else{
				 $this->session->set_flashdata('error_message', lang('error_message'));
			 }
             redirect('member');
         }
     }
	public function process() {
	
        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('full_name', 'Name', 'required|trim|xss_clean|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean|min_length[1]|max_length[50]');
            $this->form_validation->set_rules('email', 'E-mail ID', 'required');
            $this->form_validation->set_rules('role_id', 'Role ID', 'required');
            $this->form_validation->set_rules('member_description', 'Description', 'required|trim|xss_clean');
           $this->form_validation->set_rules('member_identification_code', 'Identification Code', 'required|trim|xss_clean|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('dept_id', 'Department ID', 'required|min_length[1]|max_length[10]');
           $this->form_validation->set_rules('display_picture_path', 'DP', 'required');
           $this->form_validation->set_rules('member_address', 'Address', 'required|trim|xss_clean|min_length[1]|max_length[100]');
           $this->form_validation->set_rules('member_city', 'City', 'required|trim|xss_clean|min_length[1]|max_length[20-]');
           $this->form_validation->set_rules('member_state', 'State', 'required|trim|xss_clean|min_length[1]|max_length[20]');
           $this->form_validation->set_rules('member_zip_code', 'Zip Code', 'required');
           $this->form_validation->set_rules('member_country', 'Country', 'required|trim|xss_clean|min_length[1]|max_length[20]');
           $this->form_validation->set_rules('member_phone', 'Phone', 'required');
          
			}
            
            if ($this->form_validation->run() == TRUE) {
                $this->set_model_data();
                if ($this->input->post('id') == 'new') {
                    $inseretd = $this->member_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->member_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
                redirect('member');
            } else {
                if ($this->input->post('id') == 'new') {
                    $this->create();
                } else {
                    $this->edit($this->input->post('id'));
                }
            }
        }
    
	
	public function set_model_data() {
        $memberObj = $this->member_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $memberObj->setId($id);
        }
        $member_name = $this->input->post('full_name');
        $memberObj->setFullName($full_name);

         $last_name = $this->input->post('last_name');
        $memberObj->setLastName($last_name);

		 $email = $this->input->post('email');
        $memberObj->setEmailId($email);


		 $role_id = $this->input->post('role_id');
        $memberObj->setRoleId($role_id);
	
		$member_description = $this->input->post('member_description');
        $memberObj->setMemberDescription($member_description);

		$member_identification_code = $this->input->post('member_identification_code');
        $memberObj->setMemberIdentificationCode($member_identification_code);
		
		$dept_id = $this->input->post('dept_id');
        $memberObj->setDeptId($dept_id);
		
		$display_picture_path = $this->input->post('display_picture_path');
        $memberObj->setDisplayPicturePath($display_picture_path);
		
		$member_address = $this->input->post('member_address');
        $memberObj->setMemberAddress($member_address);
		
		$member_city = $this->input->post('member_city');
        $memberObj->setMemberCity($member_city);
		
		$member_state = $this->input->post('member_state');
        $memberObj->setMemberState($member_state);
		
		$member_zip_code = $this->input->post('member_zip_code');
        $memberObj->setMemberZipCode($member_zip_code);
		
		$member_country = $this->input->post('member_country');
        $memberObj->setMemberCountry($member_country);
		
		$member_phone = $this->input->post('member_phone');
        $memberObj->setMemberPhone($member_phone);
		
		
        $memberObj->setStatus(1);
    

        return true;
    }
	
	public function get_model_data($id) {
        $memberObj = $this->member_model;
        $memberObj->setId($id);
        $memberObj->get_row();
        $response = new stdClass();
        $response->id = $memberObj->getId();
        $response->full_name = $memberObj->getFullName();
        $response->last_name = $memberObj->getLastName();
        $response->email = $memberObj->getEmailId();
        $response->role_id = $memberObj->getRoleId();
        $response->member_description = $memberObj->getMemberDescription();
		$response->member_identification_code = $memberObj->getMemberIdentificationCode();
        $response->dept_id = $memberObj->getDeptId();
        $response->display_picture_path = $memberObj->getDisplayPicturePath();
        $response->member_address = $memberObj->getMemberAddress();
        $response->member_city = $memberObj->getMemberCity();
        $response->member_state = $memberObj->getMemberState();
        $response->member_zip_code = $memberObj->getMemberZipCode();
        $response->member_country = $memberObj->getMemberCountry();
        $response->member_phone = $memberObj->getMemberPhone();
     //  dump($response);
		return $response;
    }
	public function update_status() {
        $id = $this->input->get('id');
        if (!$id) {
            redirect('member');
        } else {
            $this->member_model->setId($id);

            $status = $this->input->get('status');
            $this->member_model->setStatus($status);
            $this->member_model->update_status();
            die;
        }
    }
	
	

	 
	 
	}

	
