$(document).ready(function() {
    
	$("#persondatapatient-photo_file").kendoUpload({
		localization: {
			select: labels.photo_select,
        },
        select: function (event) {
		    var notAllowed = false;
		    $.each(event.files, function (index, value) {
		        if (value.extension !== '.jpg' &&
		        	value.extension !== '.png') {
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
	$("#persondatapatient-disability_proof_file").kendoUpload({
		localization: {
			select: labels.disability_select,
		}
	});
	$("#persondatapatient-application_form_file").kendoUpload({
		localization: {
			select: labels.application_select,
		}
	});
});
