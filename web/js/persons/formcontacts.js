$(document).ready(function() {
    
    $('#conatct-form-list').kendoGrid({
    	dataSource: [
	        { productName: "Tea", category: "Beverages" },
	        { productName: "Coffee", category: "Beverages" },
	        { productName: "Ham", category: "Food" },
	        { productName: "Bread", category: "Food" }
    	],
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
        }, /*{
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
