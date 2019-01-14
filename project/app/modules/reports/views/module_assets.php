<?php
/*
 * To change this license header, choose License Headers in auditreport Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
echo link_admin_css(
                array('plugins/datatables/dataTables.bootstrap.css'
				));
echo link_admin_js(
                array(
                    'datatables/jquery.dataTables.min.js',
                    'datatables/dataTables.bootstrap.min.js'
                    
					
					)
					);


?>
 <script>
      $(function () {
        $("#example1").DataTable();
        $('#reservation').daterangepicker();
      });
	  
	   
	 $('#member_id').change(function(){
		
		//alert($(this).val());
		$.ajax({
				type: "POST",
				url: '<?php echo base_url('reports/itemAllocation');?>',
				//dataType: "json",
				data:{
					member_id: $(this).val()
				},
				success: function(response) {
					
					//alert(response);
					
					$('#allocationTableDiv').html('').html(response);
					$("#example1").DataTable();
				  
				},
				error: function(response) {
					console.log(response);
				}
		});
	});
		  
		  
		  
	
    </script>