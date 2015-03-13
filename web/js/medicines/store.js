((function($) {

    function detailInit(e) {
        var detailRow = e.detailRow;
        detailRow.find(".medicine_moves").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: links.grid_details_read,
                        type: "GET",
                        dataType: "json",
                        data: {
                            'medicine_id': e.data.medicines_id,
                            'expiration_date': e.data.expiration_date
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
                    errors: function(response) {
                        if (response.error == '1')
                            return response.body;
                    }
                },
                error: function(e) {
                    console.log(e.errors); // displays "Invalid query"
                },
            },
            scrollable: true,
            sortable: true,
            resizable: true,
            columns: [{
                field: "id",
                title: labels.grid_details_id,
                width: 25
            }, {
                field: "action",
                title: labels.grid_details_action,
                width: 25
            }, {
                field: "action_date",
                title: labels.grid_details_actdate,
                width: 35
            }, {
                field: "count",
                title: labels.grid_details_count,
                width: 30
            }, {
                field: "person.first_name",
                title: labels.grid_details_fname,
                width: 50
            }, {
                field: "person.last_name",
                title: labels.grid_details_lname,
                width: 50
            }, {
                field: "movement_reason",
                title: labels.grid_details_movreason,
                width: 100
            }]
        });
    }

    $("#mainGrid").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: links.grid_read,
                    type: "GET",
                    dataType: "json"
                }
            },
            schema: {
                model: {
                    id: "medicine_id"
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
        detailTemplate: kendo.template($("#detailTemplate").html()),
        detailInit: detailInit,
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
            field: "medicines.id",
            title: labels.grid_column_id,
            filterable: false,
            width: 50
        }, {
            field: "medicines.name",
            title: labels.grid_column_name,
            width: 150
        }, {
            field: "medicines.unit_type",
            title: labels.grid_column_unit,
            width: 70
        }, {
            field: "medicines.details",
            title: labels.grid_column_details,
            width: 150
        }, {
            field: "expiration_date",
            title: labels.grid_column_expdate,
            filterable: {
                ui: "datetimepicker"
            },
            width: 100
        }, {
            field: "count_stock",
            title: labels.grid_column_count,
            width: 100
        }]
    });

    function notifs_format(items) {
        var html = '';
        html += labels.notifs_message + ' - ';
        for (var i in items) {
            html +=
                '' + (items[i].medicines ? items[i].medicines.name : '') +
                ' (' + labels.notifs_message_expiration +
                ' ' + items[i].expiration_date + '), ';
        }
        return html;
    }

    function notifs_success(response) {
        var data = response.body,
            alerts = data.alerts,
            warns = data.warns,
            alertMsg = notifs_format(alerts),
            warnMsg = notifs_format(warns);

        if (alerts.length > 0) {
            $('#alertExpire .msg').text(alertMsg);
            $('#alertExpire').removeClass('hide');
        }
        if (warns.length > 0) {
            $('#warnExpire .msg').text(warnMsg);
            $('#warnExpire').removeClass('hide');
        }
    }

    function notifs_error(xhr, ajaxOptions, thrownError) {
        alert("Failed to get notifications!!!");
    }

    $.ajax({
        type: "GET",
        url: links.notifs_read,
        dataType: 'json',
        success: notifs_success,
        error: notifs_error
    });

})(jQuery))
