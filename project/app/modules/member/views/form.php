<?php
error_reporting(0);
$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'member/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('full_name') . $required, 'title');
$full_name = array(
    'name' => 'full_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('full_name'),
    'value' => (isset($record->full_name)) ? $record->full_name : set_value('full_name'));
echo form_input($full_name);
echo form_error('full_name');
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
echo form_label(lang('role_id') . $required, 'title1');
$options = get_all_role_opt();
$role_id = array(
    'name' => 'role_id',
    'class' => 'form-control',
    'id' => 'title1',
    'placeholder' => lang('role_id'),
    'value' => (isset($record->role_id)) ? $record->role_id : set_value('role_id'));
echo form_dropdown('role',$options,$role_id, $extra = 'class="form-control" id="title1"');
echo form_error('role_id');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_identification_code') . $required, 'title');
$member_identification_code = array(
    'name' => 'member_identification_code',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_identification_code'),
    'value' => (isset($record->member_identification_code)) ? $record->member_identification_code : set_value('member_identification_code'));
echo form_input($member_identification_code);
echo form_error('member_identification_code');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_description') . $required, 'title');
$member_description = array(
    'name' => 'member_description',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_description'),
    'value' => (isset($record->member_description)) ? $record->member_description : set_value('member_description')
);
echo form_input($member_description);
echo form_error('member_description');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('dept_id') . $required, 'title');
$options = get_all_dept_opt();
$role_id = array(
    'name' => 'dept_id',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('dept_id'),
    'value' => (isset($record->dept_id)) ? $record->dept_id : set_value('dept_id'));
echo form_dropdown('dept',$options,$dept_id, $extra = 'class="form-control" id="title"');
echo form_error('dept_id');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('display_picture_path') . $required, 'title');
$display_picture_path = array(
    'name' => 'display_picture_path',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('display_picture_path'),
    'value' => (isset($record->display_picture_path)) ? $record->display_picture_path : set_value('display_picture_path')
);
echo form_input($display_picture_path);
echo form_error('display_picture_path');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_address') . $required, 'title');
$member_address = array(
    'name' => 'member_address',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_address'),
    'value' => (isset($record->member_address)) ? $record->member_address : set_value('member_address')
);
echo form_input($member_address);
echo form_error('member_address');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_city') . $required, 'title');
$member_city = array(
    'name' => 'member_city',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_city'),
    'value' => (isset($record->member_city)) ? $record->member_city : set_value('member_city')
);
echo form_input($member_city);
echo form_error('member_city');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_state') . $required, 'title');
$member_state = array(
    'name' => 'member_state',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_state'),
    'value' => (isset($record->member_state)) ? $record->member_state : set_value('member_state')
);
echo form_input($member_state);
echo form_error('member_state');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_zip_code') . $required, 'title');
$member_zip_code = array(
    'name' => 'member_zip_code',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_zip_code'),
    'value' => (isset($record->member_zip_code)) ? $record->member_zip_code : set_value('member_zip_code')
);
echo form_input($member_zip_code);
echo form_error('member_zip_code');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_country') . $required, 'title');
$member_country = array(
    'name' => 'member_country',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_country'),
    'value' => (isset($record->member_country)) ? $record->member_country : set_value('member_country')
);
echo form_input($member_country);
echo form_error('member_country');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('member_phone') . $required, 'title');
$member_phone = array(
    'name' => 'member_phone',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('member_phone'),
    'value' => (isset($record->member_phone)) ? $record->member_phone : set_value('member_phone')
);
echo form_input($member_phone);
echo form_error('member_phone');
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
