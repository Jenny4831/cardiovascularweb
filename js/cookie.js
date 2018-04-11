var LOGIN_EXPIRY = 2;

// Sets cookies to indicate the logged in user and session authentication token
function setLoggedIn(userId, token) {
    setCookie("userId", userId, LOGIN_EXPIRY);
    setCookie("token", token, LOGIN_EXPIRY);
}

//Removes the userId and session token
function logout() {
    setCookie("userId", "", LOGIN_EXPIRY);
    setCookie("token", "", LOGIN_EXPIRY);
}

function setCookie(name, value, expiryDays) {
    var date = new Date();
    date.setTime(date.getTime() + (expiryDays*24*60*60*1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
}

function getCookie(name) {
    name += "=";
    var parts = document.cookie.split(';');
    for(var i = 0; i < parts.length; i++) {
        var pair = parts[i];
        while (pair.charAt(0) == ' ') {
            pair = pair.substring(1);
        }
        if (pair.indexOf(name) == 0) {
            return pair.substring(name.length, pair.length);
        }
    }
    return null;
}