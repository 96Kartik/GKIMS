<?php

//allocation Controller

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Allocation extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       	$this->load->model('allocation_model');
        $this->lang->load('allocation');
        $this->lang->load('common');
		check_logged_user();
    }

    public function index() {
		
        $options = new stdClass();
		 $this->data['module_assets'] = 'allocation/module_assets';
		$this->data['view'] = 'main';
		$this->load->view('theme/admin/layout', $this->data);
    }
	
	public function process() {
		//dump($this->input->post());
		 if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            $this->form_validation->set_rules('member_id', 'Member Name', 'required');
           // dump($this->input->post());
            if ($this->form_validation->run() == TRUE) {
				
                     $member_name = $this->input->post('member_id');
					
                     $item = $this->input->post('items');
					 
                    $updated = $this->allocation_model->allocate_item($member_name,$item);
                     if($updated) {
                         $this->session->set_flashdata('success_message', lang('update_success_message'));
                    } else {
                        $this->session->set_flashdata('error_message', lang('error_message'));
                    }
              
                redirect('allocation');
            } else {
				 $this->data['module_assets'] = 'allocation/module_assets';
                 $this->data['view'] = 'main';
				$this->load->view('theme/admin/layout', $this->data);
            }
        }
    }
	//Function to get allocate item to member_names
	public function get_allocate_item(){
		$member_name = $this->input->post('member_name');
		
		$allocate_pro = $this->allocation_model->get_allocate_item($member_name);
		
		$html='';
		$options = get_all_item();
	
		$html .=" <select id='pre-selected-options' multiple='multiple' name='items[]'>";
		foreach($options as $key=>$opt){
			if(in_array($key,$allocate_pro)){
				$select = "selected='selected'";
			}else{
				$select = "";
			}
			$html .= "<option value='".$key."' ".$select.">".$opt."</option>";
		}
		$html .="</select>";
		echo $html;die;
	}
   

   
}
