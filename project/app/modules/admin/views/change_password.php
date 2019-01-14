 <section class="content-header">
  <h5>
	<?php echo lang('user_management');?>
	<small>Control panel</small>
  </h5>

  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
	<li class=""><?php echo lang('user_management');?></li>
	<li class="active"><?php echo lang('change_password');?></li>
  </ol>
 
</section>

<div class="row">
    <div class="col-md-12">
         <a href="<?php echo base_url('home');?>" class="btn btn-primary pull-right">
		<i class="fa fa-hand-o-left"></i> <?php echo lang('back');?>
	</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if($this->session->flashdata('message')!='') { ?>
                <div class="alert alert-success">
	<strong>Well done!</strong> <?php echo $this->session->flashdata('message');?>
                        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert"></i>
                </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change password form <span class="pull-right form_info"> <abbr class="required"><i class="fa fa-asterisk"></i></abbr> fields are mandatory.</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                         <?php echo form_open('admin/auth/change_password', array("class" => 'form'))?>
                                <input type="hidden" name="id" value="<?php echo $record->id;?>">
								<div class="form-group">
                                    <label>Old password <abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="old_password" placeholder="Old password" />
                                    <?php echo form_error('old_password');?>
                                </div>
                                <div class="form-group">
                                    <label>New password <abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="new_password" placeholder="New password"/>
                                    <?php echo form_error('new_password');?>
                                </div>
                                <div class="form-group">
                                    <label>Confirm password <abbr class="required"><i class="fa fa-asterisk"></i></abbr></label>
                                    <input type="password" class="form-control span12" name="confirm_password" placeholder="Confirm password" />
                                    <?php echo form_error('confirm_password');?>
                                </div>
                        <button name="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update</button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
