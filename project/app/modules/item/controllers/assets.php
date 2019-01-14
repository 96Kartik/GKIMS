<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Assets extends CI_Controller {

    function __construct() {
        parent::__construct();
		
		
		global $application_folder;
		
		// echo $application_folder;die;
        
		$file = getcwd() . '/'.$application_folder.'/modules/' . implode('/', $this->uri->segments);
	   
	   $path_parts = pathinfo( $file);
		
	  
	   $file_type=  strtolower($path_parts['extension']);
        
        if (is_file($file)) {
  
            switch ($file_type) {
                case 'css':
                    header('Content-type: text/css');
                    break;

                case 'js':
                    header('Content-type: text/javascript');
                    break;
                
                case 'json':
                    header('Content-type: application/json');
                    break;
                
                case 'xml':
                   header('Content-type: text/xml');
                    break;
                
                case 'pdf':
                  header('Content-type: application/pdf');
                    break;
                
                case 'jpg' || 'jpeg' || 'png' || 'gif':
                    header('Content-type: image/'.$file_type);
                    break;
            }
 
            include $file;
        } else {
            show_404();
        }
        exit;
    }
}