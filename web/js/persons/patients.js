((function($) {

    window.showPreview = function (e) {
        e.preventDefault();
        var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
        location.href = links.person_preview + dataItem.id;
    }

    window.getAge = function (date) {
        var 
            now = moment(),
            past = moment(date),
            age = Math.abs(past.year() - now.year());
        return isNaN(age) ? labels.grid_message_na : age;
    }

    window.getYesNo = function (value) {
        if(typeof value == 'undefined' || value == null || value == '' || value == 0)
            return labels.grid_message_no;
        return labels.grid_message_yes;
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
            field: "id",
            title: labels.grid_column_id,
            width: 50,
            locked: true
        }, {
            field: "first_name",
            title: labels.grid_column_fname,
            width: 115,
            locked: true
        }, {
            field: "last_name",
            title: labels.grid_column_lname,
            width: 120,
            locked: true
        }, {
            command: [{
                name: "edit",
                text: labels.grid_button_edit
            }, {
                name: "custom",
                text: labels.grid_button_preview,
                click: window.showPreview
            }],
            title: "&nbsp;",
            width: 180,
        }, {
            field: "patient.photo",
            title: labels.grid_column_photo,
            width: 100,

        }, {
            field: "patient.mother_name",
            title: labels.grid_column_mother,
            width: 130
        }, {
            title: labels.grid_column_age,
            width: 50,
            template: '#=window.getAge(patient.birthday)#'
        }, {
            field: "patient.birthday",
            title: labels.grid_column_birthday,
            width: 120
        }, {
            field: "patient.marital_status",
            title: labels.grid_column_marital,
            width: 130
        }, {
            field: "patient.children",
            title: labels.grid_column_children,
            width: 100
        }, {
            field: "patient.profession",
            title: labels.grid_column_profession,
            width: 150
        }, {
            field: "patient.graduation",
            title: labels.grid_column_graduation,
            width: 150
        }, {
            field: "patient.occupation",
            title: labels.grid_column_occupation,
            width: 150
        }, {
            field: "patient.disability",
            title: labels.grid_column_disability,
            width: 150
        }, {
            field: "patient.disability_subsidy",
            title: labels.grid_column_subsidy,
            width: 150,
            template: '#=window.getYesNo(patient.disability_subsidy)#'
        }, {
            field: "patient.disability_proof",
            title: labels.grid_column_proof,
            width: 150
        }, {
            field: "patient.application_form",
            title: labels.grid_column_appform,
            width: 150
        }, {
            field: "patient.medication",
            title: labels.grid_column_medicattion,
            width: 150
        }, {
            field: "patient.doctor",
            title: labels.grid_column_doctor,
            width: 150
        }, {
            field: "patient.private_correspondence",
            title: labels.grid_column_private,
            width: 150,
            template: '#=window.getYesNo(patient.private_correspondence)#'
        }, {
            // registration age
            title: labels.grid_column_regage,
            width: 150,
            template: '#=window.getAge(patient.registered_since)#'
        }, {
            field: "patient.registered_since",
            title: labels.grid_column_regsince,
            width: 150
        }, {
            field: "patient.last_contact",
            title: labels.grid_column_lastcontact,
            width: 150
        }, {
            field: "patient.comments",
            title: labels.grid_column_comments,
            width: 150
        }, {
            field: "patient.sex",
            title: labels.grid_column_sex,
            width: 100
        }, ]
    });

})(jQuery))
