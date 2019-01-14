var origin =  window.location.protocol + '//' + window.location.hostname; 
if(origin === 'http://localhost') {
    var mainPath = origin + "/ramujee";
    var base_url = origin + "/ramujee/";
} else {
    var base_url = origin + "/";
    var mainPath = origin;
}

load_shop();


function get_area(obj){
var selected_city = 	$(obj).val();
  var postArray = {
        id:selected_city,
        
    };
    $.post('home/get_area', postArray, function(data){
            var json_data = $.parseJSON(data);
           if(json_data.status == 'success'){
                  $('.select_area').html('');
                  $('.select_area').html(json_data.html);
           }
           
     });

}
function submit_form(){
$("#myForm").submit();
	
}
function setName(field, name){
    nameFilter = "searchName__" + field;
    filterNameString = "#" + nameFilter;
    $(filterNameString).val(name);
    return true;
}

function load_shop(){
  $('.ajax_loaderdata').show();
 
  var field = "shop";
  var section = "admin";
    listSpecificParams = {
        section: section,
   
    };
    if (window.location.hash) {
  
        str = window.location.hash;
        str = str.substr(2);
        arr = str.split('&');
        var page = limit = sort = order = category = color = size = '';
    var postArray = {};
        for (i = 0; i < arr.length; i++) {
            queryString = arr[i];
            arr2 = queryString.split('=');
            if (arr2[0] === 'page') {
                page = arr2[1];
            } else if (arr2[0] === 'limit'){
        limit = arr2[1];
      } else if (arr2[0] === 'sort') {
        sort = arr2[1];
      } else if (arr2[0] === 'order') {
        order = arr2[1];
      } else if (arr2[0] === 'category') {
        category = arr2[1];
      }else if (arr2[0] === 'color') {
        color = arr2[1];
      }else if (arr2[0] === 'size') {
        size = arr2[1];
      }
         }
        postArray = {
          
     };
        buildDynamicList(field, postArray);
        reinitializeFilterBox(field);
    } else {
        postArray = {
            section: section,
     
        };
    
        buildDynamicList(field, postArray);
        reinitializeFilterBox(field);
    }


}
//for filter data.
 $(document).ready(function(){
	$('#search_key').keyup(function(){
		var shop_name =$('#search_key').val();
		var postArray = {
        name:shop_name,
        
    };
		$.post('get_shop_name', postArray, function(data){
            var json_data = $.parseJSON(data);
           if(json_data.status == 'success'){
			   //alert(json_data.html);
                  $('.list__shop').html('');
                  $('.list__shop').html(json_data.html);
           }
           
     });
	 
	});
	
	$('#sorting').change(function(){
		var popular = $('#sorting').val();
		var postArray={'popular': popular,};
		$.post('get_popular_shop', postArray, function(data){
			 var json_data = $.parseJSON(data);
				if(json_data.status == 'success'){
					//alert(json_data.html);
					$('.list__shop').html('');
					$('.list__shop').html(json_data.html);
				}
		});
	});
	
	$('.checkbox').click(function(){
		//alert();
		 var favorite = [];
            $.each($("input[name='checkbox[]']:checked"), function(){            
                favorite.push($(this).val());
            });
			
			var postArray = {'cat_id': favorite};
			//alert(favorite);
			  $.post('get_shop_cate_id', postArray, function(data){
				 var json_data  = $.parseJSON(data);
				if(json_data.status == 'success'){
					$('.list__shop').html('');
					$('.list__shop').html(json_data.html);
				} 
			});   
          
	}); 
	
});





