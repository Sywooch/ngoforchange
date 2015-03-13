((function($) {

    function titleFilter(element) {
        element.kendoAutoComplete({
            dataSource: titles
        });
    }

    function cityFilter(element) {
        element.kendoDropDownList({
            dataSource: cities,
            optionLabel: "--Select Value--"
        });
    }

    window.Getvalue = function (value) {
        return value;
    }

    $("#mainGrid").kendoGrid({
        dataSource: {
            transport: {
                create: {
                    url: links.person_create,
                    type: "POST",
                    dataType: "json"
                },
                read: {
                    url: links.person_read,
                    type: "GET",
                    dataType: "json"
                },
                update: {
                    url: links.person_update,
                    type: "POST",
                    dataType: "json"
                },
                destroy: {
                    url: links.person_destroy,
                    type: "POST",
                    dataType: "json"
                },
                parameterMap: function(options, operation) {
                    if (operation !== "read" && options.models) {
                        return kendo.stringify(options.models);
                    }
                }
            },
            schema: {
                model: {
                    id: "id"
                },
                data: function(response) {
                    return response.body;
                },
                total: function(response) {
                    return response.body.length; // total is returned in the "total" field of the response
                },
                errors: function(response) {
                    if (response.error == '1')
                        return response.body;
                }
            },
            error: function(e) {
                console.log(e.errors); // displays "Invalid query"
            },
            batch: true,
            pageSize: 20
        },
        editable: {
            mode: "popup",
            createAt: "bottom",
            confirmation: labels.grid_confirm_delete,
            confirmDelete: "Yes"
        },
        groupable: true,
        sortable: true,
        resizable: true,
        scrollable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        filterable: {
            extra: false,
            operators: {
                string: {
                    startswith: "Starts with",
                    eq: "Is equal to",
                    neq: "Is not equal to"
                }
            }
        },
        columns: [{
            field: "id",
            title: labels.grid_column_id,
            width: 40
        }, {
            field: "first_name",
            title: labels.grid_column_fname,
            width: 150
        }, {
            field: "last_name",
            title: labels.grid_column_lname,
            width: 150
        }, {
            field: "type",
            title: labels.grid_column_types,
            width: 150,
            template: 'AAA #=window.Getvalue()#'
        }, {
            command: [{
                name: "edit",
                text: labels.grid_button_edit
            }, {
                name: "destroy",
                text: labels.grid_button_destroy
            }],
            title: "&nbsp;",
            width: 250
        }]
    });

})(jQuery))
