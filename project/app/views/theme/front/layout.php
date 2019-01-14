<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo site_name();?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
	 <?php

        echo link_front_css(
                array(
				'bootstrap/css/bootstrap.min.css',
				'bootstrap/css/ionicons.css',
				'developer.css'));
				
	?>
	<!-- jQuery 2.1.4 -->
	<?php echo link_front_js(
                array(
                    'plugins/jQuery/jQuery-2.1.4.min.js')
					);
	?>
    <!-- Font Awesome -->
	 <?php

        echo link_front_css(
                array('font-awesome.css'
				));
				
	?>
   
	 <?php

        echo link_front_css(
                array(
                    
                    'dist/css/AdminLTE.min.css',
                    'dist/css/skins/_all-skins.min.css',
					'plugins/iCheck/flat/blue.css',
                    'plugins/morris/morris.css',
                    'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
                    'plugins/datepicker/datepicker3.css',
                    'plugins/daterangepicker/daterangepicker-bs3.css',
                    'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
                    
                )
        );
        
?>  
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--<script>
$(document).ready(function()
    {
		
          $(document).bind("contextmenu",function(e){
                  return false;
          });
    });
</script>-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
     <?php $this->load->view('theme/front/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $this->load->view('theme/front/sidebar');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
		<?php echo $this->load->view($view);?>
        <!-- Content Header (Page header) -->
      
      </div><!-- /.content-wrapper -->
    
		<?php $this->load->view('theme/front/footer');?>
      <!-- Control Sidebar -->
      <?php //$this->load->view('theme/front/settings');?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    
   <?php echo link_front_js(array('jquery-ui.js'));?>
	
    <!-- jQuery UI 1.11.4 
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    
	<?php echo link_front_js(
                array(
                    'bootstrap/js/bootstrap.min.js',
					'raphael-min.js'
					)
			);
	?>
    <!-- Morris.js charts 
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
	<?php echo link_front_js(
                array(
                   // 'plugins/morris/morris.min.js',
                    'plugins/sparkline/jquery.sparkline.min.js',
                    'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
                    'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                    'plugins/knob/jquery.knob.js'
					)
				);
	?>
   
    <!-- daterangepicker
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
	<?php echo link_front_js(
                array(
					'moment.js',
                    'plugins/daterangepicker/daterangepicker.js',
                    'plugins/datepicker/bootstrap-datepicker.js',
                    'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
                    'plugins/slimScroll/jquery.slimscroll.min.js',
                    'plugins/fastclick/fastclick.min.js',
                    'dist/js/app.min.js',
                    'dist/js/pages/dashboard.js',
                    'dist/js/demo.js'
					)
				);
	?>
    <?php
		if(isset($module_assets)){
            $this->load->view($module_assets);
        }
	  ?>
	
  </body>
</html>
