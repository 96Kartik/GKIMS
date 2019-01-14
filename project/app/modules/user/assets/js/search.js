if (window.location.origin == "http://localhost") {
    var base_url = window.location.origin + "/empHourTracker/user/";
    var local_path = window.location.origin + "/empHourTracker/";
} else {
    var base_url = window.location.origin + "/user/";
    var local_path = window.location.origin + "/";
}

/*
 * Set product name value
 * @param (String) field, (String) name
 * @return (bool)
 */
function setName(field, name) {
    nameFilter = "nameSearch__" + field;
    filterNameString = "#" + nameFilter;
    $(filterNameString).val(name);
    return true;
}

/*
 * Initialize product name filter
 * @param {String} field
 * @returns {Object array}
 */
function initializeNameFilter(field) {
    nameFilter = "nameSearch__" + field;
    filterNameString = "#" + nameFilter;

    filterName = $(filterNameString).val();

    if (filterName !== '') {
        listSpecificParams['name'] = filterName;
        nameHash = '&name=' + filterName;
    } else {
        filterName = '';
        nameHash = '';
    }
    response = {
        filter: filterName,
        hash: nameHash,
        param: filterNameString
    };

    return response;
}

function update_status(id, field, status) {
    $("#loader").show();
    $.ajax({
        url: local_path + field + "/update_status",
        type: "GET",
        data: {"id": id, 'status' :status},
        success: function () {
            load_pages();
        }
    });
}

function initializeLinks(id, e) {
    arr = id.split('__');
    field = arr[1];
    page = arr[2];

    postArray = {
        page: page
    };

    hashUrl = '';

    nameFilter = initializeNameFilter(field);

    if (variableDefined('listSpecificParams')) {
        $.each(listSpecificParams, function (key, value) {
            postArray[key] = value;
        });
    }

    /*
     * Make a hash url for search 
     */

    hashUrl = 'page=' + page + nameFilter.hash;

    window.location.hash = '!' + hashUrl;

    /*
     * Build dynamic list 
     */
    buildDynamicList(field, postArray);
    e.preventDefault();
}

function reinitializeFilterBox(field) {

    nameFilter = "nameSearch__" + field;
    filterNameString = "#" + nameFilter;

    resetFilter = "resetFilter__" + field;
    resetFilterString = '#' + resetFilter;

    loaderString = "#loader";

    pagingObjString = '.list__' + field;
    
    $(resetFilterString).click(function (e) {

    });


    $('body').delegate(pagingObjString + ' .pagination a', 'click', function (e) {
        $(loaderString).show();
        var id = $(this).attr('id');
        initializeLinks(id, e);
    });

    $(filterNameString).typing({
        start: function (event, $elem) {
            $(loaderString).show();
        },
        stop: function (event, $elem) {
            name = $elem.val();

            postArray = {
                name: name
            };

            nameFilter = initializeNameFilter(field);

            listSpecificParams['name'] = name;

            if (variableDefined('listSpecificParams')) {
                $.each(listSpecificParams, function (key, value) {
                    postArray[key] = value;
                });
            }

            hashUrl = 'page=' + nameFilter.hash;

            window.location.hash = '!' + hashUrl;

            buildDynamicList(field, postArray);
        }
    });
}

function load_pages() {
    var field = "user";
    var loderString = "#loader";
    $(loderString).show();
    var section = 'admin';

    listSpecificParams = {
        section: section
    };

    if (window.location.hash) {
        str = window.location.hash;
        str = str.substr(2);
        arr = str.split('&');
        var page = name = '';
        var postArray = {};
        for (i = 0; i < arr.length; i++) {
            queryString = arr[i];
            arr2 = queryString.split('=');
            if (arr2[0] === 'page') {
                page = arr2[1];
            } else if (arr2[0] === 'name') {
                name = arr2[1];
            }
        }
        setName(field, name);
        postArray = {
            page: page,
            name: name,
            section: section
        };
        buildDynamicList(field, postArray);
        reinitializeFilterBox(field);
    } else {
        postArray = {
            section: section
        };
        buildDynamicList(field, postArray);
        reinitializeFilterBox(field);
    }
}
