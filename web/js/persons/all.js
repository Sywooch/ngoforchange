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

    window.typesToString = function (types) {
        var string = '';
        for(var i = 0; i < types.length; i++) {
            if(i != 0)
                string += ', ';
            string += types[i].name;
        }
        return string;
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
        },
        columns: [{
            command: [{
                name: "custom_edit",
                text: labels.grid_button_edit,
                //template: '<a class="k-button k-grid-edit" onclick="editPerson(this)" style="min-width: 16px;"><span class="k-icon k-edit"></span> ' +  + '</a>',
                imageClass: 'k-icon k-i-pencil',
                click: window.editPerson
            }, {
                name: "destroy",
                text: labels.grid_button_destroy
            }, {
                name: "custom",
                text: labels.grid_button_preview,
                click: window.showPreview
            }],
            title: "&nbsp;",
            width: 319
        }, {
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
            field: "types",
            title: labels.grid_column_types,
            width: 150,
            filterable: false,
            template: '#=window.typesToString(types)#'
        }, {
            field: "ssrn",
            title: labels.grid_column_ssrn,
            width: 150
        }, {
            field: "id_number",
            title: labels.grid_column_idnumber,
            width: 150
        }, {
            field: "father_name",
            title: labels.grid_column_fathername,
            width: 150
        }, {
            field: "address",
            title: labels.grid_column_address,
            width: 150
        }, {
            field: "post_code",
            title: labels.grid_column_post,
            width: 150
        }]
    });

})(jQuery))
