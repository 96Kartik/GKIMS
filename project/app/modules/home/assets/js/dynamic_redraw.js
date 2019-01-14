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

    formAction = '/home/ajax_list';

    list = "list__" + field;

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
    
        $('.ajax_loaderdata').hide();
        $('html, body').animate({ scrollTop: 0 }, 0);
            
    });
}
