<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Ajax_list extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		 $this->load->library('curl');
        $this->api_url = $this->config->item('api_call');
	}
	
	/*shop listing*/
	public function index() {
		 $city_id = $this->session->userdata('city_id');
        $area_id = $this->session->userdata('area_id');
        $options = new stdClass();
        $options->url = $this->api_url.'home/shop'; 

        $post_data = array ( 
        	            "type" =>$this->input->post('type'),
        	            "section" =>$this->input->post('section'),
                         "city_id" => $city_id,
                         "area_id" => $area_id,
                     );
        $result = $this->post_data($options,$post_data);

		

		$params = $result->params;
		$pagination  = build_pagination($params->last_page, $params->current_page, $params->next_page, $params->prev_page, $params->lpm1, $params->field);
		
		/*
		* Build Final response
		*/
		$response = new stdClass();
		$response->result = $result->result->resultdata;
		$response->param = $result->params;
		$response->cat_id = $this->input->post('cat_id');
		$response->pagination = $pagination;
		
		echo $this->load->view('home/dynamic_shop', $response);
		
	}

	/*Get Data Method */
    protected function get_data($options){
        $result = $this->curl->simple_get($options->url);
        $res = json_decode($result);
        if($res->status=='success'){
            return $res;
        }else{
            return false;
        }
    }

     /*Post Data Method */
    protected function post_data($options,$post){
        $result = $this->curl->simple_post($options->url,$post);
        $res = json_decode($result);
        if($res->status=='success'){
            return $res;
        }else{
            return false;
        }

    }

}