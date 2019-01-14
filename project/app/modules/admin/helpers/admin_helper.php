<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!function_exists('logo_path')) {
    function logo_path($type=false){
        $properties = get_properties();
      //  print"<pre>";print_R($properties); die;
        if($type=='thumb') {

            return $properties->logo_thumb;
        } else{
            return $properties->logo_path;
        }
    }
}

