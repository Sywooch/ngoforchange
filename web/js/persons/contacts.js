((function($) {

    window.getTypeIcon = function(type) {
        var icon =  contactTypeIcons[type] || '';
        return '<img src="' + icon + '" alt="' + type + '" title="' + type + '" class="contact_type_icon" />';
    }

    window.getPerson = function(person) {
        if(!person)
            return 'No person is assigned';
        return person.first_name + ' ' + person.last_name;
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
                    id: "id",
                    fields: {
                        id: {
                            type: "string"
                        },
                        contact_type: {
                            type: "string"
                        },
                        contact_type_icon: {
                            type: "string"
                        },
                        contact_data: {
                            type: "string"
                        },
                        contact_data_2: {
                            type: "string"                        
                        },
                        person: {}
                    }
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
            pageSize: 20
        },
        editable: {
            mode: "popup",
            //template: kendo.template($("#popup_editor").html()),
            createAt: "bottom",
            confirmation: labels.grid_confirm_delete,
            confirmDelete: "Yes"
        },
        toolbar: [
            "create"
        ],
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
        group: [{field: "person"}],
        columns: [{
            command: [{
                name: "edit",
                text: labels.grid_button_edit
            }, {
                name: "destroy",
                text: labels.grid_button_destroy
            }],
            title: "&nbsp;",
            width: 120
        }, {
            field: "id",
            title: labels.grid_column_id,
            width: 50,
        }, {
            field: "contact_type_icon",
            title: "&nbsp;",
            filterable: false,
            width: 32,
            template: '#=window.getTypeIcon(contact_type)#'
        }, {
            field: "contact_type",
            title: labels.grid_column_data,
            width: 150,
        }, {
            field: "contact_data",
            title: labels.grid_column_data,
            width: 150
        }, {
            field: "contact_data_2",
            title: labels.grid_column_person,
            width: 250,
            template: '#=window.getPerson(person)#'
        }]
    });

})(jQuery))
