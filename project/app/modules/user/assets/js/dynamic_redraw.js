/*
 * remove the message
 * @PARAMS (HTML class of checkbox)
 * @return (Array of checked checkboxes)
 */
function messageRemove() {
    $('.alert-message').text('').removeClass('success').removeClass('error');
}
/*
 * get all the checked checkbox value
 * @PARAMS (HTML class of checkbox)
 * @return (Array of checked checkboxes)
 */
function getSelected(element) {
    var selectedValue = new Array();
    var inputElements = document.getElementsByClassName(element);
    for (var i = 0; inputElements[i]; ++i) {
        if (inputElements[i].checked) {
            selectedValue.push(inputElements[i].value);
        }
    }

    return selectedValue;
}

/*
 * Initialize Filter check box 
 * @param (string) fieldType
 * @return (objectArray) with search string and generated hash URL
 */
function initilizeFilterCheckBox(keyValue, searchObject) {
    searchArray = {};
    i = 0;
    $(searchObject).each(function () {
        if ($(this).is(":checked")) {
            searchArray[i++] = $(this).val();
        }
    });
    filterString = objArrayToString(searchArray);
    if (filterString !== '') {
        urlHash = '&' + keyValue +'=' + filterString;
    } else {
        urlHash = '';
    }
    response = {
        SearchString: filterString,
        hash: urlHash
    };

    return response;
}
/*
 * Convert an object array to default comma separated string
 * @param (object array) 
 * @return (string) with comma separated
 */
function objArrayToString(array) {
    arr = jQuery.map(array, function (n, i) {
        return (n.toUpperCase());
    });

    return arr.join();
}

/*
 * check all the checkbox visualized in list
 * @PARAMS ()
 * @RETURN (bool)
 */
function check_all() {

    if (document.getElementById('check_all').checked == true) {
        $(".id_array").prop("checked", "checked");
    } else {
        $(".id_array").removeAttr("checked");
    }
    return true;
}
/*
 * Get opertaion action
 * @PARAMS ()
 * @RETURN (operation according to server and local)
 */
function getOpertionAction() {
    var operationAction = '';

    var origin = window.location.protocol + '//' + window.location.hostname;
    if (origin === 'http://localhost') {
        operationAction = '/empHourTracker/admin/build_list';
    } else {
        operationAction = '/admin/build_list';
    }

    return operationAction;
}

/*
 * Multiple Delete operation perform
 * @PARAMS (operation HTML id, field)
 * @RETURN (perform action)
 */
function initilizeOpertion(attr_id, field) {
    var e = document.getElementById(attr_id);
    var operation = e.options[e.selectedIndex].value;
    if (operation != '') {
        var checkedValue = getSelected('id_array');
        if (checkedValue.length != 0) {
            var r = confirm('Are you sure you want to remove selected ' + field + '?');
            if (r == true) {
                $.ajax({
                    url: getOpertionAction(),
                    type: "POST",
                    data: {'checkedValue': checkedValue, 'field': field, 'action': operation},
                    success: function (data) {
                        var jsonData = $.parseJSON(data);
                        if (jsonData.status === 'success') {
                            $('#message_' + field).addClass('list-success').html(jsonData.message);
                        } else {
                            $('#message_' + field).addClass('list-error').html(jsonData.message);
                        }
                        params = {section: 'admin'};
                        buildDynamicList(field, params);
                    }
                });
            } else {
                return false;
            }
        } else {
            alert('Please select atleast one ' + field + '.');
            return false;
        }
    }
}
/*
 * Initialize limit filter
 * @param {String} field
 * @returns {Object array}
 */
function initializeLimit(field) {
    limitFilter = "limit__" + field;
    filterLimitString = "#" + limitFilter;

    filterLimit = $(filterLimitString).val();

    if (filterLimit !== '') {
        listSpecificParams['limit'] = filterLimit;
        limitHash = '&limit=' + filterLimit;
    } else {
        filterLimit = '';
        limitHash = '';
    }
    response = {
        filter: filterLimit,
        hash: limitHash,
        param: filterLimitString
    };

    return response;
}

/*
 * Initialize limit filter
 * @param {String} field
 * @returns {Object array}
 */
function initializeSorting(field) {
    sortingFilter = "sorting__" + field;
    filterSortingString = "#" + sortingFilter;

    filterSorting = $(filterSortingString).val();

    if (filterSorting !== '') {
        sortingArray = filterSorting.split('__');
        listSpecificParams['sort'] = sortingArray[0];
        listSpecificParams['order'] = sortingArray[1];
        sortingHash = '&sort=' + sortingArray[0] + '&order=' + sortingArray[1];
    } else {
        filterSorting = '';
        sortingHash = '';
    }
    response = {
        filter: filterSorting,
        hash: sortingHash,
        param: filterSortingString
    };

    return response;
}


function variableDefined(name) {

    return typeof this[name] !== 'undefined';
}

function initializeLinks(id, e) {
    arr = id.split('__');
    field = arr[1];
    page = arr[2];
    
    postArray = {
        page: page   
    };
 
    hashUrl = '';
    
    limitFilter = initializeLimit(field); 
    sortingFilter = initializeSorting(field);
    var responseSize = initilizeFilterCheckBox('size', sizeFilterString);
    var responseCategory = initilizeFilterCheckBox('category', categoryFilterString);
    var responseColor = initilizeFilterCheckBox('color',colorFilterString);
        
    if (variableDefined('listSpecificParams')) {
        $.each(listSpecificParams, function (key, value) {
            postArray[key] = value;
        });
    }

    /*
     * Make a hash url for search 
     */
    
     
    hashUrl = 'page=' + page + limitFilter.hash + sortingFilter.hash + responseCategory.hash + responseColor.hash + responseSize.hash;

    window.location.hash = '!' + hashUrl;

    /*
     * Build dynamic list 
     */
    buildDynamicList(field, postArray);
    e.preventDefault();
}

function buildDynamicList(field, extraParams) {

   
	var origin = window.location.protocol + '//' + window.location.hostname;

    if (origin === 'http://localhost') {
        formAction = '/empHourTracker/' + extraParams.section + '/build_list';
    } else {
        formAction = '/' + extraParams.section + '/build_list';
    }

    list = "list__" + field;
	 loaderString = '#loader';
    //pagingObjString = ".paging__" + field;
    
    listObjString = "." + list;
    
    postArray = {
        type: field
    };
    if (extraParams === null) {
        // Do Not do anything
    } else {
        $.each(extraParams, function (key, value) {
            postArray[key] = value;
        });
    }
    
    $.post(formAction, postArray, function(data) {
    
        $(listObjString).html(data);
		$(loaderString).hide();
        $('.ajax_loaderdata').hide();
        $('html, body').animate({ scrollTop: 0 }, 0);
            
    });
}
