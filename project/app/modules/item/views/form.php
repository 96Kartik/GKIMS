<?php
error_reporting(0);
$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'item/process';
echo form_open($action, array('class' => 'form'));
echo '<div class="col-md-6">';
echo (isset($record->id)) ? form_hidden('id', $record->id) : form_hidden('id', 'new');

echo $input_div_open;
echo form_label(lang('item_name') . $required, 'title');
$item_name = array(
    'name' => 'item_name',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_name'),
    'value' => (isset($record->item_name)) ? $record->item_name : set_value('item_name'));
echo form_input($item_name);
echo form_error('item_name');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_model_number') . $required, 'title');
$item_model_number = array(
    'name' => 'item_model_number',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_model_number'),
    'value' => (isset($record->item_model_number)) ? $record->item_model_number : set_value('item_model_number'));
echo form_input($item_model_number);
echo form_error('item_model_number');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('category_id') . $required, 'title');
$options = get_all_category_opt();
$role_id = array(
    'name' => 'category_id',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('category_id'),
    'value' => (isset($record->category_id)) ? $record->category_id : set_value('category_id'));
echo form_dropdown('category',$options,$category_id, $extra = 'class="form-control" id="title"');
echo form_error('category_id');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_identification_key') . $required, 'title');
$item_identification_key = array(
    'name' => 'item_identification_key',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_identification_key'),
    'value' => (isset($record->item_identification_key)) ? $record->item_identification_key : set_value('item_identification_key'));
echo form_input($item_identification_key);
echo form_error('item_identification_key');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_description') . $required, 'title');
$item_description = array(
    'name' => 'item_description',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_description'),
    'value' => (isset($record->item_description)) ? $record->item_description : set_value('item_description')
);
echo form_input($item_description);
echo form_error('item_description');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_cost_price') . $required, 'title');
$item_cost_price = array(
    'name' => 'item_cost_price',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_cost_price'),
    'value' => (isset($record->item_cost_price)) ? $record->item_cost_price : set_value('item_cost_price')
);
echo form_input($item_cost_price);
echo form_error('item_cost_price');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('vendor_id') . $required, 'title');
$options = get_all_vendor_opt();
$role_id = array(
    'name' => 'vendor_id',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('vendor_id'),
    'value' => (isset($record->vendor_id)) ? $record->vendor_id : set_value('vendor_id'));
echo form_dropdown('vendor',$options,$vendor_id, $extra = 'class="form-control" id="title"');
echo form_error('vendor_id');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_purchase_date') . $required, 'title');
$item_purchase_date = array(
    'name' => 'item_purchase_date',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_purchase_date'),
    'value' => (isset($record->item_purchase_date)) ? $record->item_purchase_date : set_value('item_purchase_date')
);
echo form_input($item_purchase_date);
echo form_error('item_purchase_date');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_location') . $required, 'title');
$item_location = array(
    'name' => 'item_location',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_location'),
    'value' => (isset($record->item_location)) ? $record->item_location : set_value('item_location')
);
echo form_input($item_location);
echo form_error('item_location');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item_quantity') . $required, 'title');
$item_quantity = array(
    'name' => 'item_quantity',
    'class' => 'form-control',
    'id' => 'title',
    'placeholder' => lang('item_quantity'),
    'value' => (isset($record->item_quantity)) ? $record->item_quantity : set_value('item_quantity')
);
echo form_input($item_quantity);
echo form_error('item_quantity');
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

