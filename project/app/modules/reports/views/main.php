<section class="content-header">
  <h4>
	<?php echo lang('report_management');?>
	<small>Control panel</small>
  </h4>
 
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
	<li class=""><?php echo lang('report_management');?></li>
  </ol>
 
</section>



<hr style="height: 0.1em ;">

<div class="row">
    <div class="col-md-12">
        <?php if($this->session->flashdata('success_message')!='') { ?>
                <div class="alert alert-success">
			<?php echo $this->session->flashdata('success_message');?>
                        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert"></i>
                </div>
        <?php } ?>
        
        <?php if($this->session->flashdata('error_message')!='') { ?>
                <div class="alert alert-warning">
			<?php echo $this->session->flashdata('error_message');?>
                        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert"></i>
                </div>
        <?php } ?>
        
    </div>
</div>
<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h3 class="title">Inventory Reports</h3>
                               
                            </div>
                            <div class="content all-icons">
                                <div class="row" >
                                  <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12" >
                                    <a href="<?php echo base_url('reports/activeMembers');?>" style="background-color:red"><div class="font-icon-detail"><i class="pe-7s-users"></i>
                                      <input type="text" value="Active Members Report">
                                    </div></a>

                                  </div>
                                  <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12">
                                    <a href="<?php echo base_url('reports/availableItems');?>"><div class="font-icon-detail"><i class="pe-7s-drawer"></i>
                                      <input type="text" value="Active Items Report">
                                    </div></a>

                                  </div>
                                  <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12">
                                     <a href="<?php echo base_url('reports/activeVendors');?>"><div class="font-icon-detail"><i class="pe-7s-cash"></i>
                                      <input type="text" value="Active Vendors Report">
                                    </div></a>

                                  </div>
									
                                </div>
								
								
								 <div class="row">
                                   <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12">
                                     <a href="<?php echo base_url('reports/itemAllocation');?>"><div class="font-icon-detail"><i class="pe-7s-science"></i>
                                      <input type="text" value="Items Allotment Report">
                                    </div></a>

                                  </div>
                                  <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12">
                                    <a href="<?php echo base_url('reports/unavailableItems');?>"><div class="font-icon-detail"><i class="pe-7s-cart"></i>
                                      <input type="text" value="Out of Stock Items Report">
                                    </div></a>

                                  </div>
                                  <div class="font-icon-list col-lg-4 col-md-6 col-sm-8 col-xs-12 col-xs-12">
                                     <a href="<?php echo base_url('reports/outdatedItems');?>"><div class="font-icon-detail"><i class="pe-7s-drop"></i>
                                      <input type="text" value="Outdated Items Report">
                                    </div></a>

                                  </div>
                                
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
