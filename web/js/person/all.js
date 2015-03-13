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

    $("#mainGrid").kendoGrid({
        dataSource: {
            transport: {
                create: {
                    url: links.grid_create,
                    type: "POST",
                    dataType: "json"
                },
                read: {
                    url: links.grid_read,
                    type: "GET",
                    dataType: "json"
                },
                update: {
                    url: links.grid_update,
                    type: "POST",
                    dataType: "json"
                },
                destroy: {
                    url: links.grid_destroy,
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
        toolbar: [{
            name: "create",
            text: labels.newbutton
        }],
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
            field: "name",
            title: labels.grid_column_name,
            width: 150
        }, {
            field: "unit_type",
            title: labels.grid_column_unit,
            width: 150
        }, {
            field: "details",
            title: labels.grid_column_details,
            width: 150
        }, {
            command: [{
                name: "edit",
                text: labels.edit
            }, {
                name: "destroy",
                text: labels.destroy
            }],
            title: "&nbsp;",
            width: 250
        }]
    });

})(jQuery))
