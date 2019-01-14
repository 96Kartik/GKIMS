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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class User extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       	// $this->load->model('user_model');
       // $this->lang->load('user');
       // $this->lang->load('common');
	   // check_logged_user();

    }

    public function index() {
		
        $options = new stdClass();
		 //$this->data['module_assets'] = 'user/module_assets';
		$this->data['view'] = 'main';
		//$this->load->view('theme/front/layout', $this->data);
    }
	 // public function create() {
        // $this->data['view'] = 'create';
        // $this->load->view('theme/front/layout', $this->data);
    // }

    // public function edit($id = false) {
        // if (!$id) {
            // redirect('user');
        // } else {
            // $this->data['record'] = $this->get_model_data($id);
            // $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
        // }
    // }
	// public function process() {
	//	dump($this->input->post());
        // if ($this->input->post()) {
            // $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            // $this->form_validation->set_rules('username', 'User Name', 'required|trim|xss_clean|min_length[4]|max_length[20]');
            // $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
            // $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
			 // if ($this->input->post('id') == 'new') {
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[ehs_users.email]');
			 // }
			// if($this->input->post('con_password') && $this->input->post('password')){
            // $this->form_validation->set_rules('password', 'Password', 'matches[con_password]');
            // $this->form_validation->set_rules('con_password', 'Confirm Password', '');
            // $this->form_validation->set_rules('phone', 'Phone Number', 'required');
			// }
            
            // if ($this->form_validation->run() == TRUE) {
                // $this->set_model_data();
                // if ($this->input->post('id') == 'new') {
                    // $inseretd = $this->user_model->insert_data();
                    // if($inseretd) {
                         // $this->session->set_flashdata('success_message', lang('add_success_message'));
                    // } else {
                        // $this->session->set_flashdata('error_message', lang('error_message'));
                    // }
                // } else {
                    // $updated = $this->user_model->update_data();
                     // if($updated) {
                         // $this->session->set_flashdata('success_message', lang('update_success_message'));
                    // } else {
                        // $this->session->set_flashdata('error_message', lang('error_message'));
                    // }
                // }
                // redirect('user');
            // } else {
                // if ($this->input->post('id') == 'new') {
                    // $this->create();
                // } else {
                    // $this->edit($this->input->post('id'));
                // }
            // }
        // }
    // }
	
	// public function set_model_data() {
        // $userObj = $this->user_model;

        // if ($this->input->post('id') != 'new') {
            // $id = $this->input->post('id');
            // $userObj->setId($id);
        // }
        // $username = $this->input->post('username');
        // $userObj->setUserName($username);

        // $first_name = $this->input->post('first_name');
        // $userObj->setFirstName($first_name);
		
		
		
		// $last_name = $this->input->post('last_name');
        // $userObj->setLastName($last_name);
		
		// $email = $this->input->post('email');
        // $userObj->setEmail($email);
		
		
		// if($this->input->post('con_password') && $this->input->post('password')){
			// $password = $this->input->post('password');
        // $userObj->setPassword($password);
		// }
		
		// $phone = $this->input->post('phone');
        // $userObj->setPhone($phone);
		
		// $department = $this->input->post('department');
        // $userObj->setDeptID($department);
		
		// $role = $this->input->post('role');
        // $userObj->setUserRole($role);
		
		// $user_type = $this->input->post('user_type');
        // $userObj->setUserType($user_type);

		// $allowed_vacations = $this->input->post('allowed_vacations');
        // $userObj->setAllowVacatios($allowed_vacations);
		
		// $allowed_hours = $this->input->post('allowed_hours');
        // $userObj->setAllowHours($allowed_hours);
		// if($this->input->post('is_timesheet_required')){
		// $is_timesheet_required = $this->input->post('is_timesheet_required');
        // $userObj->setTimeRequired($is_timesheet_required);
		// }else{
		// $userObj->setTimeRequired(0);
		// }
		
		
        // $userObj->setStatus(1);
        // $userObj->setCreatedOn();

        // return true;
    // }
	
	// public function get_model_data($id) {
        // $userObj = $this->user_model;
        // $userObj->setId($id);
        // $userObj->get_row();
        // $response = new stdClass();
        // $response->id = $userObj->getId();
        // $response->username = $userObj->getUserName();
        // $response->first_name = $userObj->getFirstName();
        // $response->last_name = $userObj->getLastName();
        // $response->email = $userObj->getEmail();
        // $response->dept_id = $userObj->getDeptID();
        // $response->phone = $userObj->getPhone();
        // $response->user_role = $userObj->getUserRole();
        // $response->user_type = $userObj->getUserType();
        // $response->allowed_vacations = $userObj->getAllowVacatios();
        // $response->allowed_hours = $userObj->getAllowHours();
        // $response->is_timesheet_required = $userObj->getTimeRequired();
		// return $response;
    // }
	// public function update_status() {
        // $id = $this->input->get('id');
        // if (!$id) {
            // redirect('user');
        // } else {
            // $this->user_model->setId($id);

            // $status = $this->input->get('status');
            // $this->user_model->setStatus($status);
            // $this->user_model->update_status();
            // die;
        // }
    // }
	
	// public function delete_data($id = false) {
        // if (!$id) {
            // redirect('user');
        // }else{
			
			// $this->user_model->setId($id);
            // $deleted = $this->user_model->delete_data();
			// if($deleted) {
				 // $this->session->set_flashdata('success_message', lang('delete_success_message'));
			// }else{
				// $this->session->set_flashdata('error_message', lang('error_message'));
			// }
            // redirect('user');
        // }
    // }

   

   
}
