<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 error_reporting(0);
class Auth extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('auth_model');
		$this->lang->load('login');
       // check_user_logged();
    }

    public function index() {
			
       $this->load->view('admin/login');
    }

    public function process() {
		
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
			//dump($this->input->post());
			$this->load->view('admin/login');
        } else {
            $user_name = $this->input->post('username');
            $password = $this->input->post('password');
            $this->auth_model->setUsername($user_name);
            $this->auth_model->setPassword($password);
            $validate = $this->auth_model->validate_user();
			//dump($validate);
            if(!empty($validate)) {
				$userdata = array();
                $userdata['kart_user_id'] = $validate->user_id;
                $userdata['kart_first_name'] = $validate->first_name;
                $userdata['kart_last_name'] = $validate->last_name;
                $userdata['kart_email'] = $validate->email;
               
                $userdata['kart_logged_front'] = TRUE;
				
                $this->session->set_userdata($userdata);
				if($validate->is_admin == 1){
					
					redirect('home');
				}
				
					
                
            } else {
                $this->session->set_flashdata('message', lang('invalid_credential_messege'));
                redirect('admin/auth');
            }
        }
    }
	
	public function logout() {
		$this->session->sess_destroy();
		//session_destroy();
		redirect('admin/auth');
		
	}
	
	public function forgot_password() {
		
		$this->data['view'] = 'forgot_password';
		
		$this->load->view('admin/forgot_password');
		
				
		
	}
	
	public function forgot_pass_reset(){
		
		if($this->input->post('email')){
			$email = $this->input->post('email');
			
			$validate = $this->auth_model->validate_user_by_email($email);
			if($validate){
				
				$this->password_reset($email);
				
				 $this->session->set_flashdata('message', 'Please check your email. we has sent new password to you. Thanks');
                redirect('admin/auth/forgot_password');
				
			}else{
				 $this->session->set_flashdata('message', 'Given email is not registered with us.Please provide valid email');
                redirect('admin/auth/forgot_password');
				
			}
		}
	}
	public function password_reset($email){
		$this->load->library('email');
		$reset = $this->auth_model->forgot_password($email);
		//dump($reset);
		if($reset){
			$this->email->from('kartikeya.96.misra@gmail.com', 'Inventory Support');
		$this->email->to($email);
		 
		$this->email->subject('Password Reset');
		$this->email->message('Your New password is -: '.$reset);
		$this->email->send();
		}
		
		
	}
	public function edit_profile($id){
		//dump($id);
		  $this->data['record'] = $this->get_model_data($id);
		$this->data['view'] = 'edit_profile';
		
		$this->load->view('theme/admin/layout',$this->data);
		

	}
	
	public function process_profile(){
		
		//dump($this->input->post());
		$id = $this->input->post('id');
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
		  if ($this->form_validation->run() == FALSE) {
			//dump($this->input->post());
			redirect('admin/auth/edit_profile/'.$id);
        } else {
            $data = $this->set_model_data();
			//dump($data);
		if ($this->input->post('id') == 'new') {
                    $inseretd = $this->auth_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->auth_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
			
          redirect('admin/auth/edit_profile/'.$id);
			
        }
	}
	
	public function change_password(){
		$id = $this->input->post('id');
		//dump($id);
		$this->data['record'] = $this->get_model_data($id);
		 if($this->input->post()) {
            $this->load->model('login/auth_model');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('old_password', 'old password', 'trim|required|callback_password_check');
            $this->form_validation->set_rules('new_password', 'new password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[new_password]');
            if($this->form_validation->run() == TRUE) {
                $password = $this->input->post('new_password');
                $this->auth_model->setPassword($password);
                $updated = $this->auth_model->update_password();
                if($updated){
                    $this->session->set_flashdata('message', 'Your password is changed.');
                    redirect('admin/change_password');
                }
            }
        }
		$this->data['view'] = 'change_password';
		
		$this->load->view('theme/admin/layout',$this->data);
		

	}
	public function upload_img(){
		//dump($_POST);
		$config['upload_path'] = 'assets/uploads/users/';

        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = time() . date('Ymd');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileupload')) {
			
            $error = (object) array('error' => $this->upload->display_errors('<span class="error">', '</span>'));
			dump($error);
            $this->data['error'] = $error->error;
            return $this;
        } else {
            $data = (object) array('upload_data' => $this->upload->data());
      
          
            $this->load->library('image_lib');
          
            $image = array(
                'image_name'=>$data->upload_data['file_name'],
                'user_id'=>$this->input->post('id'),
                'created_on'=>date('Y-m-d'),
            );
			//dump($image);
           $update =  $this->auth_model->update_profile_image($image);
			if($update){
				 $this->session->set_flashdata('success_message', lang('update_success_message'));
				
			}else{
				
				$this->session->set_flashdata('error_message', lang('error_message'));
			}
        redirect('admin/auth/edit_profile/'.$this->input->post('id'));
    }

	
	}
							
	public function set_model_data() {
        $userObj = $this->auth_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $userObj->setId($id);
        }
        $user_name = $this->input->post('user_name');
        $userObj->setUserName($user_name);

        $email = $this->input->post('email');
        $userObj->setEmail($email);

		$first_name = $this->input->post('first_name');
        $userObj->setFirstName($first_name);

		$last_name = $this->input->post('last_name');
        $userObj->setLastName($last_name);
        return true;
    }
	
	public function get_model_data($id) {
        $userObj = $this->auth_model;
        $userObj->setId($id);
        $userObj->get_row();
        $response = new stdClass();
        $response->id = $userObj->getId();
        $response->user_name = $userObj->getUserName();
        $response->email = $userObj->getEmail();
        $response->first_name = $userObj->getFirstName();
        $response->last_name = $userObj->getLastName();
       
       
		return $response;
    }
							
	public function register(){
		
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_table.email]');
        $this->form_validation->set_rules('r_password', 'Password', 'required|matches[r_con_password]');
        $this->form_validation->set_rules('r_con_password', 'Confirm Password', 'required');
		 if ($this->form_validation->run() == FALSE) {
			//dump($this->input->post());
			$this->load->view('login/main');
        } else {
			$reg = $this->auth_model->register();
			$validate = $this->auth_model->validate_user_id($reg);
			if(!empty($validate)) {
				
                $userdata = array();
                $userdata['glob_user_id'] = $validate->user_id;
                $userdata['glob_first_name'] = $validate->firstname;
                $userdata['glob_last_name'] = $validate->lastname;
                $userdata['glob_email'] = $validate->email;
                $userdata['glob_logged_front'] = TRUE;
				
                $this->session->set_userdata($userdata);
				redirect('home');
					
                
            }
			
		
		}
		
		
	}
}

