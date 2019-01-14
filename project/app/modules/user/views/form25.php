<?php

$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'category/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('category_name') . $required, 'title');
$category_name = array(
    'name' => 'category_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('category_name'),
    'value' => (isset($record->category_name)) ? $record->category_name : set_value('category_name'));
echo form_input($category_name);
echo form_error('category_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('category_description') . $required, 'title');
$category_description = array(
    'name' => 'category_description',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('category_description'),
    'value' => (isset($record->category_description)) ? $record->category_description : set_value('category_description')
);
echo form_input($category_description);
echo form_error('category_description');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('category_code') . $required, 'title');
$category_code = array(
    'name' => 'category_code',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('category_code'),
    'value' => (isset($record->category_code)) ? $record->category_code : set_value('category_code')
);
echo form_input($category_code);
echo form_error('category_code');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('category_status') . $required, 'title');
$category_status = array(
    'name' => 'category_status',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('category_status'),
    'value' => (isset($record->category_status)) ? $record->category_status : set_value('category_status')
);
echo form_input($category_status);
echo form_error('category_status');
echo $input_div_close;

echo $input_div_open;
echo form_label(lang('no_of_items') . $required, 'title');
$no_of_items = array(
    'name' => 'no_of_items',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('no_of_items'),
    'value' => (isset($record->no_of_items)) ? $record->no_of_items : set_value('no_of_items')
);
echo form_input($no_of_items);
echo form_error('no_of_items');
echo $input_div_close;


$submit = array(
    'name' => 'submit',
    'class' => 'btn btn-primary',
    'id' => 'submit',
    'value' => lang('submit')
);
echo form_submit($submit);
echo '</div>';
// echo '<div class="col-md-6">';
// echo $input_div_open;
// echo form_label(lang('department') . $required, 'title');
// $options = get_all_department_opt();
// $dept_id = (isset($record->dept_id)) ?  $record->dept_id : '';
// echo form_dropdown('department',$options,$dept_id, $extra = 'class="form-control" id="title"');
// echo $input_div_close;

// echo $input_div_open;
// echo form_label(lang('role') . $required, 'title');
// $options = get_all_users_role();
// $user_role = (isset($record->user_role)) ? $record->user_role : '1';
// echo form_multiselect('role', $options,$user_role , $extra = 'class="form-control" id="title"');
// echo $input_div_close;
// echo $input_div_open;
// echo form_label(lang('allowed_vacations'), 'title');
// $allowed_vacations = array(
    // 'name' => 'allowed_vacations',
    // 'class' => 'form-control',
    // 'id' => 'title',
    // 'placeholder' => lang('allowed_vacations'),
    // 'value' => (isset($record->allowed_vacations)) ? $record->allowed_vacations : set_value('allowed_vacations')
// );
// echo form_input($allowed_vacations);
// echo form_error('allowed_vacations');
// echo $input_div_close;

// echo $input_div_open;
// echo form_label(lang('allowed_hours'), 'title');
// $allowed_hours = array(
    // 'name' => 'allowed_hours',
    // 'class' => 'form-control',
    // 'id' => 'title',
    // 'placeholder' => lang('allowed_hours'),
    // 'value' => (isset($record->allowed_hours)) ? $record->allowed_hours : set_value('allowed_hours')
// );
// echo form_input($allowed_hours);
// echo form_error('allowed_hours');
// echo $input_div_close;

// echo $input_div_open;
// echo form_label(lang('user_type'), 'title');
// $options = array(' '=>'Select User Type','consultant'=>'Consultant','empbySal'=>'Emp By Salary','empbyHour'=>'Emp By Hour');
// $user_type = (isset($record->user_type)) ?  $record->user_type : '';
// echo form_dropdown('user_type',$options,$user_type, $extra = 'class="form-control" id="title"');
// echo $input_div_close;

// echo '</div>';
echo form_close();
?>

