<?php
$input_div_open = '<div class="form-group">';
$input_div_close = '</div>';
$required = ' <abbr class="required"><i class="fa fa-asterisk"></i></abbr>';
$action = 'allocation/process';
echo form_open($action, array('class' => 'form'));

echo $input_div_open;
echo form_label(lang('member_name') . $required, 'title');
$options = get_all_member_opt();
$client = (isset($record->member_name)) ?  $record->member_name : '';
echo form_dropdown('member_id',$options,$client, $extra = 'class="form-control" id="member_id"');
echo form_error('member_id');
echo $input_div_close;


echo $input_div_open;
echo form_label(lang('item') . $required, 'title');
echo "<div id='select-multi-item'>";
echo " <select id='pre-selected-options' multiple='multiple' name='items[]'>";
$options = get_all_item();

foreach($options as $key=>$opt){
	
	echo "<option value='".$key."'>".$opt."</option>";
}


echo	"</select>";
echo "</div>";
echo $input_div_close;




$submit = array(
    'name' => 'submit',
    'class' => 'btn btn-primary',
    'id' => 'submit',
    'value' => lang('submit')
);
echo form_submit($submit);
echo form_close();
?>

