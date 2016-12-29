<?php
/** 
* @file
* \brief Registro en la aplicación
* \details Pantalla de registro en la aplicación. Añade cabeceras, muestra 
* los mensajes de error de action_register.php y define la estructura del layout.
* \author auth.agoraUS
*/


$clave_del_sitio = "6LfD6hcTAAAAAOLQVRMu_oJA4eCRIUxGj0tAo8HJ";
$clave_secreta = "6LfD6hcTAAAAALJdSU9xW9qZfDy0PkvcJLPs7HE4";



include_once("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="layout.css" />
   <script src="lib/jquery-2.1.1.min.js"></script>
   
   <script type="text/javascript" src="style/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="style/bootstrap/js/bootstrap.mi.js"></script>
	<script type="text/javascript" src="style/bootstrap/js/npm.js"></script>
	
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css.map" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.css.map" type="text/css">
	
	<link rel="stylesheet" href="style/style.css" type="text/css">
   
   <title><?php echo TITLE?></title>
   <script type="text/javascript">
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"
                ))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-z
                A-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function form_process(){
        var errores = false;
        $('#error').html("");
        if ($('#username').val() == undefined || $('#username').val() == "") {
            errores = true;
            $('#error').html($('#error').html() + "-Debe elegir un nombre de usuario<br>");
        } else if ($('#username').val().length < 5) {
            errores = true;
            $('#error').html($('#error').html() + 
            "-El nombre de usuario es demasiado corto (mínimo 5 caracteres)<br>");
        }
        if ($('#password').val() == undefined || $('#password').val() == "") {
            errores = true;
            $('#error').html($('#error').html() + "-Debe elegir una contraseña<br>");
        } else if ($('#password').val().length < 5) {
            errores = true;
            $('#error').html($('#error').html() + "-La contraseña es demasiado corta (mínimo 5 caracteres)<br>");
        } else if ( $('#r_password').val() == undefined ||
                    $('#r_password').val() == "" ||
                    $('#password').val() != $('#r_password').val()) {
            errores = true;
            $('#error').html($('#error').html() + "-Las contraseñas no coinciden<br>");
        }
        if ($('#email').val() == undefined || $('#email').val() == "") {
            errores = true;
            $('#error').html($('#error').html() + "-Debe indicar una dirección de correo electrónico.<br>");
        } else if (!validateEmail($('#email').val())) {
            errores = true;
            $('#error').html($('#error').html() + "-La dirección de correo electrónico no es válida<br>");
        }
        if ($('#genre').val() == undefined || $('#genre').val() == "" || $('#genre').val() == "default" ) {
            errores = true;
            $('#error').html($('#error').html() + "-Debe elegir un género<br>");
        }
        if ($('#age').val() == undefined || $('#age').val() == "") {
            errores = true;
            $('#error').html($('#error').html() + "-Debe elegir una edad<br>");
        } else if ($('#age').val() < 1) {
            error = true;
            $('#error').html($('#error').html() + "-La edad no es válida<br>");
        }
        if ($('#autonomous_community').val() == undefined ||
            $('#autonomous_community').val() == "" || 
            $('#autonomous_community').val() == "default" ){
            errores = true;
            $('#error').html($('#error').html() + "-Debe elegir una comunidad autónoma<br>");
        }
        return !errores;
    }



</script>
<?php
    if (!isset($_SESSION['registerForm'])) {
        $registerForm['username'] = "";
        $registerForm['password'] = "";
        $registerForm['email'] = "";
        $registerForm['age'] = "";
    } else {
        $registerForm = $_SESSION['registerForm'];
    }

    $_SESSION['registerForm'] = $registerForm;
    ?>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

   <script>
       //Facebook

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
      
      var details = response;
      var nombre = details.first_name
      var apellido = details.last_name;
      var email = details.email;
      var genero = details.gender;

    document.getElementById('username').value = nombre;
    document.getElementById('email').value = email;
    
    });
  }

   </script>
   <div class="tituloInicio">Formulario de Registro</div>
    

   <div id="error" class="errores">
        <br>
        <?php
            if (isset($_REQUEST['error'])) {
                $error = $_REQUEST['error'];
                if ($error % 2 != 0) {
                    echo "Error al insertar en la base de datos.<br>";
                    $error--;
                }
                if ($error >= 23768) {
                    echo "La edad no es válida.<br>";
                    $error -= 23768;
                }
                if ($error >= 16384) {
                    echo "Debe introducir una edad.<br>";
                    $error -= 16384;
                }
                if ($error >= 8192) {
                    echo "La comunidad autónoma no es válida.<br>";
                    $error -= 8192;
                }
                if ($error >= 4096) {
                    echo "Debe elegir una comunidad autónoma.<br>";
                    $error-=4096;
                }
                if ($error >= 2048) {
                    echo "El género no es válido.<br>";
                    $error -= 2048;
                }
                if ($error >= 1024) {
                    echo "Debe elegir un género.<br>";
                    $error -= 1024;
                }
                if ($error >= 512) {
                    echo "El email ya está registrado.<br>";
                    $error -= 512;
                }
                if ($error >= 256) {
                    echo "La dirección de correo electrónico no es válida.<br>";
                    $error -= 256;
                }
                if ($error >= 128) {
                    echo "Debe indicar una dirección de correo electrónico.<br>";
                    $error -= 128;
                }
                if ($error >= 64) {
                    echo "Las contraseñas no coinciden.<br>";
                    $error -= 64;
                }
                if ($error >= 32) {
                    echo "La contraseña es demasiado corta (mínimo 5 caracteres).<br>";
                    $error -= 32;
                }
                if ($error >= 16) {
                    echo "Debe elegir una contraseña.<br>";
                    $error -= 16;
                }
                if ($error >= 8) {
                    echo "Ese nombre de usuario ya existe.<br>";
                    $error -= 8;
                }
                if ($error >= 4) {
                    echo "El nombre de usuario es demasiado corto (mínimo 5 caracteres).<br>";
                    $error -= 4;
                }
                if ($error >= 2) {
                    echo "Debe elegir un nombre de usuario.<br>";
                    $error -= 2;
                }
            }
        ?>
        <br>
    </div>


    <div align="left">
    <form id="registerForm" onsubmit="return form_process()" method="POST" action="action_register.php" class="styleForm">
<br>
<br>

                <label for="username" class="labelForm"> <i class="glyphicon glyphicon-user"></i> Nombre de usuario:</label>
                <input  type="text" id="username" name="username" class="inputForm" value=<?php echo htmlentities($registerForm['username']) ?>>
  			
                <br>

  				<label for="email" class="labelForm"><i class="glyphicon glyphicon-envelope"></i> Correo electrónico:</label>
                <input  type="text" id="email" name="email" class="inputForm" value=<?php echo htmlentities($registerForm['email']) ?>>
  			
<br />
<br />
                
                <label for="password" class="labelForm"> <i class="fa fa-lock"></i> Contraseña:</label>
                <input  type="password" id="password" name="password" class="inputForm" />
                
                <br>

                <label for="r_password" class="labelForm"> <i class="fa fa-lock"></i> Repetir Contraseña:</label>
                <input  type="password" id="r_password" name="r_password" class="inputForm" />
                
<br />
<br />

				<label for="genre" class="labelForm">Género:</label>
                    <select id="genre" name="genre" class="inputForm">
                        <option value="default">----------</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>  

                    <br>              
                    
                    <label for="age" class="labelForm">Edad: </label>
                    <input  type="number" 
                            id="age" 
                            name="age" 
                            min="1" 
                            class="inputForm" 
                            value=<?php echo htmlentities($registerForm['age'])?>>
                            
                    <br>

                    <label for="autonomous_community" class="labelForm">Comunidad autónoma:</label>
                    <select name="autonomous_community" id="autonomous_community" class="inputForm"> 
                        <option value="default" selected="true">----------</option>
                        <option value="Andalucia">Andalucia</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Extremadura">Extremadura</option>
                        <option value="Castilla la Mancha">Castilla la Mancha</option>
                        <option value="Comunidad Valenciana">Comunidad Valenciana</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Castilla y Leon">Castilla y Leon</option>
                        <option value="Aragon">Aragon</option>
                        <option value="Cataluña">Cataluña</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Galicia">Galicia</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Pais Vasco">Pais Vasco</option>
                        <option value="Navarra">Navarra</option>
                    </select>

                    <input type="text" name="role" id="role" class="inputForm" value="USUARIO" hidden="true" />

<br>
<br>
<br>
                
                <div align="center">  
                	<input  type="submit" 
                            id="submit" 
                            value ="Enviar" 
                           	class="btn btn-info" align="center"/>
                </div> 
                 
                           	
		
    </form>
    </div>
    <br />
    <br />
    <div class="push"></div>
<div align="left">
    <div class="footer">
        <i class="glyphicon glyphicon-copyright-mark"></i><b>Copyright</b>
    </div>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
 </diV>

</body>
</html>