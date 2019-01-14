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
	 * @see http://codeigniter.com/dept_guide/general/urls.html
	 *
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Dept extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       
		$this->load->model('dept_model');
		$this->lang->load('dept');
		check_logged_user();

    }

    public function index(){
		
		//$dept_role = $this->session->deptdata['ehs_dept_role_id'];
		$options = new stdClass();
		$this->data['module_assets'] = 'dept/module_assets';
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
            redirect('dept');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'edit';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 public function view($id = false) {
		//dump($id);
       if (!$id){
            redirect('dept');
         } else {
             $this->data['record'] = $this->get_model_data($id);
             $this->data['view'] = 'view';
             $this->load->view('theme/admin/layout', $this->data);
	 }}
		 
	  public function delete_data($id = false) {
         if (!$id) {
             redirect('dept');
         }else{
			
			 $this->dept_model->setId($id);
             $deleted = $this->dept_model->delete_data();
			 if($deleted) {
				  $this->session->set_flashdata('success_message', lang('delete_success_message'));
			 }else{
				 $this->session->set_flashdata('error_message', lang('error_message'));
			 }
             redirect('dept');
         }
     }
	public function process() {
	
        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('dept_name', 'Department', 'required|trim|xss_clean|min_length[4]|max_length[50]');
            $this->form_validation->set_rules('dept_description', 'Description', 'required|trim|xss_clean');

			}
            
            if ($this->form_validation->run() == TRUE) {
                $this->set_model_data();
                if ($this->input->post('id') == 'new') {
                    $inseretd = $this->dept_model->insert_data();
                    if($inseretd) {
                         $this->session->set_flashdata('success_message', lang('add_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                } else {
                    $updated = $this->dept_model->update_data();
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
                }
                redirect('dept');
            } else {
                if ($this->input->post('id') == 'new') {
                    $this->create();
                } else {
                    $this->edit($this->input->post('id'));
                }
            }
        }
    
	
	public function set_model_data() {
        $deptObj = $this->dept_model;

        if ($this->input->post('id') != 'new') {
            $id = $this->input->post('id');
            $deptObj->setId($id);
        }
        $dept_name = $this->input->post('dept_name');
        $deptObj->setDeptName($dept_name);

        $dept_description = $this->input->post('dept_description');
        $deptObj->setDeptDescription($dept_description);
		
		
        $deptObj->setStatus(1);
    

        return true;
    }
	
	public function get_model_data($id) {
        $deptObj = $this->dept_model;
        $deptObj->setId($id);
        $deptObj->get_row();
        $response = new stdClass();
        $response->id = $deptObj->getId();
        $response->dept_name = $deptObj->getDeptName();
        $response->dept_description = $deptObj->getDeptDescription();
    
     //  dump($response);
		return $response;
    }
	public function update_status() {
        $id = $this->input->get('id');
        if (!$id) {
            redirect('dept');
        } else {
            $this->dept_model->setId($id);

            $status = $this->input->get('status');
            $this->dept_model->setStatus($status);
            $this->dept_model->update_status();
            die;
        }
    }
	
	

	 
	 
	}

	
