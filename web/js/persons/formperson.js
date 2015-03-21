$(document).ready(function() {
    // create MultiSelect from select HTML element
    var required = $("#types")
	    .kendoMultiSelect({
	    	dataTextField: "name",
	  		dataValueField: "id",
	  		value: window.personTypesSelected
	    }).data("kendoMultiSelect");

});
