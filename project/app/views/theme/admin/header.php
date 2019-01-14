      <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" >GlobKart Inventory Management</a>
                </div>
                <div class="collapse navbar-collapse">
                

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php echo $this->session->userdata['kart_first_name'].' '.$this->session->userdata['kart_last_name'];?>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('admin/auth/edit_profile/1');?>">Edit Profile</a></li>
								<li><a href="<?php echo base_url('admin/auth/change_password');?>">Change Password</a></li>
                                <li><a href="">Refresh</a></li>
                                <li><a href="<?php echo base_url('admin/auth/logout');?>">Log Out</a></li>
                              
                                <li class="divider"></li>
                                <li><a href="http://www.globtierinfotech.com/contact-us.htm">Contact Us</a></li>
                              </ul>
                        </li>
                        <li>
                          
                           
                        </li>
                    </ul>
                </div>
            </div>
        </nav>