$(document).ready(function() {
    
	$("#persondatavolunteer-resume").kendoUpload({
		localization: {
			select: labels.resume_select,
        },
        select: function (event) {
		    var notAllowed = false;
		    $.each(event.files, function (index, value) {
		        if (value.extension !== '.pdf' &&
		        	value.extension !== '.doc' &&
		        	value.extension !== '.docx') {
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
});
