
if (window.location.origin == "http://localhost") {
    var base_url = window.location.origin + "/ramujee/";
    var local_path = window.location.origin + "/admin/";
} else {
    var base_url = window.location.origin + "/admin/";
    var local_path = window.location.origin + "/";
}


function showCountry(){
	$('#save_link').hide();
	$('#input_add').show();
}
function CanCountry(){
	$('#save_link').show();
	$('#input_add').hide();
	  $('#country_add').val('');
}
function DeleteCity(id){
	var country =$('#country_id').val();
	var postData = {'id':id};
	 $.post(base_url + 'admin/DeleteCity', postData, function (data) {
        list_city_data(country);
      
    });

}
/* Delete Country */
function DeleteCountry(id){
	var postData = {'id':id };
	 $.post(base_url + 'admin/delete_country', postData, function (data) {
        location.reload();
      
    });

}
/* Edit Country */
function EditCountry(id){
	var value =$('#country_'+id).val();
	if(value==''){
		alert("Please Enter Country");
		return FALSE;

	}else{
	var postData = {'country': value,'id':id };
        $.post(base_url + 'admin/add_country', postData, function (data) {
        $('#display_'+id).text(data);
         $('#edit_'+id).show();
     $('#display_'+id).show();
    $('#save_'+id).hide();
    $('#input_'+id).hide();
         // location.reload();
    });
   }

}
/* Edit city */
function EditCity(id){
	var value =$('#country_'+id).val();
	if(value==''){
		alert("Please Enter City");
		return FALSE;

	}else{
	var postData = {'city': value,'id':id };
        $.post(base_url + 'admin/add_city', postData, function (data) {
        $('#display_'+id).text(data);
         $('#edit_'+id).show();
     $('#display_'+id).show();
    $('#save_'+id).hide();
    $('#input_'+id).hide();
         // location.reload();
    });
   }

}
/* Add city */
function addCity(id){

	if(id){
    	$('#edit_'+id).hide();
     	$('#display_'+id).hide();
    	$('#save_'+id).show();
    	$('#input_'+id).show();
	} else {
		var city = $('#city_add').val();
		var country_id = $('#country_id').val();
		if(city==''){
			alert("Please Enter city");
			return FALSE;
		} else {
			//alert(country_id);
			var postData = {'city': city,'country_id':country_id};
	        $.post(base_url + 'admin/add_city', postData, function (data) {
	         alert("Data Inserted Successfully");
	          $('#city_add').val('');
	          list_city_data(country_id);
	        });
	    }
	} 

}
/* Add Country */
function addCountry(id){

	if(id){
		
    $('#edit_'+id).hide();
     $('#display_'+id).hide();
    $('#save_'+id).show();
    $('#input_'+id).show();

	}else{
	var country = $('#country_add').val();
	if(country==''){
		alert("Please Enter Country");
		return FALSE;
	}
	else{
		var postData = {'country': country };
        $.post(base_url + 'admin/add_country', postData, function (data) {
         alert("Data Inserted Successfully");
          $('#country_add').val('');
          location.reload();
        });
    }
	} 

}
function list_city_data(id){
	var postData = {'id': id };
		$.post(base_url + 'admin/show_city', postData, function (data) {
          $('#city-show').html(data);
        });

}

function updateArea(id){
	var value =$('#country_'+id).val();
	if(value==''){
		alert("Please Enter area");
		return FALSE;

	}else{
	var postData = {'area': value,'id':id };
        $.post(base_url + 'admin/add_area', postData, function (data) {
        $('#display_'+id).text(data);
         $('#edit_'+id).show();
     $('#display_'+id).show();
    $('#save_'+id).hide();
    $('#input_'+id).hide();
        list_area_data(city_id);
    });
   }

}

function area1(){
	$('#save_link').show();
	$('#input_add').hide();
	  $('#country_add').val('');
}

function deleteArea(id){
	var area =$('#select_city').val();
	var postData = {'id':id};
	 $.post(base_url + 'admin/deletedArea', postData, function (data) {
        list_area_data(area);
      
    });

}

function addArea(id){

	if(id){
    	$('#edit_'+id).hide();
     	$('#display_'+id).hide();
    	$('#save_'+id).show();
    	$('#input_'+id).show();
	} else {
		var area = $('#area_add').val();
		var city_id = $('#city_id').val();
		if(area==''){
			alert("Please Enter area");
			//return FALSE;
		} else {
			var postData = {'area': area,'city_id':city_id};
	        $.post(base_url + 'admin/add_area', postData, function (data) {
	         alert("Data Inserted Successfully");
	          $('#city_add').val('');
	          list_area_data(city_id);

			  //location.reload();
	        });
	    }
	} 

}

function list_area_data(id){
	var postData = {'id': id};
	$.post(base_url + 'admin/show_area', postData, function(data){
		$('#area-show').html(data);
	});
}

$(document).ready(function(){
	$('#country').change(function(){
		var id =$(this).val();
		list_city_data(id);

	});
	
	$('#select_city').change(function(){
		var id = $(this).val();
		//alert(id); die;
		list_area_data(id);
	});


  $(function() {
		$("#change_pass").validate({
		errorElement: "label",
		rules: {
			old_password:{
					required:true,
					remote: '<?php echo base_url("admin/check_password");?>'
				   },
			password:{
					required:true,
					 //minlength: 8
				   },
		   confirmpassword:{
					required:true,
					equalTo: '#password'
				   },
		},
		messages: {
				 old_password:
						{
						required: "The Old Password is required.", 
						remote: "Old password not match.",
						},
				 password:
						{
						 required:"The  password field is required.",
						//minlength: "Your password must be at least 8 characters long"
						},
				 confirmpassword:
						{
						required:"The confirm password field is required.",
						equalTo: "Password not match with confirm password.",
						},
		},
		submitHandler: function(form) {
			form.submit();
		}
		});
	});

});
