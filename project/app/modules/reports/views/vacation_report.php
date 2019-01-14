  <section class="content-header">
          <h1>
            <?php echo lang('report_management');?>
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('report_management');?></li>
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
     
			<div class="loader-gif" id="loader" style="display:none;">
				<img src="<?php echo link_front_image('loader.gif');?>" rel="<?php echo lang('loading');?>" />
			</div>
			
				
				<div class="col-md-12">
				<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Users Vacations Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
					
					<?php echo $table;?>
					
					
					<a href="<?php echo base_url('reports/user_vacation_csv');?>" class="btn btn-success "><i class="fa fa-fw fa-download"></i> <?php echo lang('export_csv');?></a>
					
					
				 </div><!-- /.box-body -->
				 
              </div>
			</div>
			
           
    </div>
	

</div>





