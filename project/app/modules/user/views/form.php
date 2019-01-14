<?php

$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'user/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('username') . $required, 'title');
$username = array(
    'name' => 'username',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('username'),
    'value' => (isset($record->username)) ? $record->username : set_value('username')
);
echo form_input($username);
echo form_error('username');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('first_name') . $required, 'title');
$first_name = array(
    'name' => 'first_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('first_name'),
    'value' => (isset($record->first_name)) ? $record->first_name : set_value('first_name')
);
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
    'value' => (isset($record->last_name)) ? $record->last_name : set_value('last_name')
);
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
    'value' => (isset($record->email)) ? $record->email : set_value('email')
);
echo form_input($email);
echo form_error('email');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('password') , 'title');
$password = array(
    'name' => 'password',
    'class' => 'form-control',
    'id' => 'title',
	'autocomplete'=>'off',
    'placeholder' => lang('password'),
    'value' => (isset($record->password)) ? $record->password : set_value('password')
);
echo form_password($password);
echo form_error('password');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('con_password') , 'title');
$con_password = array(
    'name' => 'con_password',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('con_password'),
    'value' => (isset($record->con_password)) ? $record->con_password : set_value('con_password')
);
echo form_password($con_password);
echo form_error('con_password');

echo $input_div_close;
echo $input_div_open;
echo form_label(lang('is_timesheet_required'), 'title');
$is_timesheet_required = array(
    'name'        => 'is_timesheet_required',
    'id'          => 'is_timesheet_required',
    'value'       => '1',
    'checked'     => (isset($record->is_timesheet_required) && $record->is_timesheet_required == 1) ? TRUE : FALSE,
    'style'       => 'margin:10px',
    );

echo form_checkbox($is_timesheet_required);
echo form_error('is_timesheet_required');
echo $input_div_close;



$submit = array(
    'name' => 'submit',
    'class' => 'btn btn-primary',
    'id' => 'submit',
    'value' => lang('submit')
);
echo form_submit($submit);
echo '</div>';
echo '<div class="col-md-6">';

echo $input_div_open;
echo form_label(lang('phone') . $required, 'title');

$phone = array(
    'name' => 'phone',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('phone'),
    'value' => (isset($record->phone)) ? $record->phone : set_value('phone')
);
echo form_input($phone);
echo form_error('phone');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('department') . $required, 'title');
$options = get_all_department_opt();
$dept_id = (isset($record->dept_id)) ?  $record->dept_id : '';
echo form_dropdown('department',$options,$dept_id, $extra = 'class="form-control" id="title"');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('role') . $required, 'title');
$options = get_all_users_role();
$user_role = (isset($record->user_role)) ? $record->user_role : '1';
echo form_multiselect('role', $options,$user_role , $extra = 'class="form-control" id="title"');
echo $input_div_close;
echo $input_div_open;
echo form_label(lang('allowed_vacations'), 'title');
$allowed_vacations = array(
    'name' => 'allowed_vacations',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('allowed_vacations'),
    'value' => (isset($record->allowed_vacations)) ? $record->allowed_vacations : set_value('allowed_vacations')
);
echo form_input($allowed_vacations);
echo form_error('allowed_vacations');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('allowed_hours'), 'title');
$allowed_hours = array(
    'name' => 'allowed_hours',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('allowed_hours'),
    'value' => (isset($record->allowed_hours)) ? $record->allowed_hours : set_value('allowed_hours')
);
echo form_input($allowed_hours);
echo form_error('allowed_hours');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('user_type'), 'title');
$options = array(' '=>'Select User Type','consultant'=>'Consultant','empbySal'=>'Emp By Salary','empbyHour'=>'Emp By Hour');
$user_type = (isset($record->user_type)) ?  $record->user_type : '';
echo form_dropdown('user_type',$options,$user_type, $extra = 'class="form-control" id="title"');
echo $input_div_close;

echo '</div>';
echo form_close();
?>

