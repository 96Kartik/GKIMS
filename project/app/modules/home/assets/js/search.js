
function reinitializeFilterBox(field) {
	$('.ajax_loader').show();
    nameFilter = "nameSearch__" + field;
    filterNameString = "#" + nameFilter;
	
    resetFilter = "resetFilter__" + field;
    resetFilterString = '#' + resetFilter;  
	
	limitFilter = "limit__" + field;
    limitFilterString = '#' + limitFilter;
	
	sortingFilter = "sorting__" + field;
    sortingFilterString = '#' + sortingFilter;

	categoryFilter = "category__" + field;
	categoryFilterString = '.' + categoryFilter;
	
	sizeFilter = "size__" + field;
	sizeFilterString = '.' + sizeFilter;
	
	colorFilter = "color__" + field;
	colorFilterString = '.' + colorFilter;
   
	pagingObjString = ".paging__" + field;

    $(resetFilterString).click(function (e) {
       
    });
	
	$("body").delegate(pagingObjString + " a", "click", function(e){
		$('.ajax_loader').show();
		var id = $(this).attr('id');
		initializeLinks(id, e);
		e.preventDefault();
	});
	
	$("body").delegate(colorFilterString, "click", function(){
			$('.ajax_loader').show();
		var response = initilizeFilterCheckBox('color', colorFilterString);
		
		postArray = {
			color : response.SearchString
		};
		
		sortingFilter = initializeSorting(field);
		limitFilter = initializeLimit(field);
		
		var responseSize = initilizeFilterCheckBox('size', sizeFilterString);
		var responseCategory = initilizeFilterCheckBox('category', categoryFilterString);
		
		listSpecificParams['color'] = response.SearchString;
		
		if (variableDefined('listSpecificParams')) {
			$.each(listSpecificParams, function (key, value) {
				postArray[key] = value;
			});
		}
		
		hashUrl = 'page=' +  limitFilter.hash + sortingFilter.hash + responseCategory.hash + response.hash + responseSize.hash;

		window.location.hash = '!' + hashUrl;

		buildDynamicList(field, postArray);
	});
	
	$("body").delegate(sizeFilterString, "click", function(){
	$('.ajax_loader').show();
		var response = initilizeFilterCheckBox('size', sizeFilterString);
		
		postArray = {
			size : response.SearchString
		};
		
		sortingFilter = initializeSorting(field);
		limitFilter = initializeLimit(field);
		
		listSpecificParams['size'] = response.SearchString;
		
		var responseColor = initilizeFilterCheckBox('color',colorFilterString);
		var responseCategory = initilizeFilterCheckBox('category', categoryFilterString);
		
		if (variableDefined('listSpecificParams')) {
			$.each(listSpecificParams, function (key, value) {
				postArray[key] = value;
			});
		}
		
		hashUrl = 'page=' +  limitFilter.hash + sortingFilter.hash + responseCategory.hash + responseColor.hash + response.hash;

		window.location.hash = '!' + hashUrl;

		buildDynamicList(field, postArray);
	});
	
	$("body").delegate(categoryFilterString, "click", function(){
			$('.ajax_loader').show();
		var response = initilizeFilterCheckBox('category', categoryFilterString);
		
		postArray = {
			category : response.SearchString
		};
	
		sortingFilter = initializeSorting(field);
		limitFilter = initializeLimit(field);
		
		listSpecificParams['category'] = response.SearchString;
		
		var responseColor = initilizeFilterCheckBox('color',colorFilterString);
	
		var responseSize = initilizeFilterCheckBox('size', sizeFilterString);
		
		if (variableDefined('listSpecificParams')) {
			$.each(listSpecificParams, function (key, value) {
				postArray[key] = value;
			});
		}
		
		hashUrl = 'page=' +  limitFilter.hash + sortingFilter.hash + response.hash + responseColor.hash + responseSize.hash;

		window.location.hash = '!' + hashUrl;

		buildDynamicList(field, postArray);
	});
	
	$("body").delegate(sortingFilterString, "change", function(){
		$('.ajax_loader').show();
		sortingString = $(this).val();
		
		sortingArray = sortingString.split('__');
		
		postArray = {
			sort: sortingArray[0],
			order: sortingArray[1]
		};
		
		sortingFilter = initializeSorting(field);
		limitFilter = initializeLimit(field);
		var responseSize = initilizeFilterCheckBox('size', sizeFilterString);
		var responseCategory = initilizeFilterCheckBox('category', categoryFilterString);
		var responseColor = initilizeFilterCheckBox('color',colorFilterString);
		
		listSpecificParams['sort'] = sortingArray[0];
		listSpecificParams['order'] = sortingArray[1];
		
		if (variableDefined('listSpecificParams')) {
			$.each(listSpecificParams, function (key, value) {
				postArray[key] = value;
			});
		}
		
		hashUrl = 'page=' +  limitFilter.hash + sortingFilter.hash + responseCategory.hash + responseColor.hash + responseSize.hash;

		window.location.hash = '!' + hashUrl;

		buildDynamicList(field, postArray);
		
	});
	
	$("body").delegate(limitFilterString, "change", function(){
		$('.ajax_loader').show();
		limit = $(this).val();
		
		postArray = {
			limit: limit
		};
		
		limitFilter = initializeLimit(field);
		sortingFilter = initializeSorting(field);
		var responseSize = initilizeFilterCheckBox('size', sizeFilterString);
		var responseCategory = initilizeFilterCheckBox('category', categoryFilterString);
		var responseColor = initilizeFilterCheckBox('color',colorFilterString);
		
		listSpecificParams['limit'] = limit;
		
		if (variableDefined('listSpecificParams')) {
			$.each(listSpecificParams, function (key, value) {
				postArray[key] = value;
			});
		}
		
		hashUrl = 'page=' +  limitFilter.hash + sortingFilter.hash + responseCategory.hash + responseColor.hash + responseSize.hash;

		window.location.hash = '!' + hashUrl;

		buildDynamicList(field, postArray);
	});
}