<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo site_name();?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


	
	
	 <?php 
	echo link_admin_css(
		array(
			'bootstrap.min.css',
			'animate.min.css',
			'light-bootstrap-dashboard.css',
			'demo.css',
			'pe-icon-7-stroke.css'
			
		)
	);

	
     ?>
  
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


</head>
<body>

<div class="wrapper">
    <?php $this->load->view('theme/admin/sidebar'); ?>

    <div class="main-panel">
   <?php $this->load->view('theme/admin/header'); ?>


        <div class="content">
            <div class="container-fluid">
                <?php echo $this->load->view($view);?>
            </div>
        </div>


       <?php $this->load->view('theme/admin/footer'); ?>

    </div>
</div>


</body>
<?php 
	echo link_admin_js(
		array(
			'jQuery-2.1.4.min.js',
			'bootstrap.min.js',
			'bootstrap-checkbox-radio-switch.js',
			'chartist.min.js',
			'bootstrap-notify.js',
			'light-bootstrap-dashboard.js',
			'demo.js'
		)
	);
	
        if(isset($module_assets)) {
            $this->load->view($module_assets);
        }
  
	?>
    <!--   Core JS Files   
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
-->
	<!--  Checkbox, Radio & Switch Plugins 
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
-->
	<!--  Charts Plugin 
	<script src="assets/js/chartist.min.js"></script>-->

    <!--  Notifications Plugin    
    <script src="assets/js/bootstrap-notify.js"></script>-->

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose 
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! 
	<script src="assets/js/demo.js"></script>
-->
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Summer Training Project at <b>Globtier Infotech PVT LTD</b> Developed by <b>KARTIKEYA MISRA</b> B.tech (IT)3rd Yr IET Lucknow."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
