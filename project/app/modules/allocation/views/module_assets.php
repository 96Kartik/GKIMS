<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo link_admin_module_js(
        array(
			'jquery.typing-0.2.0.min.js',
        	'dynamic_redraw.js',
        	'search.js',
			'jquery.multi-select.js'
   			
    		

        ), 'allocation'
);
echo link_admin_module_css(
        array(
			'multi-select.css'
   			
    		

        ), 'allocation'
);
?>
<script type="text/javascript">
    //load_pages();
	$('#pre-selected-options').multiSelect();
	
	$('#member_id').change(function(){
		
		//alert($(this).val());
		$.ajax({
				type: "POST",
				url: '<?php echo base_url('allocation/get_allocate_item');?>',
				//dataType: "json",
				data:{
					member_name: $(this).val()
				},
				success: function(response) {
					
					//alert(response);
					$('#select-multi-item').html('').html(response);
				   $('#pre-selected-options').multiSelect();
				},
				error: function(response) {
					console.log(response);
				}
		});
	});
</script>