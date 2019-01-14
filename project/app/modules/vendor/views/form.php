<?php

$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'vendor/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('vendor_name') . $required, 'title');
$vendor_name = array(
    'name' => 'vendor_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('vendor_name'),
    'value' => (isset($record->vendor_name)) ? $record->vendor_name : set_value('vendor_name'));
echo form_input($vendor_name);
echo form_error('vendor_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('vendor_address') . $required, 'title');
$vendor_address = array(
    'name' => 'vendor_address',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('vendor_address'),
    'value' => (isset($record->vendor_address)) ? $record->vendor_address : set_value('vendor_address')
);
echo form_textarea($vendor_address);
echo form_error('vendor_address');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('vendor_contact') . $required, 'title');
$vendor_contact = array(
    'name' => 'vendor_contact',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('vendor_contact'),
    'value' => (isset($record->vendor_contact)) ? $record->vendor_contact : set_value('vendor_contact')
);
echo form_input($vendor_contact);
echo form_error('vendor_contact');
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

