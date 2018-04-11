/**
 * Handles logging in/out, and retrieving/modifying the user in the database
 * This file should be loaded on all pages.
*/

var loginForm;
var loginFormFields;
var loginDialog;
var loginDialogText;

//Login and user items that have to be switched in the header
var loginItem;
var userItem;

var logoutButton;

//Information about the currently logged in user
var userData = { result:"failure" };

//On document loaded
$(document).ready(function() {
    loginItem = $("#login_item");
    userItem = $("#user_item");
    
    loadUserData();
    
    loginForm = $("#login_form");
    loginForm.submit(loginFormSubmit);
    
    loginFormFields = loginForm.children(".text-input");
    
    loginDialog = $("#login_dialog");
    loginDialog.dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
            }
        }
    });
    loginDialogText = loginDialog.children("p");
    
    logoutButton = $("#logout_button");
    logoutButton.click(logoutClick);
});

function updateHeader() {
    if (isLoggedIn()) {
        loginItem.hide();
        userItem.show();
    }
    else {
        loginItem.show();
        userItem.hide();
    }
}

function loginFormSubmit(event) {
    var error = validateLoginFields();
    
    //If there is a problem with the form fields
    if (error != "") {
        
        loginDialogText.text(error);
        loginDialog.dialog('option', 'title', 'Please try again');
        loginDialog.dialog("open");
        return false;
    }
    
    //Send the AJAX request
    $.ajax({
		url : "database/login.php",
		type : "POST",
		data : loginForm.serialize(),
		success : function(data) {
			var reply = JSON.parse(data);
			
			if (reply.result == "success") {
			    //Update the cookie with the user id and session token
                setLoggedIn(reply.userId, reply.token);
                
                //Remove the username/password from the login form
                loginFormFields.val("");

                loadUserData(reply.lastLogin);
			}
            else {
                loginDialogText.text("The username or password you entered was incorrect.");
                loginDialog.dialog('option', 'title', 'Please try again');
                loginDialog.dialog("open");
			}
		}
	});
    return false;
}

//Check for empty fields and return an error message
function validateLoginFields() {
    for (var i = 0; i < loginFormFields.length; i++) {
        if (loginFormFields[i].value.trim() == "") {
            return loginFormFields[i].name + " is empty";
        }
    }
    return "";
}

// Uses AJAX to load user data from the database, based on the user in the cookie
// If the last login date is supplied, this will be displayed after loading
function loadUserData(lastlogin)
{
    $.ajax({
		url : "database/load_user.php",
		type : "POST",
		data : "userId=" + getCookie("userId") + "&token=" + getCookie("token"),
		success : function(data) {
			userData = JSON.parse(data);
			updateHeader();
			
			//If a function is defined to update other elements, call it
			if (typeof updateFromDatabase === 'function') {
			    updateFromDatabase();
			}
			
			if (lastlogin) {
			    loginDialogText.text("Welcome back " + userData.firstname + "!\n" +
                    "Your last login was " + lastlogin + " (UTC)");
                loginDialog.dialog('option', 'title', 'Welcome');
                loginDialog.dialog("open");
			}
		}
	});
}

// Uses AJAX to update the user data in the database, based on the user in the cookie
// Optionally calls the desired function upon success
function updateUserData(success)
{
    if (!isLoggedIn()) {
        //Prevent destroying the data
        return;
    }
    
    userData.userId = getCookie("userId"); //Add login identification info
    userData.token = getCookie("token");
    $.ajax({
		url : "database/update_user.php",
		type : "POST",
		data : "userData=" + JSON.stringify(userData),
		success : function(data) {
			console.log(data);
			if (typeof success === "function") {
			    success(data == "success");
			}
		}
	});
}

//Returns whether there is a user currently logged in
function isLoggedIn() {
    return userData.result == "success";
}

function logoutClick(event) {
    $.ajax({
		url : "database/logout.php",
		type : "POST",
		data : "userId=" + getCookie("userId") + "&token=" + getCookie("token"),
		success : function(data) {
			console.log(data);
			
			logout(); //Removes cookies
            userData = { result:"failure" };
			
			updateHeader();
			
			//If a function is defined to update other elements, call it
			if (typeof updateFromDatabase === 'function') {
			    updateFromDatabase();
			}
		}
	});
}