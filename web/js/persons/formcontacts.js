$(document).ready(function() {
    
    window.getTypeIcon = function(type) {
        var icon =  contactTypeIcons[type] || '';
        return '<img src="' + icon + '" alt="' + type + '" title="' + type + '" class="contact_type_icon" />';
    }

    window.getPerson = function(person) {
        if(!person)
            return 'No person is assigned';
        return person.first_name + ' ' + person.last_name;
    }

    $('#conatct-form-list').kendoGrid({
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
                        }
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
            createAt: "bottom",
            confirmation: labels.grid_confirm_delete,
            confirmDelete: "Yes"
        },
        toolbar: [{
            name: "create",
            text: labels.newbutton
        }],
        groupable: false,
        sortable: true,
        resizable: true,
        scrollable: true,
        pageable: false,
        filterable: false,
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
            }],
            title: "&nbsp;",
            width: 319
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
        }
        /*{
            
            title: labels.grid_column_id,
            width: 50
        }, {
            field: "productName",
            title: labels.grid_column_fname,
            width: 150
        }, {
            field: "category",
            title: labels.grid_column_lname,
            width: 150
        }, *//*{
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
        }*/]
    });

});
