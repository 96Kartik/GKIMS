

<h1 class="page-title">
  <?php echo lang('manage_admin');?>
</h1>
<ul class="breadcrumb">
  <li>
    <a href="<?php echo base_url('admin') ?>"> <?php echo lang('dashboard');?>
    </a>
  </li>
  <li class="active">
    <?php echo lang('manage_admin');?>
  </li>
  <li class="active">
    <?php echo lang('change_password');?>
  </li>
</ul>


<div class="row">
  <div class="col-md-12">
   
    <?php if($this->session->flashdata('success_message')!='') { ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('success_message');?>
        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert">
        </i>
    </div>
    <?php } ?>
    
    <?php if($this->session->flashdata('error_message')!='') { ?>
    <div class="alert alert-warning">
      <?php echo $this->session->flashdata('error_message');?>
        <i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert">
        </i>
    </div>
    <?php } ?>
    
  </div>
</div>
<hr class="whiter" />
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> <?php echo lang('form');?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10">
                    <form action="<?php echo base_url('admin/change_admin');?>" method="post" id="change_pass" accept-charset="utf-8" class="form" enctype="multipart/form-data">
                      <input type="hidden" name="changepass" value="1"/>
                    <div class="form-group">
                    <label for="subtitle">
                    <?php echo lang('current_password');?>
                    </label>
                    <input name="old_password" value="" class="form-control" id="old_password" placeholder="<?php echo lang('current_password');?>" type="password" style="width:50%">
                    </div>
                    <div class="space-4">
                    </div>
                    <div class="form-group">
                    <label for="subtitle">
                    <?php echo lang('new_password');?>
                    </label>
                    <input name="password" value="" class="form-control" id="password" placeholder="<?php echo lang('new_password');?>" type="password" style="width:50%">
                    </div>
 <div class="space-4">
                    </div>
                    <div class="form-group">
                    <label for="subtitle">
                    <?php echo lang('confirm_password');?>
                    </label>
                    <input name="confirmpassword" value="" class="form-control" id="confirmpassword" placeholder=" <?php echo lang('confirm_password');?>" type="password" style="width:50%">
                    </div>

                    <div class="clearfix form-actions">
                    <input name="submit" value="Submit" class="btn btn-primary" id="submit" type="submit">
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
