<?php 
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>

<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo link_front_image('avatar5.png');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata['ehs_first_name'].' '.$this->session->userdata['ehs_last_name'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if($class == 'home'){?> class="active" <?php } ?>>
              <a href="<?php echo base_url('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
           
            </li>
			<li <?php if($class == 'timesheet'){?> class="active" <?php } ?>>
              <a href="<?php echo base_url('timesheet');?>">
                <i class="fa fa-fw fa-edit"></i> <span>Enter Timesheets</span> 
              </a>
            
            </li>
			
		
			
			<?php if($this->session->userdata['ehs_user_role_id'] ==1 || $this->session->userdata['ehs_user_role_id'] ==2){?>
				<?php if($class == 'reports'){?>
			 <li class="treeview active">
			 <?php }else{?>
			<li class="treeview">
			<?php } ?>
              <a href="#">
                <i class="fa fa-fw fa-file-text"></i>
                <span>Admin Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($method == 'client'){?> class="active" <?php } ?>><a href="<?php echo base_url('client-report');?>"><i class="fa fa-circle-o text-aqua"></i>Client Report</a></li>
                <li <?php if($method == 'project_report'){?> class="active" <?php } ?>><a href="<?php echo base_url('project-report');?>"><i class="fa fa-circle-o text-aqua"></i>Project Report</a></li>
                <li <?php if($method == 'user_report'){?> class="active" <?php } ?>><a href="<?php echo base_url('user-report');?>"><i class="fa fa-circle-o text-aqua"></i>Users Report</a></li>
                <!--<li <?php if($method == 'user_vacation'){?> class="active" <?php } ?>><a href="<?php echo base_url('reports/user_vacation');?>"><i class="fa fa-circle-o text-aqua"></i>User Vacation Report</a></li>-->
				<li <?php if($method == 'user_timereport'){?> class="active" <?php } ?>><a href="<?php echo base_url('user-timereport');?>"><i class="fa fa-circle-o text-aqua"></i>User Time Report</a></li>
              </ul>
            </li>
			<?php if($class == 'department' || $class == 'user' || $class == 'client' || $class == 'project' || $class == 'lock' || $class == 'timesheet' || $class == 'assignment'){?>
            <li class="treeview active">
			<?php }else{?>
			 <li class="treeview">
			<?php } ?>
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Manage</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($class == 'department'){?> class="active" <?php } ?> ><a href="<?php echo base_url('department');?>"><i class="fa fa-fw fa-briefcase"></i> Departments</a></li>
                <li <?php if($class == 'user'){?> class="active" <?php } ?>><a href="<?php echo base_url('user');?>"><i class="fa fa-fw fa-user"></i> Users</a></li>
                <li <?php if($class == 'client'){?> class="active" <?php } ?>><a href="<?php echo base_url('client');?>"><i class="fa fa-fw fa-group"></i> Clients</a></li>
                <li <?php if($class == 'project'){?> class="active" <?php } ?> ><a href="<?php echo base_url('project');?>"><i class="fa fa-fw fa-folder"></i>Projects</a></li>
					<?php if($this->session->userdata['ehs_user_role_id'] ==1){?>
                <li <?php if($class == 'assignment'){?> class="active" <?php } ?>><a href="<?php echo base_url('assignment');?>"><i class="fa fa-fw fa-book"></i>Assignments</a></li>
					<?php }?>
					<?php if($this->session->userdata['ehs_user_role_id'] ==1){?>
                <li <?php if($class == 'lock'){?> class="active" <?php } ?> ><a href="<?php echo base_url('lock');?>"><i class="fa fa-fw fa-clock-o"></i>Locked Periods</a></li>
				<li <?php if($class == 'managetimesheet'){?> class="active" <?php } ?> ><a href="<?php echo base_url('managetimesheet');?>"><i class="fa fa-fw fa-clock-o"></i>Timesheets Manage</a></li>
					<?php } ?>
               
              </ul>
            </li>
			<?php if($this->session->userdata['ehs_user_role_id'] ==1){?>
			<?php if($class == 'configure'){?> <li class="treeview active"> <?php }else{ ?>
			<li class="treeview">
			<?php }?>
              <a href="#">
                <i class="fa fa-fw fa-cog"></i>
                <span>Configure System</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($method == 'change_logo'){?> class="active" <?php } ?>><a href="<?php echo base_url('change-logo');?>"><i class="fa fa-fw fa-photo"></i>Edit Logo</a></li>
             
                <li <?php if($method == 'mail_config'){?> class="active" <?php } ?>><a href="<?php echo base_url('mail-config');?>"><i class="fa fa-fw fa-envelope"></i>Email Settings</a></li>
				
				 <li <?php if($method == 'sys_settings'){?> class="active" <?php } ?>><a href="<?php echo base_url('sys-settings');?>"><i class="fa fa-fw fa-wrench"></i>System Settings</a></li>
              </ul>
            </li>
			<?php } ?>
			<?php } ?>
			<?php if($this->session->userdata['ehs_user_role_id'] ==1 || $this->session->userdata['ehs_user_role_id'] ==2){?>
			<li <?php if($class == 'reporting'){?> class="active" <?php } ?>>
              <a href="<?php echo base_url('reporting');?>">
                <i class="fa fa-fw fa-file-text"></i>
                <span>Reports</span>
               
              </a>
            </li>
			<?php } ?>
			<!--<li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Project Management</span>
               
              </a>
            </li>-->
			<?php if($this->session->userdata['ehs_user_role_id'] ==1 || $this->session->userdata['ehs_user_role_id'] ==2){?>
			<li class="header">System</li>
            <li><a href="<?php echo base_url('auditreport');?>"><i class="fa fa-fw fa-file-text"></i> <span>Logging</span></a></li>
			<?php if($this->session->userdata['ehs_user_role_id'] ==1 ){?>
			 <li>
				<a href="#">
					<i class="glyphicon glyphicon-save"></i> <span>Backup & Restore</span>
				</a>
			</li>
			
			<?php } ?>
			<?php } ?>
           
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>