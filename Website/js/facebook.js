﻿// David Guevara
// Facebook interface using javascript SDK


// This is called with the results from from FB.getLoginStatus()
function statusChangeCallback(response) { 
    if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();// call our test function after successfull login
    } else if (response.status === 'not_authorized') {
        // The person is logged into Facebook, but not your app.
        document.getElementById('status').innerHTML = 'Please log ' +
          'into this app.';
    } else {
        // The person is not logged into Facebook, so we're not sure if
        // they are logged into this app or not.
        document.getElementById('status').innerHTML = 'Please log ' +
          'into Facebook.';
    }
}
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '1089194857766910',
        status: true,
        oauth: true,
        cookie: true,  
        xfbml: true,  
        version: 'v2.4' 
    });
    
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });

};

// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));




// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
    //console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,first_name,last_name,email,gender', function (response) {
        //console.log('Successful login for: ' + response.name);        
        document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
    });
}