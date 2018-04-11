var registerForm;
var formFields;
var errorLabel;

//On document loaded
$(document).ready(function() {
    registerForm = $("#register_form");
    formFields = registerForm.children(".text-input");
    
    errorLabel = $("#register_error");
    
    registerForm.submit(formSubmit);
});

function formSubmit(event) {
    var error = validateFields();
    
    //If there is a problem with the form fields
    if (error != "") {
        errorLabel.text(error);
        return false;
    }
    
    //Send the AJAX request
    $.ajax({
		url : "database/register.php",
		type : "POST",
		data : registerForm.serialize(),
		success : function(data) {
			var reply = JSON.parse(data);
			
			if (reply.result == "username_taken") {
			    errorLabel.text("The username is taken");
			}
			else if (reply.result == "success") {
			    //Update the cookie with the user id and session token
                setLoggedIn(reply.userId, reply.token);
			    
			    //redirect to the user page
			    window.location.href = "user.php";
			}
            else {
			    errorLabel.text("Registration failed. Try again later.");
			}
		}
	});
    
    return false;
}

//Check for empty fields and return an error message
function validateFields() {
    for (var i = 0; i < formFields.length; i++) {
        if (formFields[i].value.trim() == "") {
            return formFields[i].placeholder + " is empty";
        }
    }
    return "";
}