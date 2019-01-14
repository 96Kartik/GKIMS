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
echo form_textarea($category_description);
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

echo form_close();
?>

