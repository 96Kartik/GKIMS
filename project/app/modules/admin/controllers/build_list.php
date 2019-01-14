<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Build_list extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        if ($this->input->post('action')) {
            $this->perform_action();
        }
        $field = $this->input->post('type');
        $result = $this->get_data($field);

        $params = $result->params;
        $pagination = build_pagination($params->last_page, $params->current_page, $params->next_page, $params->prev_page, $params->lpm1, $params->field);
        /*
         * Build Final response
         */
        $response = new stdClass();
        $response->result = $result->result;
        $response->param = $result->params;
        $response->pagination = $pagination;


        echo $this->load->view('dynamic/' . $field . '_list', $response);
    }

    protected function get_data($field) {

        switch ($field) {
          
                       
            case 'category':
                $this->load->model('category/category_model');
                $result = $this->category_model->get_list();
                break;
			case 'vendor':
                $this->load->model('vendor/vendor_model');
                $result = $this->vendor_model->get_list();
                break;
			case 'user':
                $this->load->model('user/user_model');
                $result = $this->user_model->get_list();
                break;
			 case 'item':
                $this->load->model('item/item_model');
                $result = $this->item_model->get_list();
                break;
			case 'dept':
                $this->load->model('dept/dept_model');
                $result = $this->dept_model->get_list();
                break;
			case 'member':
                $this->load->model('member/member_model');
                $result = $this->member_model->get_list();
                break;
		
				
        }
        
		
        return $result;
    }

    protected function perform_action() {
        $response = array();
        $action = $this->input->post('action');
        $field = $this->input->post('field');
        $selectedValue = $this->input->post('checkedValue');

        $table = $this->get_table_detail($field);
        $this->load->model('admin/admin_model', 'am');
        $this->am->setTableName($table->table_name);
        $this->am->setOperationColumn($table->operation_column);
        $this->am->setselectedValue($selectedValue);
        $this->am->setAction($action);
        $performed = $this->am->perform_operation();

        if ($performed) {
            $response['status'] = 'success';
            $response['message'] = lang('delete_success_message') . ' <i class="fa fa-times" onClick="messageRemove();"></i>';
        } else {
            $response['status'] = 'error';
            $response['message'] = lang('error_message') . ' <i class="fa fa-times" onClick="messageRemove();"></i>';
        }
        echo json_encode($response);
        die;
    }

    protected function get_table_detail($field) {
        $response = new stdClass();
        switch ($field) {
          
            
           
			case 'category':
                $response->table_name = 'category_table';
                $response->operation_column = 'category_id';
                break;
			case 'vendor':
                $response->table_name = 'vendor_table';
                $response->operation_column = 'vendor_id';
                break;
			case 'user':
                $response->table_name = 'ehs_users';
                $response->operation_column = 'user_id';
                break;
			case 'item':
                $response->table_name = 'item_table';
                $response->operation_column = 'item_id';
                break;
			case 'dept':
                $response->table_name = 'dept_table';
                $response->operation_column = 'dept_id';
                break;
			case 'member':
                $response->table_name = 'member_table';
                $response->operation_column = 'member_id';
                break;
			
        }

        return $response;
    }

}