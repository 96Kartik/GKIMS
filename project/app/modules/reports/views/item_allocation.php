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

<div class="row">
    <div class="col-md-12">
         <a href="<?php echo base_url('reports');?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> <?php echo lang('back');?></a>
    </div>
</div>
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
                  <h3 class="box-title">Items Allotment Information</h3>
				<div class="row col-lg-6 col-md-8 col-sm-10 col-xs-12">
				<?php
				$input_div_open = '<div class="form-group">';
				$input_div_close = '</div>';
				$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
				
				echo $input_div_open;
				echo form_label(lang('member_name') . $required, 'title');
				$options = get_all_member_opt();
				//dump($options);
				$client = (isset($record->member_name)) ?  $record->member_name : '';
				echo form_dropdown('member_id',$options,$client, $extra = 'class="form-control" id="member_id"');
				echo $input_div_close;
				
				echo form_close();
				?>
                </div>
				</div>
				<!-- /.box-header -->
                <div class="box-body" id="allocationTableDiv">
					<?php echo $table;?>
					
				 </div><!-- /.box-body -->
				 <a href="<?php echo base_url('reports/itemAllocation_csv');?>" class="btn btn-success "><i class="fa fa-fw fa-download"></i> <?php echo lang('export_csv');?></a>
              </div>
				</div>
			
           
    </div>
</div>





