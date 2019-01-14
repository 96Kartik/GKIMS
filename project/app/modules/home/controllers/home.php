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


class Home extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       	$this->load->model('home_model');
        check_logged_user();

    }

    public function index(){
		//$user_role = $this->session->userdata['ehs_user_role_id'];
		$options = new stdClass();
	
		$this->data['view'] = 'main';
		
		$this->load->view('theme/admin/layout',$this->data);
    }
	public function get_itemqty_chart(){
		
		$chart  = $this->home_model->get_itemqty_chart();
		//dump($chart);
		$data = array();
		$labels = array();
		$series = array();
		foreach($chart as $chart){
			$labels[] = get_category_name($chart->category_id);
			$series[] = $chart->total_qty;
			
			
		}

		$data = array('labels'=>$labels,'series'=>array($series[0],$series[1],$series[2],$series[3]));
		//dump($data);
		echo json_encode($data);die;
	}
		
	public function get_mmbrqty_chart(){
		
		$chart  = $this->home_model->get_mmbrqty_chart();
		//dump($chart);
		$data = array();
		$labels = array();
		$series = array();
		foreach($chart as $chart){
			$labels[] = get_dept_name($chart->dept_id);
			$series[] = $chart->total_mmbr;
			$sum=array_sum($series);
			
			
		}
		foreach ($series as $key=>$value) {

			  $new_series[] = floor(($value / $sum)*100);
			  

			}
			
		$data = array('labels'=>array($new_series[0],$new_series[1],$new_series[2],$new_series[3]),'series'=>array($new_series[0].'% '.$labels[0],$new_series[1].'% '.$labels[1],$new_series[2].'% '.$labels[2],$new_series[3].'% '.$labels[3]));
		//dump($data);
		echo json_encode($data);die;
		
	}
}
