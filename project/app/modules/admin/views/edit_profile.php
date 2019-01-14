 <section class="content-header">
  <h5>
	<?php echo lang('user_management');?>
	<small>Control panel</small>
  </h5>

  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
	<li class=""><?php echo lang('user_management');?></li>
	<li class="active"><?php echo lang('edit_page');?></li>
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
 <div class="col-md-8">
 <div class="card">
<?php
error_reporting(0);
$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'admin/auth/process_profile';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('user_name') . $required, 'title');
$user_name = array(
    'name' => 'user_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('user_name'),
    'value' => (isset($record->user_name)) ? $record->user_name : set_value('user_name'));
echo form_input($user_name);
echo form_error('user_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('email') . $required, 'title');
$email = array(
    'name' => 'email',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('email'),
    'value' => (isset($record->email)) ? $record->email : set_value('email'));
echo form_input($email);
echo form_error('email');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('first_name') . $required, 'title');
$first_name = array(
    'name' => 'first_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('first_name'),
    'value' => (isset($record->first_name)) ? $record->first_name : set_value('first_name'));
echo form_input($first_name);
echo form_error('first_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('last_name') . $required, 'title');
$last_name = array(
    'name' => 'last_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('last_name'),
    'value' => (isset($record->last_name)) ? $record->last_name : set_value('last_name'));
echo form_input($last_name);
echo form_error('last_name');
echo $input_div_close;




$submit = array(
    'name' => 'submit',
    'class' => 'btn btn-primary',
    'id' => 'submit',
    'value' => lang('submit')
);
echo form_submit($submit);
echo '</div>';

echo form_close();
?>
</div>
</div>
<div class="fluid-container col-md-4 ">
 <div class="card card-user">
                            <div class="image">
                                <img src="/project/assets/admin/img/img_bg.jpg" />
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-gray" src="<?php echo get_img_path($record->id);?>"/>

                                      <h4 class="title"><?php echo lang('dp_path');?><br />
                                         <small>click Browse to change dp</small>
                                      </h4>
                                  </div>
                               
                            </div>
                            <hr>
                            <div class="text-center">
                           
							<form action="<?php echo base_url('admin/auth/upload_img'); ?>" align="center" method="POST" enctype="multipart/form-data">
								<label for="fileupload">File to be uploaded :</label>
								<input  class="btn btn-info btn-fill pull-left" style="position:relative;width:250px" type="file" name="fileupload" id="fileupload" accept="audio/*,video/*,fileupload/*,media_type/*">
								<input type="hidden" name="id" value="<?php echo $record->id;?>">
			
								<button class="btn btn-info btn-fill pull-right" style ="position:relative;width:100px;"type="submit" value='UPLOAD' name="upload" align="center" method="post">Upload</button>
							</form>
                            </div>
                        </div>
</div>
</div>
