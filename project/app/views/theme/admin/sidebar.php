<?php

$class =$this->router->fetch_class();
$method =$this->router->fetch_method();

?>
<div class="sidebar" data-color="purple" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo" data-image="">
                <a href="http://www.globtierinfotech.com/aboutus.htm" class="simple-text">
            <img src="<?php echo link_admin_image('logo.gif');?>" style="width: 77%;"/>
                </a>
            </div>

            <ul class="nav">
                <li <?php if($class == 'home'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('home');?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if($class == 'item'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('item');?>">
                        <i class="pe-7s-drawer"></i>
                        <p>Items </p>
                    </a>
                </li>
				<li <?php if($class == 'allocation'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('allocation');?>">
                        <i class="pe-7s-shuffle"></i>
                        <p>Item Allocations </p>
                    </a>
                </li>
                <li <?php if($class == 'category'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('category');?>">
                        <i class="pe-7s-albums"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li <?php if($class == 'member'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('member');?>">
                        <i class="pe-7s-users"></i>
                        <p>Members</p>
                    </a>
                </li>
				<li <?php if($class == 'dept'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('dept');?>">
                        <i class="pe-7s-way"></i>
                        <p>Departments</p>
                    </a>
                </li>
				<li <?php if($class == 'vendor'){?>class="active"<?php }?>>
                    <a href="<?php echo base_url('vendor');?>">
                        <i class="pe-7s-shopbag"></i>
                        <p>Vendors</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="<?php echo base_url('reports');?>">
                        <i class="pe-7s-graph1"></i>
                        <p>Reports</p>
                    </a>
                </li>
				
            <!--    <li class="active-pro">
                    <a href="<?php echo base_url('alert');?>">
                        <i class="pe-7s-alarm"></i>
                        <p>Alerts</p>
                    </a>
                </li>-->
				
               
				
            </ul>
    	</div>
    </div>
	