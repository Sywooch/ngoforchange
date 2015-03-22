((function($) {

    window.getTypeIcon = function(type) {
        var icon = 'icon';
        return '<span>' + icon + '</span> ' + type;
    }

    $("#mainGrid").kendoGrid({
        dataSource: {
            transport: {
                create: {
                    url: links.contact_create,
                    type: "POST",
                    dataType: "json"
                },
                read: {
                    url: links.contact_read,
                    type: "GET",
                    dataType: "json"
                },
                update: {
                    url: links.contact_update,
                    type: "POST",
                    dataType: "json"
                },
                destroy: {
                    url: links.contact_destroy,
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
        /*toolbar: [
            "create"
        ],*/
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
        },
        //group: [{field: "id"}],
        columns: [{
            command: [{
                name: "edit",
                text: labels.grid_button_edit
            }, {
                name: "destroy",
                text: labels.grid_button_destroy
            }],
            title: "&nbsp;",
            width: 200
        }, {
            field: "id",
            title: labels.grid_column_id,
            width: 150,
        }, {
            field: "type",
            title: labels.grid_column_typeicon,
            width: 150,
            template: '#=window.getTypeIcon(type)#'
        }, {
            field: "data",
            title: labels.grid_column_data,
            width: 150
        }]
    });

})(jQuery))
