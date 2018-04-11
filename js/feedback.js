var feedbackForm;
var formFields;
var resultLabel;

//On document loaded
$(document).ready(function() {
    feedbackForm = $("#feedback_form");
    formFields = feedbackForm.children(".text-input");
    
    resultLabel = $("#feedback_result");
    
    feedbackForm.submit(formSubmit);
});

function formSubmit(event) {
    var error = validateFields();
    
    if (error != "") {
        resultLabel.addClass("error");
        resultLabel.html(error);
        return false;
    }
    
    //Send the AJAX request
    $.ajax({
		url : "database/add_feedback.php",
		type : "POST",
		data : feedbackForm.serialize(),
		success : function(data) {
		    if (data == "success") {
                resultLabel.removeClass("error");
                resultLabel.html("Your feedback has been recorded.");
		    }
			else {
                resultLabel.addClass("error");
                resultLabel.html("An error ocurred. Please try again.");
			}
		}
	});

    return false;
}

function validateFields() {
    for (var i = 0; i < formFields.length; i++) {
        if (formFields[i].value.trim() == "") {
            return formFields[i].placeholder + " is empty";
        }
    }
    return "";
}