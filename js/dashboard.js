var welcomeElement;
var detailsElement;
var healthElement;

var detailsForm;
var formFields;
var errorLabel;

//On document loaded
$(document).ready(function() {
    welcomeElement = $("#welcome");
    detailsElement = $("#details");
    healthElement = $("#health");
    
    detailsForm = $("#details_form");
    detailsForm.submit(detailsSubmit);
    formFields = detailsForm.children(".text-input");
    errorLabel = $("#details_error");
});

function updateFromDatabase() {
    if (isLoggedIn()) {
        welcomeElement.text("Welcome " + userData.firstname);
        
        detailsElement.html(
            "<strong>First name</strong>: " + userData.firstname +
            "<br/><strong>Last name</strong>: " + userData.lastname +
            "<br/><strong>Gender</strong>: " + ((userData.gender == "t") ? "Male" : "Female" ) +
            "<br/><br/><strong>Username</strong>: " + userData.username +
            "<br/><strong>Email address</strong>: " + userData.email);
            
        healthElement.html(
            getBmiString() + "<br/>" +
            getCalorieString());
    }
    else {
        //Not logged in, redirect to the home page
        window.location.replace("index.php");
    }
}

function getBmiString() {
    //If required data is available
    if (userData.height && userData.weight) {
        var bmi = calcBmi(userData.height, userData.weight);
        return "Your BMI is " + bmi.toFixed(2);
    }
    else {
        return "You haven't calculated your BMI yet!"
    }
}

function getCalorieString() {
    //If required data is available
    if (userData.height && userData.weight && userData.age && userData.gender && userData.activity) {
        var bmr = calcBmr(userData.weight, userData.height, userData.age, (userData.gender == "t"));
        var cal = calcDailyCal(bmr, userData.activity, (userData.preferkilojoule == "f"))
        return "To maintain your weight, consume " + cal;
    }
    else {
        return "You haven't used the Calorie calculator yet!"
    }
}

function showUpdateDetails() {
    $("#update_details").show();
    $("#current_details").hide();
    
    detailsForm.children("input[name=firstName]").val(userData.firstname);
    detailsForm.children("input[name=lastName]").val(userData.lastname);
    detailsForm.children("input[name=email]").val(userData.email);
    if (userData.gender == "f") {
        $("#female_radio").attr("checked", true);
    }
    else {
        $("#male_radio").attr("checked", true);
    }
    errorLabel.text("");
}

function hideUpdateDetails() {
    $("#update_details").hide();
    $("#current_details").show();
}

function detailsSubmit() {
    var error = validateFields();
    
    //If there is a problem with the form fields
    if (error != "") {
        errorLabel.text(error);
        return false;
    }
    
    userData.firstname = detailsForm.children("input[name=firstName]").val();
    userData.lastname = detailsForm.children("input[name=lastName]").val();
    userData.email = detailsForm.children("input[name=email]").val();
    userData.gender = ($("#male_radio").is(":checked")) ? "t" : "f";
    
    updateUserData(function() {
        //Reload the user data once it is done
        loadUserData();
        hideUpdateDetails();
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