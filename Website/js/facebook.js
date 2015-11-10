// David Guevara
// Facebook interface using javascript SDK


window.fbAsyncInit = function () {
    FB.init({
        appId: '1089194857766910',
        status: true,
        oauth: true,
        cookie: true,  
        xfbml: true,  
        version: 'v2.4' 
    });
};

// Load the SDK asynchronously
(function (doc) {
  var js;
  var id = 'facebook-jssdk';
  var ref = doc.getElementsByTagName('script')[0];
  if (doc.getElementById(id)) {
    return;
  }
  js = doc.createElement('script');
  js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));


function FacebookLogin() 
{

  FB.login(function (response) {
    if (response.authResponse){
        //code here
        window.location = 'Dashboard.php';
    }
      else
      {
           alert("Login attempt failed!");
      }
  } , { scope: 'public_profile,email' });

}
