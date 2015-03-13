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
            createAt: "bottom"
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
            field: "action",
            title: labels.grid_column_action,
            width: 50
        }, {
            field: "action_date",
            title: labels.grid_column_actdate,
            width: 100
        }, {
            field: "count",
            title: labels.grid_column_count,
            width: 100
        }, {
            field: "expiration_date",
            title: labels.grid_column_expdate,
            width: 100
        }, {
            field: "movement_reason",
            title: labels.grid_column_movreason,
            width: 150
        },/* {
            field: "medicines.name",
            title: labels.grid_column_medname,
            width: 120
        }, {
            field: "person.first_name",
            title: labels.grid_column_firstname,
            width: 150
        }, {
            field: "person.last_name",
            title: labels.grid_column_lastname,
            width: 150
        }*/]
    });

})(jQuery))
