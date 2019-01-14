<?php

/*
 * Local details
 */
return (object) array(
            'database' => (object) array(
                'db_host' => 'localhost',
                'db_user' => 'root',
                'db_password' => '',
                'db_name' => 'kart_inventory'
            ),
            'site_name' => 'GlobKartIMS',
            'base_url' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/',
			'module_css_path' => 'assets/css/',
            'module_js_path' => 'assets/js/',
			'logo_path' => 'assets/uploads/logos/',
            'logo_thumb' => 'assets/uploads/logos/thumb/',
			'logo_used' => 'assets/uploads/logos/used/',
			'timesheet_path' => 'assets/uploads/timesheet/',
			'assets' => (object) array(
                'admin_assets' => (object) array(
                    'css_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/admin/css/',
                    'js_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/admin/js/',
                    'img_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/admin/img/',
                ),
                'front_assets' => (object) array(
                    'css_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/front/css/',
                    'js_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/front/css/',
                    'img_path' => 'http://' . $_SERVER['HTTP_HOST'] . '/project/assets/front/img/',
                ),
            ),
        
        );
?>
