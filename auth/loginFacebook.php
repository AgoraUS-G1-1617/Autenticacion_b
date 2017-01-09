<!DOCTYPE html>
<html>
<head>

    <link rel="shortcut icon" href="favicon.ico">

    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.mi.js"></script>
    <script type="text/javascript" src="bootstrap/js/npm.js"></script>
    <script type="text/javascript" src="bootstrap/js/index.js"></script>
    <script type="text/javascript" src="scripts/index.js"></script>
  
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css.map" type="text/css">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.css.map" type="text/css">
    
    <link rel="stylesheet" href="style/style.css" type="text/css">
    
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>

<div class="tituloInicio">Entra con Facebook</div>


<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
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

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '243693826062601',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,email,first_name,last_name,gender', function(response) {
      console.log('Successful login for: ' + response.name);
      
      document.getElementById('status').innerHTML =
		'<form name="myForm" action="registerFacebook.php" method="post">'+
		'<p class="textoNormal">¿Esta seguro de registrarse en nuestra aplicación ' + response.first_name +' ?</p>'+

		'<input type="hidden" name="nombre" value="' + response.first_name +'">'+
		'<input type="hidden" name="apellido" value="' + response.last_name +'">'+
		'<input type="hidden" name="email" value="' + response.email +'">'+
		'<input type="hidden" name="genero" value="' + response.gender +'"><br><br>'+
		'<input type="submit" value="Submit"  value="Confirmar" class="btn btn-info">'+
		'<\/form>';

    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<div class="centro">
  <div class="botonFacebook">

    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
    </fb:login-button>
  </div>

  <div id="status">
  </div>
</div>

</body>
</html>