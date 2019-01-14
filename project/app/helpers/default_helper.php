<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// ------------------------------------------------------------------------

/**
 * Script
 *
 * Generates link to a Script file
 *
 * @access	public
 * @param	mixed	Script src's or an array
 * @param	string	language
 * @param	string	type
 * @param	string	title
 * @param	boolean	should index_page be added to the script path
 * @return	string
 */
if (!function_exists('script_tag')) {

    function script_tag ($src = '', $language = 'javascript', $type = 'text/javascript', $index_page = FALSE) {
        $CI = & get_instance();

        $script = '<script ';

        if (is_array($src)) {
            foreach ($src as $k => $v) {
                if ($k === 'src' AND strpos($v, '://') === FALSE) {
                    if ($index_page === TRUE) {
                        $script .= 'src="' . $CI->config->site_url($v) . '" ';
                    } else {
                        $script .= 'src="' . $CI->config->slash_item('base_url') . $v . '" ';
                    }
                } else {
                    $script .= "$k=\"$v\" ";
                }
            }

            $script .= "></script>";
        } else {
            if (strpos($src, '://') !== FALSE) {
                $script .= 'src="' . $src . '" ';
            } elseif ($index_page === TRUE) {
                $script .= 'src="' . $CI->config->site_url($src) . '" ';
            } else {
                $script .= 'src="' . $CI->config->slash_item('base_url') . $src . '" ';
            }

            $script .= 'language="' . $language . '" type="' . $type . '" ';

            $script .= '></script>';
        }


        return $script;
    }

}


/*
 * Default used function
 */

/*
 * Get all the default user defined properties (Not Used)
 */
if (!function_exists('_properties')) {

    function _properties() {
        $ci = & get_instance();
        $properties = $ci->config->item('properties');
        return $properties;
    }

}
/*
 * Default used function
 */

/*
 * Get the site name
 */
if (!function_exists('site_name')) {

    function site_name() {
        $properties = _properties();
        $site_name = $properties->properties;
        return $site_name->site_name;
    }

}
//-----------------------------------------------------------------------
/*
 * Get module name (Used)
 */
if (!function_exists('get_module_name')) {

    function get_module_name() {
        $ci = & get_instance();
        return $ci->router->fetch_module();
    }

}
//-----------------------------------------------------------------------
/*
 * Get class method (Used)
 */
if (!function_exists('get_method')) {

    function get_method() {
        $ci = & get_instance();
        return $ci->router->fetch_method();
    }

}

//--------------------------------------------------------------------------------------
/*
 * Check user login (Not Used)
 */
if (!function_exists('is_login')) {

    function is_login() {
        $ci = & get_instance();
        $ci->load->library('auth/ion_auth');
        if (!$ci->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

}
//--------------------------------------------------------------------------------------
/*
 * Check user login (Not Used)
 */
if (!function_exists('is_admin')) {

    function is_admin() {
        $ci = & get_instance();
        $ci->load->library('auth/ion_auth');
        if (!$ci->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }
    }

}
//--------------------------------------------------------------------------------------
/*
 * Get all the default user defined properties (Used)
 */
if (!function_exists('get_properties')) {

    function get_properties() {
        $ci = & get_instance();
        $properties = _properties()->properties;
        return $properties;
    }

}
/*
 * Get all the default user defined asstes (Used)
 */
if (!function_exists('get_assets')) {

    function get_assets() {
        $ci = & get_instance();
        $properties = _properties()->properties;
        return $properties->assets;
    }

}
/*
 * Dump array data (Used)
 * @Params Array
 * @Return print all data
 */
if (!function_exists('dump')) {

    function dump($array) {
        print "<pre>";
        print_r($array);
        die;
    }

}
/*
 * Link front css (Used)
 * @Params Array (css files)
 * @Return link all css files
 */
if (!function_exists('link_front_css')) {

    function link_front_css($css_files) {
        $css = '';
        $assets = get_assets();
        if (is_array($css_files)) {
            foreach ($css_files as $css_file) {
                $css .= link_tag($assets->front_assets->css_path . $css_file);
            }
        } else {
            $css = link_tag($assets->front_assets->css_path . $css_files);
        }
        return $css;
    }

}
/*
 * Link admin css (Used)
 * @Params Array (css files)
 * @Return link all css files
 */
if (!function_exists('link_admin_css')) {

    function link_admin_css($css_files) {
        $css = '';
        $assets = get_assets();
        if (is_array($css_files)) {
            foreach ($css_files as $css_file) {
                $css .= link_tag($assets->admin_assets->css_path . $css_file);
            }
        } else {
            $css = link_tag($assets->admin_assets->css_path . $css_files);
        }
        return $css;
    }

}
/*
 * Link admin script (Used)
 * @Params Array (script files)
 * @Return link all script files
 */
if (!function_exists('link_admin_js')) {

    function link_admin_js($js_files) {
        $script = '';
        $assets = get_assets();
        if (is_array($js_files)) {
            foreach ($js_files as $js_file) {
                $script .= script_tag($assets->admin_assets->js_path . $js_file);
            }
        } else {
            $script = script_tag($assets->admin_assets->js_path . $js_files);
        }
        return $script;
    }

}
/*
 * Link front script (Used)
 * @Params Array (script files)
 * @Return link all script files
 */
if (!function_exists('link_front_js')) {

    function link_front_js($js_files) {
        $script = '';
        $assets = get_assets();
        if (is_array($js_files)) {
            foreach ($js_files as $js_file) {
                $script .= script_tag($assets->front_assets->js_path . $js_file);
            }
        } else {
            $script = script_tag($assets->front_assets->js_path . $js_files);
        }
        return $script;
    }

}
/*
 * Link admin module script (Used)
 * @Params Array (script files)
 * @Return link all script files
 */
if (!function_exists('link_admin_module_js')) {

    function link_admin_module_js($js_files, $module) {
        $script = '';
        $properties = get_properties();
        if (is_array($js_files)) {
            foreach ($js_files as $js_file) {
                $script .= script_tag($module . '/' . $properties->module_js_path . $js_file);
            }
        } else {
            $script = script_tag($module . '/' . $properties->module_js_path . $js_files);
        }
        return $script;
    }

}
/*
 * Link admin module css (Used)
 * @Params Array (css files)
 * @Return link all css files
 */
if (!function_exists('link_admin_module_css')) {

    function link_admin_module_css($css_files, $module) {
        $css = '';
        $properties = get_properties();
        if (is_array($css_files)) {
            foreach ($css_files as $css_file) {
                $css .= link_tag($module . '/' . $properties->module_css_path . $css_file);
            }
        } else {
            $css = link_tag($module . '/' . $properties->module_css_path . $css_files);
        }
        return $css;
    }

}

/*
 * Link admin image (Used)
 * @Params Image (String)
 * @Return Image with path
 */
if (!function_exists('link_admin_image')) {

    function link_admin_image($image) {
        $assets = get_assets();
        $image_with_path = $assets->admin_assets->img_path . $image;
        return $image_with_path;
    }

}

/*
 * Link front image (Used)
 * @Params Image (String)
 * @Return Image with path
 */
if (!function_exists('link_front_image')) {

    function link_front_image($image) {
        $assets = get_assets();
        $image_with_path = $assets->front_assets->img_path . $image;

        return $image_with_path;
    }

}
// ------------------------------------------------------------------------

/**

 * Get lang Costants
 *
 *
 * @access	public
 * @param	variable
 * @return	define string
 */
if (!function_exists('lang')) {

    function lang($string) {
        $anything->ci = & get_instance();
        $lang = $anything->ci->lang->line($string);
        return $lang;
    }

}

if (!function_exists('build_pagingation')) {
 function build_pagination($lastpage, $page, $next, $prev, $lpm1, $field) {
  $targetpage = 'page';
  $idString = 'page__' . $field . '__';
  $pagination = "";
  $adjacents = 1;
  if($page == '') {
   $page = 1;
  }
  if($lastpage > 1) {

   $pagination .= "<div class=\"pagination pull-right\">";

   if ($page > 1) {
    $pagination.= "<li><a href=\"$targetpage/$prev\" id=\"$idString$prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span> Prev</a></li>";
   } else {
    $pagination.= "<li class=\"disabled\"><span><span class=\"glyphicon glyphicon-chevron-left\"></span> Prev</span></li>";
   }

   if ($lastpage < 7 + ($adjacents * 2)) {

    for ($counter = 1; $counter <= $lastpage; $counter++) {
     if ($counter == $page) {
      $pagination.= "<li class=\"active\"><span>$counter</span></li>";
     } else {
      $pagination.= "<li><a href=\"$targetpage/$counter\" id=\"$idString$counter\">$counter</a></li>";
     }
    }

   } elseif ($lastpage > 5 + ($adjacents * 2)) {

    if($page < 1 + ($adjacents * 2)) {

     for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
      if ($counter == $page) {
       $pagination.= "<li class=\"active\"><span>$counter</span></li>";
      } else {
       $pagination.= "<li><a href=\"$targetpage/$counter\" id=\"$idString$counter\">$counter</a></li>";
      }
     }

     $pagination.= "<li><a>...</a></li>";
     $pagination.= "<li><a href=\"$targetpage/$lpm1\" id=\"$idString$lpm1\">$lpm1</a></li>";
     $pagination.= "<li><a href=\"$targetpage/$lastpage\" id=\"$idString$lastpage\">$lastpage</a></li>";

    } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
     if ($page == 1) {
      $pagination.= "<li class=\"active\"><span>1</span></li>";
     } else {
      $pagination.= "<li><a href=\"$targetpage/1\" id='".$idString."1'>1</a></li>";
     }
     if($page == 2){
      $pagination.= "<li class=\"active\"><span>2</span></li>";
     } else {
      $pagination.= "<li><a href=\"$targetpage/2\" id='".$idString."2'>2</a></li>";
     }
     $pagination.= "<li><a>...</a></li>";

     for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
      if ($counter == $page) {
       $pagination.= "<li class=\"active\"><span>$counter</span></li>";
      } else {
       $pagination.= "<li><a href=\"$targetpage/$counter\" id=\"$idString$counter\">$counter</a></li>";
      }
     }

     $pagination.= "<li><a>...</a></li>";
     $pagination.= "<li><a href=\"$targetpage/$lpm1\" id=\"$idString$lpm1\">$lpm1</a></li>";
     $pagination.= "<li><a href=\"$targetpage/$lastpage\" id=\"$idString$lastpage\">$lastpage</a></li>";

    } else {

     $pagination.= "<li><a href=\"$targetpage/1\" id='".$idString."1'>1</a></li>";
     $pagination.= "<li><a href=\"$targetpage/2\" id='".$idString."2'>2</a></li>";
     $pagination.= "<li><a>...</a></li>";
     for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
     {
      if ($counter == $page) {
       $pagination.= "<li class=\"active\"><span>$counter</span></li>";
      } else {
       $pagination.= "<li><a href=\"$targetpage/$counter\" id=\"$idString$counter\">$counter</a></li>";
      }
     }

    }
   }

   if ($page < $lastpage) {
    $pagination.= "<li><a href=\"$targetpage/$next\" id=\"$idString$next\">Next <span class=\"glyphicon glyphicon-chevron-right\"></span></a></li>";
   } else {
    $pagination.= "<li class=\"disabled\"><span>Next<span class=\"glyphicon glyphicon-chevron-right\"></span></span></li>";
    $pagination.= "</div>\n";
   }
  }

  return $pagination;
 }
 }

if (!function_exists('request_params')) {

    function request_params($num_records, $sort, $order, $limit, $page, $start, $field) {
        $params = new stdClass();
        $params->num_records = $num_records;
        $params->sort = $sort;
        $params->order = $order;
        $params->limit = $limit;
        $params->current_page = $page;
        $params->next_page = $page + 1;
        $params->prev_page = $page - 1;
        $params->total_pages = ceil($num_records / $limit);
        $params->start_page = $start;
        $params->last_page = ceil($num_records / $limit);
        $params->lpm1 = $num_records - 1;
        $params->field = $field;
        return $params;
    }

}
/**
 * set user define limit to the query
 *
 *
 * @access	public
 * @param	page and limit
 * @return	response object
 */
if (!function_exists('set_limit')) {

    function set_limit($page = false, $limit) {
        if (!$limit) {
            $limit = 20 ;
        }
        if ($page) {
            $start = ($page - 1) * $limit;    //first item to display on this page
        } else {
            $start = 0;
        }
        $queryString = " LIMIT " . $start . ", " . $limit;

        $response = new stdClass();
        $response->query_string = $queryString;
        $response->limit = $limit;
        $response->page = $page;
        $response->start = $start;

        return $response;
    }

}
/**
 * set user define order by to the query
 *
 *
 * @access	public
 * @param	sort and order
 * @return	response object
 */
if (!function_exists('set_order')) {

    function set_order($sort = false, $order = false, $field = false) {
		if(!$field){
			$id = 'id' ;
		}else{
			
			$id = $field ;
		}
        if ($sort) {
            $queryString = " ORDER BY " . $sort . " DESC";
            $order = 'DESC';
            if ($order) {
                $queryString = " ORDER BY " . $sort . $order;
            }
        } else if ($order) {
            $queryString = " ORDER BY ".$id." ". $order;
            $sort = $id;
        } else {
            $queryString = " ORDER BY ".$id." DESC";
            $order = 'DESC';
            $sort = $id;
        }

        $response = new stdClass();
        $response->query_string = $queryString;
        $response->sort = $sort;
        $response->order = $order;

        return $response;
    }

}
// ------------------------------------------------------------------------

/**
 * set auto increment by last number
 *
 *
 * @access	public
 * @param	table
 * @return	true
 */
if (!function_exists('alter_auto_increment')) {

    function alter_auto_increment($table, $field) {
        $anything->ci = & get_instance();
        $query = "SELECT MAX(" . $field . ") as increment  FROM " . $table;
        $queryRun = $anything->ci->db->query($query)->row();
        $increment = $queryRun->increment + 1;

        $queryAlter = "ALTER TABLE " . $table . " auto_increment =" . $increment;
        $queryRun = $anything->ci->db->query($queryAlter);

        return true;
    }

}
// ------------------------------------------------------------------------
/**
 * Get database date
 *
 *
 * @access	public
 * @param	date(date by datepicker)
 * @return	true
 */
if (!function_exists('get_db_date')) {

    function get_db_date($date, $type = false) {
        if ($date == "") {
            return "";
        } else {
            if ($type) {
                $date_time = date("Y-m-d H:i:s", strtotime($date));
                return $date_time;
            } else {
                list( $day, $month, $year ) = explode('/', $date);
                return "$year-$month-$day";
            }
        }
    }

}
// ------------------------------------------------------------------------
/**
 * Get datepicker date
 *
 *
 * @access	public
 * @param	date(date by db)
 * @return	true
 */
if (!function_exists('get_datepicker_date')) {

    function get_datepicker_date($date, $type = false) {
        if ($date == "") {
            return "";
        } else {
            if ($type=='full') {
                $date_time = date("d M, Y h:i a", strtotime($date));
                return $date_time;
            }else if($type == 'half'){
				$date_time = date("d M, Y ", strtotime($date));
                return $date_time;
			} else {
                list( $year, $month, $day ) = explode('-', $date);
                return "$day/$month/$year";
            }
        }
    }

}

/*
 * Project define functions
 */
if(!function_exists('check_user_logged')) {
    function check_user_logged(){
        $globtier = &get_instance();
        if($globtier->session->userdata('kart_logged_front')) {
            redirect('home');
        }
    }
}
if(!function_exists('check_logged_user')) {
    function check_logged_user() {
        $globtier = & get_instance();
        if(!$globtier->session->userdata('kart_logged_front')) {
            redirect('admin/auth');
        }
    }
}



if(!function_exists('get_breadcrumb')) {
 function get_breadcrumb($breadcrumb){
    //  print"<pre>";print_r($breadcrumb);die;
       $html='';
       $countLength  = count($breadcrumb);
      // echo $countLength;
       if(!empty($breadcrumb)) {
         $counter = 1;
         foreach($breadcrumb as $array){
                  if($counter == $countLength){
                    $html .=' <li>'.$array['text'].'</li>';
                    if($array['separator']== TRUE){
                      $html .=' <li><i class="fa fa-chevron-right"></i></li>';
                     }
                  }
                  else{
                    $html .=' <li><a href="'.$array['href'].'"> '.$array['text'].'</a> </li>';
                    if($array['separator']== TRUE){
                      $html .=' <li><i class="fa fa-chevron-right"></i></li>';
                     }
                  }
                  $counter++;

          }
        }
       return $html;

    }
}






if( !function_exists('get_all_department_opt')) {
    
    function get_all_department_opt() {
   
		$tbl_dept = 'ehs_departments';
        $obj = & get_instance();
		$obj->db->select('id,dept_name');
        $obj->db->where('status', 1);
        $res = $obj->db->get($tbl_dept)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->id]=$r->dept_name;
		  }
		  return $option;
 }
}

if( !function_exists('get_all_role_opt')) {
    
    function get_all_role_opt() {
   
		$member_role_table = 'member_role_table';
        $obj = & get_instance();
		$obj->db->select('role_id,role_name');
        $res = $obj->db->get($member_role_table)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->role_id]=$r->role_name;
		  }
		  return $option;
 }
}

if( !function_exists('get_all_dept_opt')) {
    
    function get_all_dept_opt() {
   
		$dept_table = 'dept_table';
        $obj = & get_instance();
		$obj->db->select('dept_id,dept_name');
        $res = $obj->db->get($dept_table)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->dept_id]=$r->dept_name;
		  }
		  return $option;
 }
}

if( !function_exists('get_all_category_opt')) {
    
    function get_all_category_opt() {
   
		$category_table = 'category_table';
        $obj = & get_instance();
		$obj->db->select('category_id,category_name');
        $res = $obj->db->get($category_table)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->category_id]=$r->category_name;
		  }
		  return $option;
 }
}

if( !function_exists('get_all_vendor_opt')) {
    
    function get_all_vendor_opt() {
   
		$vendor_table = 'vendor_table';
        $obj = & get_instance();
		$obj->db->select('vendor_id,vendor_name');
        $res = $obj->db->get($vendor_table)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->vendor_id]=$r->vendor_name;
		  }
		  return $option;
 }
}
if( !function_exists('get_all_users_role')) {
    
    function get_all_users_role() {
   
		$tbl_role = 'ehs_users_role';
        $obj = & get_instance();
		$obj->db->select('role_id,role_title');
        $obj->db->where('status', 1);
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->role_id]=$r->role_title;
		  }
		  return $option;
	}
}

if( !function_exists('get_dept_code')) {
    
    function get_dept_code($id) {
   
		$tbl_dept = 'ehs_departments';
        $obj = & get_instance();
		$obj->db->select('dept_code');
        $obj->db->where('id', $id);
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->dept_code;
 }
}
if( !function_exists('get_dept_name')) {
    
    function get_dept_name($id) {
   
		$tbl_dept = 'dept_table';
        $obj = & get_instance();
		$obj->db->select('dept_name');
        $obj->db->where('dept_id', $id);
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->dept_name;
 }
}
 
 if( !function_exists('get_role_name')) {
    
    function get_role_name($id) {
   
		$tbl_dept = 'member_role_table';
        $obj = & get_instance();
		$obj->db->select('role_name');
        $obj->db->where('role_id', $id);
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->role_name;
 }
 
}

 if( !function_exists('get_category_name')) {
    
    function get_category_name($id) {
   
		$tbl_dept = 'category_table';
        $obj = & get_instance();
		$obj->db->select('category_name');
        $obj->db->where('category_id', $id);
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->category_name;
 }
 }
 
  if( !function_exists('get_vendor_name')) {
    
    function get_vendor_name($id) {
   
		$tbl_dept = 'vendor_table';
        $obj = & get_instance();
		$obj->db->select('vendor_name');
        $obj->db->where('vendor_id', $id);
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->vendor_name;
 }
 
}

if( !function_exists('get_no_department')) {
    
    function get_no_department() {
   
		$tbl_dept = 'ehs_departments';
        $obj = & get_instance();
		$obj->db->select('count(*) as totDept');
        
        $res = $obj->db->get($tbl_dept)->row();
		 return $res->totDept;
 }
}

if(!function_exists('get_user_role')) {
    
    function get_user_role($id) {
   
		$tbl_role = 'ehs_users_role';
        $obj = & get_instance();
		$obj->db->select('role_title');
        $obj->db->where('role_id', $id);
        $res = $obj->db->get($tbl_role)->row();
		 return $res->role_title;
 }
}

if( !function_exists('get_all_client_opt')) {
    
    function get_all_client_opt() {
   
		$tbl_dept = 'ehs_clients';
        $obj = & get_instance();
		$obj->db->select('id,name');
        $obj->db->where('status', 1);
        $res = $obj->db->get($tbl_dept)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->id]=$r->name;
		  }
		  return $option;
 }
}

if( !function_exists('get_all_member_opt')) {
    
    function get_all_member_opt() {
   
		$tbl_role = 'member_table';
        $obj = & get_instance();
		$obj->db->select('member_id,full_name');
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = array(''=>'Select Member','*'=>'All');
		  
		  foreach($res as $r){
			  
			  $option[$r->member_id]=$r->full_name;
		  }
		  return $option;
 }
}


if( !function_exists('get_all_admin_opt')) {
    
    function get_all_admin_opt() {
   
		$tbl_role = 'user_table';
        $obj = & get_instance();
		$obj->db->update('is_admin');
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = array('0'=>'General or Guest User','1'=>'Admin User');
		  
		 
		  return $option;
 }
}

if( !function_exists('get_all_status_opt')) {
    
    function get_all_status_opt() {
   
		$tbl_role = 'user_table';
        $obj = & get_instance();
		$obj->db->update('status');
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = array('0'=>'Deactivate User Profile','1'=>'Activate User Profile');
		  
		 
		  return $option;
 }
}
if( !function_exists('get_img_path')) {
    function get_img_path($id)
					{
					$tbl_role = 'user_table';
					$obj = & get_instance();
					$obj->db->select('dp_path');
					$obj->db->where('user_id', $id);
					$res = $obj->db->get($tbl_role)->row();
					 return base_url().'assets/uploads/users/'.$res->dp_path;
					 
					}
}

if( !function_exists('update_img_path')) {
    function update_img_path($id,$tmp_name,$path)
					{
					$tbl_role = 'user_table';
					$obj = & get_instance();
					$obj->db->select('dp_path');
					$obj->db->where('user_id', $id);
					$res = $obj->db-update($tbl_role, array('img_path' => $path.$tmp_name));
					
					 
					}
}

if( !function_exists('get_all_member_aloocation')) {
    
    function get_all_member_aloocation() {
   
		$tbl_role = 'allocation_table';
        $obj = & get_instance();
		$obj->db->select('member_id');
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = array(''=>'Select Member');
		  
		  foreach($res as $r){
			  
			  $option[$r->member_id]=get_member_name($r->member_id);
		  }
		  return $option;
 }
}

if( !function_exists('get_user_name')) {
    
    function get_user_name($id) {
   
		$tbl_users = 'ehs_users';
        $obj = & get_instance();
		$obj->db->select('user_id,first_name,last_name');
        $obj->db->where('user_id', $id);
        $res = $obj->db->get($tbl_users)->row();
		 
		return $res->first_name.' '.$res->last_name;
		  
		  
 }
}

if( !function_exists('get_user_time_req')) {
    
    function get_user_time_req() {
   
		$tbl_users = 'ehs_users';
		
        $obj = & get_instance();
		$id = $obj->session->userdata['ehs_user_id'];
		$obj->db->select('is_time_attachment_req');
        $obj->db->where('user_id', $id);
        $res = $obj->db->get($tbl_users)->row();
		
		return $res->is_time_attachment_req;
		  
		  
 }
}
if( !function_exists('get_no_user')) {
    
    function get_no_user() {
   
		$tbl_users = 'ehs_users';
        $obj = & get_instance();
		$obj->db->select('count(*) as totUser');
        $res = $obj->db->get($tbl_users)->row();
		 
		return $res->totUser;
		  
		  
 }
}

if( !function_exists('get_client_name')) {
    
    function get_client_name($id) {
   
		$tbl_clients = 'ehs_clients';
        $obj = & get_instance();
		$obj->db->select('id,name');
        $obj->db->where('id', $id);
        $res = $obj->db->get($tbl_clients)->row();
		 
		return $res->name;
		  
		  
 }

}

if( !function_exists('get_no_client')) {
    
    function get_no_client() {
   
		$tbl_clients = 'ehs_clients';
        $obj = & get_instance();
		$obj->db->select('count(*) as totClient');
		$res = $obj->db->get($tbl_clients)->row();
		
		return $res->totClient;
		  
		  
 }

}


if( !function_exists('get_all_users_dropdown')) {
    
    function get_all_users_dropdown($selected = false) {
   		$tbl_role = 'ehs_users';
        $obj = & get_instance();
		$obj->db->select('user_id,first_name,last_name');
        $obj->db->where('status', 1);
        $res = $obj->db->get($tbl_role)->result();
		 
		  $option = '';
		  
		  foreach($res as $r){
			  if($selected){
				  if(in_array($r->user_id, $selected,TRUE )){
					 $select = 'selected="selected"';
					  
				  }else{
					  
					  $select = '';
				  }
				  $option .='<option value="'.$r->user_id.'" '.$select.'>'.$r->last_name.' , '.$r->first_name.'</option>';
				  
			  }else{
			  $option .='<option value="'.$r->user_id.'">'.$r->last_name.' , '.$r->first_name.'</option>';
			  }
		  }
		
		  return $option;
 }
}


if( !function_exists('get_user_logo')){
    
    function get_user_logo(){
   		$tbl_logo = 'ehs_logo_image';
	    $obj = & get_instance();
		$obj->db->select('image_name');
        $obj->db->where('status', 1);
        $res = $obj->db->get($tbl_logo)->row();
		if($res)
		return $res->image_name;
		else
		return false;
	}
}


if( !function_exists('get_all_item_opt')) {
    
    function get_all_item_opt() {
   
		$tbl_pro = 'item_table';
        $obj = & get_instance();
		$obj->db->select('item_id,item_name');
		 $obj->db->where('item_status', 1);
        $res = $obj->db->get($tbl_pro)->result();
		 
		  $option = array();
		  
		  foreach($res as $r){
			  
			  $option[$r->item_id.'|'.$r->item_name]=$r->item_name;
		  }
		  return $option;
 }
}
if(!function_exists('get_all_item')){
     function get_all_item(){
   
		$tbl_pro = 'item_table';
        $obj = & get_instance();
		$obj->db->select('item_id,item_name');
        $obj->db->where('item_status', 1);
        $res = $obj->db->get($tbl_pro)->result();
		  $option = array();
		  foreach($res as $r){
		  $option[$r->item_id]=$r->item_name;
		  }
		  return $option;
 }
}

if(!function_exists('get_no_item')){
     function get_no_item(){
   
		$tbl_pro = 'item_table';
        $obj = & get_instance();
		$obj->db->select('count(*) as no_of_items');
        $obj->db->where('item_status', 1);
        $res = $obj->db->get($tbl_pro)->row();
		  
		  return $res->no_of_items;
 }
}
if(!function_exists('get_item_name')){
    function get_item_name($id) {
   		$tbl_pro = 'item_table';
        $obj = & get_instance();
		$obj->db->select('item_name');
        $obj->db->where('item_id', $id);
        $res = $obj->db->get($tbl_pro)->row();
		return $res->item_name;
	}
}

if(!function_exists('get_member_name')){
    function get_member_name($id) {
   		$tbl_pro = 'member_table';
        $obj = & get_instance();
		$obj->db->select('full_name');
        $obj->db->where('member_id', $id);
        $res = $obj->db->get($tbl_pro)->row();
		return $res->full_name;
	}
}

if(!function_exists('truncate_string')){
function truncate_string($input, $maxWords, $maxChars)
{
    $words = preg_split('/\s+/', $input);
    $words = array_slice($words, 0, $maxWords);
    $words = array_reverse($words);

    $chars = 0;
    $truncated = array();

    while(count($words) > 0)
    {
        $fragment = trim(array_pop($words));
        $chars += strlen($fragment);

        if($chars > $maxChars) break;

        $truncated[] = $fragment;
    }

    $result = implode($truncated, ' ');

    if ($input == $result)
    {
        return $input;
    }
    else
    {
        return preg_replace('/[^\w]$/', '', $result) . '...';
    }	

}
}
if(!function_exists('get_role_title_by_id')){
function get_role_title_by_id($id)
{
	$table = 'member_role_table';
	 $obj = & get_instance();
		$obj->db->select('role_name');
        $obj->db->where('role_id', $id);
        $res = $obj->db->get($table)->row();
		return $res->role_name;
		
}
}
if(!function_exists('get_dept_title_by_id')){
function get_dept_title_by_id($id)
{
	$table = 'dept_table';
	 $obj = & get_instance();
		$obj->db->select('dept_name');
        $obj->db->where('dept_id', $id);
        $res = $obj->db->get($table)->row();
		return $res->dept_name;
		
}
}
/*if(!function_exists('get_role_title_by_id')){
function get_role_title_by_id($id)
{
	$table = 'member_role_table';
	 $obj = & get_instance();
		$obj->db->select('role_name');
        $obj->db->where('role_id', $id);
        $res = $obj->db->get($table)->row();
		return $res->role_name;
		
}
}
if(!function_exists('get_role_title_by_id')){
function get_role_title_by_id($id)
{
	$table = 'member_role_table';
	 $obj = & get_instance();
		$obj->db->select('role_name');
        $obj->db->where('role_id', $id);
        $res = $obj->db->get($table)->row();
		return $res->role_name;
		
}
}*/
if(!function_exists('get_email_template')){
	function get_email_template($username,$week,$link){
			
		$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="initial-scale=1.0"><meta name="format-detection" content="telephone=no"><style type="text/css">.socialLinks {font-size: 6px;}
		.socialLinks a {display: inline-block;}
		.socialIcon {display: inline-block;vertical-align: top;padding-bottom: 0px;border-radius: 100%;}
		table.vb-row, table.vb-content {border-collapse: separate;}
		table.vb-row {border-spacing: 9px;}
		table.vb-row.halfpad {border-spacing: 0;padding-left: 9px;padding-right: 9px;}
		table.vb-row.fullwidth {border-spacing: 0;padding: 0;}
		table.vb-container.fullwidth {padding-left: 0;padding-right: 0;}</style><style type="text/css">
		/* yahoo, hotmail */
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
		.yshortcuts a{ border-bottom: none !important; }
		.vb-outer{ min-width: 0 !important; }
		.RMsgBdy, .ExternalClass{
		  width: 100%;
		  background-color: #3f3f3f;
		  background-color: #3f3f3f}

		/* outlook */
		table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
		#outlook a{ padding: 0; }
		img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
		a img{ border: none; }

		@media screen and (max-device-width: 600px), screen and (max-width: 600px) {
		  table.vb-container, table.vb-row{
			width: 95% !important;
		  }

		  .mobile-hide{ display: none !important; }
		  .mobile-textcenter{ text-align: center !important; }

		  .mobile-full{
			float: none !important;
			width: 100% !important;
			max-width: none !important;
			padding-right: 0 !important;
			padding-left: 0 !important;
		  }
		  img.mobile-full{
			width: 100% !important;
			max-width: none !important;
			height: auto !important;
		  }   
		}
	  </style></head><body style="margin: 0;padding: 0;background-color: #3f3f3f;color: #919191;" text="#919191" vlink="#cccccc" alink="#cccccc" bgcolor="#3f3f3f">
	  <center>
	  <table id="ko_titleBlock_3" style="background-color: #1f497d;" class="vb-outer" width="100%" bgcolor="#1f497d" border="0" cellpadding="0" cellspacing="0">
	  <tbody>
	  <tr>
	  <td style="padding-left: 9px;padding-right: 9px;background-color: #1f497d;" class="vb-outer" valign="top" align="center" bgcolor="#1f497d">
			<div class="oldwebkit" style="max-width: 570px;">
			<table style="border-collapse: separate;border-spacing: 9px;padding-left: 9px;padding-right: 9px;width: 100%;max-width: 570px;background-color: #c6d9f0;" class="vb-container halfpad" width="570" bgcolor="#c6d9f0" border="0" cellpadding="0" cellspacing="9">
			<tbody>
				<tr>
					<td style="background-color: #c6d9f0; font-size: 22px; font-family: Arial, Helvetica, sans-serif; color: #3f3f3f; text-align: center;" align="center" bgcolor="#c6d9f0">
					  <span>iHour Request Alert</span>
					</td>
				</tr>
			</tbody>
			</table>
			</div>

		  </td>
		</tr></tbody></table>
		<table id="ko_textBlock_4" style="background-color: #1f497d;" class="vb-outer" width="100%" bgcolor="#1f497d" border="0" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
		<td style="padding-left: 9px;padding-right: 9px;background-color: #1f497d;" class="vb-outer" valign="top" align="center" bgcolor="#1f497d">

        <div class="oldwebkit" style="max-width: 570px;">
			<table style="border-collapse: separate;border-spacing: 18px;padding-left: 0;padding-right: 0;width: 100%;max-width: 570px;background-color: #c6d9f0;" class="vb-container fullpad" width="570" bgcolor="#c6d9f0" border="0" cellpadding="0" cellspacing="18">
				<tbody>
					<tr>
						<td style="text-align: left; font-size: 13px; font-family: Arial, Helvetica, sans-serif; color: #262626;" class="long-text links-color" align="left"><p style="margin: 1em 0px;margin-top: 0px;">Dear '.$username.' ,<a href="" style="color: #c0504d;text-decoration: underline;"><br></a><br data-mce-bogus="1"></p><p style="margin: 1em 0px;">Please submit your approved timesheet for following Week '.$week.'.<br data-mce-bogus="1"></p><p style="margin: 1em 0px;">Click <strong><a style="color:blue;" target="_blank" href="'.$link.'">here</a></strong> to fill timesheet.<br data-mce-bogus="1"></p><p style="margin: 1em 0px;"><br data-mce-bogus="1"></p><p style="margin: 1em 0px;"><br data-mce-bogus="1"></p><p style="margin: 1em 0px;">Best Regards<br data-mce-bogus="1"></p><p style="margin: 1em 0px;">Human Resource<br data-mce-bogus="1"></p><p style="margin: 1em 0px;">Company name<br data-mce-bogus="1"></p><p style="margin: 1em 0px;margin-bottom: 0px;"><br data-mce-bogus="1"></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		  </td>
		</tr>
		</tbody>
		</table></center>

		</body>
		</html>
		';	
		return $html;
			
		
	}
	
}