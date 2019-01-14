<?php

/*
 * Live details
 */
return (object) array(
            'database' => (object) array(
                'db_host' => 'tekpcsolutions.com',
                'db_user' => 'ehour',
                'db_password' => 'ehour@$123',
                'db_name' => 'ehour'
            ),
            'site_name' => 'EHour System',
           'base_url' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/',
			'module_css_path' => 'assets/css/',
            'module_js_path' => 'assets/js/',
			'assets' => (object) array(
                'admin_assets' => (object) array(
                    'css_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/admin/css/',
                    'js_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/admin/js/',
                    'img_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/admin/img/',
                ),
                'front_assets' => (object) array(
                    'css_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/front/css/',
                    'js_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/front/css/',
                    'img_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/empHourTracker/assets/front/img/',
                ),
            ),
           
);
?>
