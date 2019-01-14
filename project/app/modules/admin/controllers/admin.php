<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Admin extends CI_Controller {

    function __construct() {
        parent:: __construct();
        check_logged_user();
		$this->load->helper('admin');
         $this->load->model('admin_model');
    }

    public function index() {
       
        $this->data['view'] = 'main';
        $this->load->view('theme/admin/layout', $this->data);
    }
    public function view_setting(){
        $this->data['setting_data'] = $this->admin_model->get_all_setting();
        $this->data['view'] = 'setting';
        $this->load->view('theme/admin/layout', $this->data);

    }
     public function edit_media($id=false){
        if($this->input->post('id')){
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('new', 'Link', 'required');
             if ($this->form_validation->run() == FALSE) {
                //$this->edit_media($this->input->post('id'));
             } else {

              $updated = $this->admin_model->update_media($id);
               if($updated){
                    $this->session->set_flashdata('success_message', ' Data is Updated Succesfully.');
                    redirect('admin/view_media');
                }
            }
        }

        $id = ($id) ? $id : $this->input->post('id');


        $this->data['media'] = $this->admin_model->get_media($id);
        $this->data['view'] = 'edit_media';
        $this->load->view('theme/admin/layout', $this->data);
    }
    public function view_media(){
        $this->data['media'] = $this->admin_model->get_all_media();
        $this->data['view'] = 'media';
        $this->load->view('theme/admin/layout', $this->data);
    }
    public function add_setting($id=FALSE){
        $id = ($id) ? $id : $this->input->post('setting');
        $this->data['setting_data'] = $this->admin_model->setting($id);
        if($this->input->post('setting')){
       
          if($this->data['setting_data']->title != 'Logo'){
                $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
                $this->form_validation->set_rules('new', 'Link', 'required');
                if($this->form_validation->run() == true) {
                     $updated = $this->admin_model->update_setting($id);
                 if($updated){
                        $this->session->set_flashdata('success_message', ' Data is Updated Succesfully.');
                        redirect('admin/view_setting');
                    }
                }

            } else {
                if($_FILES['file']['error'] != 4){
                  $image_name = $this->image_upload();
                    if (isset($image_name->upload_data)) {
                        $filename = $image_name->upload_data;
                        $updated = $this->admin_model->update_logo_image($id, $filename);
                        if($updated){
                            $this->session->set_flashdata('success_message', ' Data is Updated Succesfully.');
                            redirect('admin/view_setting');
                        }
                    }  
                }
            }

            
        }
        $this->data['view'] = 'add_setting';
        $this->load->view('theme/admin/layout', $this->data);

    }
    protected function image_upload() {
        $config['upload_path'] = 'assets/uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = time() . date('Ymd');

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = (object) array('error' => $this->upload->display_errors('<span class="error">', '</span>'));
            $this->data['error'] = $error->error;
            return $this;
        } else {
            $data = (object) array('upload_data' => $this->upload->data());
        //for thumb
            $configImageResize = array(
                'source_image' => $config['upload_path'] . $data->upload_data['file_name'],
                'new_image' => 'assets/uploads/logo/thumb',
                'maintain_ratio' => true,
                'width' => 350,
                'height' => 250
            );
            $this->load->library('image_lib');
            $this->image_lib->initialize($configImageResize);
            $this->image_lib->resize();


            //for used
            /*  $configImageusedResize = array(
                            'source_image' => $config['upload_path'] . $data->upload_data['file_name'],
                            'new_image' => 'assets/uploads/used',
                            //'maintain_ratio' => true,
                            'width' => 785,
                            'height' => 315
            );
               $this->load->library('image_lib');
            $this->image_lib->initialize($configImageusedResize);
            $this->image_lib->resize(); */
            $this->image_lib->clear();
        }
        return $data;
     
        
    }

    /*public function country(){
        $this->data['country']  = $this->admin_model->get_all_country();
        $this->data['module_assets'] = "module_assets";
        $this->data['view'] = 'country';
        $this->load->view('theme/admin/layout', $this->data);

    }
   
   
    public function add_country(){
        $addcountry = $this->admin_model->add_country();
        if($this->input->post('id')){
            echo $this->input->post('country');
        }else{


        }

    }
    public function delete_country(){
         $deletecountry = $this->admin_model->delete_country();
    }
    public function city(){
        $this->data['country']  = $this->admin_model->get_all_country();
        $this->data['view'] = 'city';
        $this->data['module_assets'] = 'module_assets';
        $this->load->view('theme/admin/layout', $this->data);

    }*/
    public function change_user() {
        $this->data['view'] = 'user';
       
        $this->load->view('theme/admin/layout', $this->data);
    }
     public function change_email() {
        $this->data['view'] = 'email';
       
        $this->load->view('theme/admin/layout', $this->data);
    }

     public function change_pass() {
        $this->data['view'] = 'password';
        $this->data['module_assets'] = 'module_assets';
        $this->load->view('theme/admin/layout', $this->data);
    }
    /*public function show_city(){
        //print_R($_POST); die;
        $this->data['id'] = $this->input->post('id');
        $this->data['citydata'] = $this->admin_model->get_city();
        $this->load->view('partial/city_list', $this->data);
    }
    public function add_city(){
         $addcountry = $this->admin_model->add_city();
        if($this->input->post('id')){
            echo $this->input->post('city');
        }else{

        }
    }
    public function DeleteCity(){
        $deletecountry = $this->admin_model->delete_city();
    }
*/
    public function change_admin(){
        if($this->input->post('changeusername')=='1'){
             $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
           $this->form_validation->set_rules('username', 'Username', 'required|matches[confirm_user]');
             $this->form_validation->set_rules('confirm_user', 'Confirm Username', 'required');
             if ($this->form_validation->run() == FALSE)
            {
               $this->change_user();
             }
            else
            {
              $updated = $this->admin_model->update_username();
               if($updated){
                    $this->session->set_flashdata('success_message', 'Your User Name is Updated.');
                    redirect('admin/change_user');
                }
            }
       
        }else if($this->input->post('changeemail')=='1'){
           $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
           $this->form_validation->set_rules('email', 'Email', 'required|matches[confirm_email]');
             $this->form_validation->set_rules('confirm_email', 'Confirm Email', 'required');
             if ($this->form_validation->run() == FALSE)
            {
               $this->change_email();
            }
            else
            {
               $updated = $this->admin_model->update_email();
               if($updated){
                    $this->session->set_flashdata('success_message', 'Your Email is Updated.');
                    redirect('admin/change_email');
                }
            }

           }if($this->input->post('changepass')=='1'){
                $updated = $this->admin_model->update_password();
               if($updated){
                    $this->session->set_flashdata('success_message', 'Your Password is Updated.');
                    redirect('admin/change_pass');
                }

           }


       
    }
    public function check_password()
    {

        $result = $this->admin_model->check_password();
         echo json_encode($result); die;
    }
    public function change_password() {
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
        $this->load->view('theme/admin/layout', $this->data);
    }
    public function password_check($param) {
        $this->auth_model->setPassword($param);
        $validate = $this->auth_model->password_validate();
        if(!empty($validate)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', '%s not validate.');
            return FALSE;
        }
    }
    public function logout() {
        $array_items = array('ramujee_user_id' => '', 'ramujee_username' => '', 'ramujee_email' => '', 'ramujee_first_name' =>'', 'ramujee_last_name' => '', 'ramujee_logged_admin' => FALSE);
        $this->session->unset_userdata($array_items);
        redirect('login');
    }
	
	/*public function area(){
        $this->data['get_city']  = $this->admin_model->get_all_city();
        $this->data['view'] = 'area';
        $this->data['module_assets'] = 'module_assets';
        $this->load->view('theme/admin/layout', $this->data);

    }
	
	 public function show_area(){
        //print_R($_POST); die;
        $this->data['id'] = $this->input->post('id');
        $this->data['areadata'] = $this->admin_model->get_area();
        $this->load->view('partial/area_list', $this->data);
    }
	
	public function add_area(){
         $addArea = $this->admin_model->add_area();
         if($this->input->post('id')){
            echo $this->input->post('area');
        }else{
        } 
    }
	public function deletedArea(){
        $deletecountry = $this->admin_model->deletedArea();
    }*/
    
    /* get country , no. of shop and no. of users */
	
   
}
