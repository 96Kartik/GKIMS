<div class="col-md-12">
   <span class="alert-message" id="message_<?php echo $param->field;?>"></span>
   
</div>
<div class="col-md-4 pull-right">
  <div class="form-group pull-right">
	<select name="operation" class="list-dropdown" id="performAction" onChange="initilizeOpertion(this.id, '<?php echo $param->field;?>');">
	   <option value=""><?php echo lang('select_action');?></option>
	   <option value="delete_selected"><?php echo lang('delete_selected');?></option>
	</select>
  </div>
</div>
<div class="clearfix"></div>


		  <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
						<th><input type="checkbox" name="check_all" id="check_all" onClick="check_all();"/></th>	
                     <th><?php echo lang('item_name');?></th>
                     <th><?php echo lang('item_model_number');?></th>
                     <th><?php echo lang('category');?></th>
                     <th><?php echo lang('item_identification_key');?></th>
					<th><?php echo lang('item_description');?></th>
					<th><?php echo lang('item_cost_price');?></th>
					<th><?php echo lang('item_vendor');?></th>
					<th><?php echo lang('item_purchase_date');?></th>
					<th><?php echo lang('item_location');?></th>
					<th><?php echo lang('item_quantity');?></th>
					<th><?php echo lang('item_status');?></th>
					<th><?php echo lang('action');?></th>
				
                    </tr>
                        <?php
    if (!empty($result)) {
        foreach ($result as $row) {
			//dump($row);
            ?>
            <tr>
		<td><input type="checkbox" name="id_array[]" id="banner" class="id_array" value="<?php echo $row->item_id;?>" /> </td>
                <td><?php echo $row->item_name ;?></td>
                <td><?php echo $row->item_model_number ;?></td>
                <td><?php echo get_category_name($row->category_id) ;?></td>
                <td><?php echo $row->item_identification_key; ?></td>
                <td><?php echo truncate_string($row->item_description,10,25);	?></td>
                <td><?php echo $row->item_cost_price; ?></td>
                <td><?php echo get_vendor_name($row->item_vendor_id); ?></td>
                <td><?php echo $row->item_purchase_date ;?></td>
                <td><?php echo $row->item_location; ?></td>
                <td><?php echo $row->item_quantity ;?></td>
           
                <?php if ($row->item_status == 1) { ?>
                    <td><a href="javascript:void(0);" onclick="update_status('<?php echo $row->item_id; ?>', '<?php echo $param->field;?>', '0');" class="label label-success"><?php echo lang('enabled');?></a></td>
                <?php } else { ?>
                    <td><a href="javascript:void(0);" onclick="update_status('<?php echo $row->item_id; ?>', '<?php echo $param->field;?>', '1');" class="label label-warning"><?php echo lang('disabled');?></a></td>
                <?php } ?>
                    <!--<td><?php echo get_datepicker_date($row->created_on, 'full');?></td>    -->
                <td>
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('item/edit/' . $row->item_id); ?>">
                        <i class="pe-7s-pen"></i>
                    </a>
					 <a class="btn btn-primary btn-sm" href="<?php echo base_url('item/view/' . $row->item_id); ?>">
                        <i class="pe-7s-look"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to Delete?');" href="<?php echo base_url('item/delete_data/' . $row->item_id); ?>">
                        <i class="pe-7s-junk"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" align="center"><?php echo lang('no_record_found');?></td>
        </tr>
<?php } ?>
                  </table>
                </div>
<!--<table class="table table-hover table-striped">
    <tr>
	<th><input type="checkbox" name="check_all" id="check_all" onClick="check_all();"/></th>
        <th><?php echo lang('title');?></th>
        <th><?php echo lang('code');?></th>
        <th><?php echo lang('status');?></th>
        <th><?php echo lang('date');?></th>
        <th><?php echo lang('action');?></th>
    </tr>
    <?php
    if (!empty($result)) {
        foreach ($result as $row) {
            ?>
            <tr>
		<td><input type="checkbox" name="id_array[]" id="banner" class="id_array" value="<?php echo $row->id;?>" /> </td>
                <td><?php echo $row->dept_name; ?></td>
                <td><?php echo $row->dept_code; ?></td>
                <?php if ($row->status == 1) { ?>
                    <td><a href="javascript:void(0);" onclick="update_status('<?php echo $row->id; ?>', '<?php echo $param->field;?>', '0');" class="btn btn-success btn-sm"><?php echo lang('enabled');?></a></td>
                <?php } else { ?>
                    <td><a href="javascript:void(0);" onclick="update_status('<?php echo $row->id; ?>', '<?php echo $param->field;?>', '1');" class="btn btn-warning btn-sm"><?php echo lang('disabled');?></a></td>
                <?php } ?>
                    <td><?php echo get_datepicker_date($row->created_on, 'full');?></td>    
                <td>
                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('department/edit/' . $row->id); ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to Delete?');" href="<?php echo base_url('department/delete_data/' . $row->id); ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="5" align="center"><?php echo lang('no_record_found');?></td>
        </tr>
<?php } ?>

</table>-->

<div class="pagination pull-right">
    <?php echo $pagination;?>
</div>
