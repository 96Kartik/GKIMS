


<section class="content-header">
  <h5>
	<?php echo lang('vendor_management');?>
	<small>Control panel</small>
  </h5>
   <div class="col-md-6 pull-right">
         <a href="<?php echo base_url('vendor/create');?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> <?php echo lang('add_page');?></a>
    </div>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
	<li class=""><?php echo lang('vendor_management');?></li>
	<li class="active"><?php echo lang('add_page');?></li>
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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> <?php echo lang('page_list');?>
            </div>
            <div class="panel-body">
			<div class="loader-gif" id="loader" style="display:none;">
				<img src="<?php echo link_front_image('loader.gif');?>" rel="<?php echo lang('loading');?>" />
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-xs-12 col-md-12">
							<div class="form-group input-group">
								<input class="form-control" type="text" name="nameSearch__vendor" id="nameSearch__vendor" placeholder="<?php echo lang('department_placeholder');?>" />
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
							</div>
						</div>
					</div>
					
					<div class="table-responsive list__vendor">

					</div>
				</div>
			</div>
            </div>
        </div>
    </div>
</div>

