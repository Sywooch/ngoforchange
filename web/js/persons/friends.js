((function($) {

    window.showPreview = function (e) {
        e.preventDefault();
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        location.href = links.person_preview + dataItem.id;
    }

    window.editPerson = function (e) {
        e.preventDefault();
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        location.href = links.person_update + dataItem.id;
    }

    $("#mainGrid").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: links.person_read,
                    type: "GET",
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
        editable: false,
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
        columns: [{
            field: "id",
            title: labels.grid_column_id,
            width: 50
        }, {
            field: "first_name",
            title: labels.grid_column_fname,
            width: 150
        }, {
            field: "last_name",
            title: labels.grid_column_lname,
            width: 150
        }, {
            command: [{
                name: "edit",
                text: labels.grid_button_edit,
                click: window.editPerson
            }, {
                name: "custom",
                text: labels.grid_button_preview,
                click: window.showPreview
            }],
            title: "&nbsp;",
            width: 220
        }, {
            field: "friend.tax_registration_number",
            title: labels.grid_column_trn,
            width: 150
        }, {
            field: "friend.registered_since",
            title: labels.grid_column_regsince,
            width: 150
        }, {
            field: "friend.comments",
            title: labels.grid_column_comments,
            width: 150
        }]
    });

})(jQuery))
