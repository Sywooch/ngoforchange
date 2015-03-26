$(document).ready(function() {
    
	$("#persondatapatient-photo").kendoUpload({
		localization: {
			select: labels.photo_select,
        },
        select: function (event) {
		    var notAllowed = false;
		    $.each(event.files, function (index, value) {
		        if (value.extension !== '.csv') {
		            alert("not allowed!");
		            notAllowed = true;
		        }

		        console.log("Name: " + value.name);
		        console.log("Size: " + value.size + " bytes");
		        console.log("Extension: " + value.extension);
		    });
		    var breakPoint = 0;
		    if (notAllowed == true) event.preventDefault();
		}   
	});
	$("#persondatapatient-disability_proof").kendoUpload({
		localization: {
			select: labels.disability_select,
		}
	});
	$("#persondatapatient-application_form").kendoUpload({
		localization: {
			select: labels.application_select,
		}
	});
});
