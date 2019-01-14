<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author wiesoftware26
 */
class Error extends CI_Controller {

    function __construct() {
        parent:: __construct();
        check_logged_user();
    }
    
    public function index() {
        $this->output->set_status_header('404'); 
        $this->data['content'] = 'error_404'; // View name 
        $this->load->view('theme/admin/layout',$this->data);
    }
}
