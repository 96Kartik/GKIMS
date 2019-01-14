
<section class="content-header">
  <h5>
	<?php echo lang('member_management');?>
	<small>Control panel</small>
  </h5>

  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
	<li class=""><?php echo lang('member_management');?></li>
	<li class="active"><?php echo lang('edit_page');?></li>
  </ol>
 
</section>

<div class="row">
    <div class="col-md-12">
         <a href="<?php echo base_url('member');?>" class="btn btn-primary pull-right">
		<i class="fa fa-hand-o-left"></i> <?php echo lang('back');?>
	</a>
    </div>
</div>

<hr class="whiter" />
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> <?php echo lang('page_form_view');?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->load->view('form_view');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
