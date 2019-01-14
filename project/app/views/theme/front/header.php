 <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('home');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>i</b>H</span>
          <!-- logo for regular state and mobile devices -->
		  <?php $logo = get_user_logo();
		  if(!empty($logo)){
		  ?>
          <span class="logo-lg"><img style="width:108px;" src="<?php echo base_url('assets/uploads/logos/thumb/').'/'.$logo;?>"/></span>
		  <?php } else { ?>
		  <span class="logo-lg"><b>i</b>Hour</span>
		  <?php } ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
           
              <!-- Tasks: style can be found in dropdown.less -->
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo link_front_image('avatar5.png');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata['ehs_first_name'].' '.$this->session->userdata['ehs_last_name'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo link_front_image('avatar5.png');?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata['ehs_first_name'].' '.$this->session->userdata['ehs_last_name'];?>
                     
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('profile');?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('login/auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>