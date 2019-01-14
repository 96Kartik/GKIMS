<?php

$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'dept/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('dept_name') . $required, 'title');
$dept_name = array(
    'name' => 'dept_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('dept_name'),
    'value' => (isset($record->dept_name)) ? $record->dept_name : set_value('dept_name'));
echo form_input($dept_name);
echo form_error('dept_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('dept_description') . $required, 'title');
$dept_description = array(
    'name' => 'dept_description',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('dept_description'),
    'value' => (isset($record->dept_description)) ? $record->dept_description : set_value('dept_description')
);
echo form_textarea($dept_description);
echo form_error('dept_description');
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

