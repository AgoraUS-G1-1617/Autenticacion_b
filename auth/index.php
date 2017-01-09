<?php
/** 
* @file
* \brief Inicio de la aplicación
* \details Pantalla de inicio de la aplicación. Añade cabeceras, muestra 
* los mensajes de error de logAttempt.php y define la estructura del layout.
* \author auth.agoraUS
*/
session_start();
include_once 'variables.php';

?>

<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" href="favicon.ico">
	
	<script type="text/javascript" src="style/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="style/bootstrap/js/bootstrap.mi.js"></script>
	<script type="text/javascript" src="style/bootstrap/js/npm.js"></script>
	<script type="text/javascript" src="style/bootstrap/js/index.js"></script>
	
	<!-- esto hace referencia a algo que no existe -->
	<script type="text/javascript" src="scripts/index.js"></script>
	
	<link rel="stylesheet" href="style/style.css" type="text/css">

	
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap-theme.css.map" type="text/css">
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.css.map" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
	


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo TITLE?></title>
</head>
<body>
	
	<div class="tituloInicio">¡Bienvenidos a agor@us!</div>
	
	<div class="principal">
	  <div class="col-md-4">
		<h1>Entrar con Redes Sociales</h1>
		<input  onClick="location.href = 'loginRedesSociales.php' "
                            id="loginFacebook" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	  </div>

	  <div class="col-md-4">
		<h1>Entrar sin DNIe</h1>
		<input  onClick="location.href = 'loginNotDNIe.php' "
                            id="loginNotDNIe" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	  </div>
	  
	  <div class="col-md-4">
		<h1>¿Aún no te has registrado?</h1>
		<input  onClick="location.href = 'register.php' "
                            id="register" 
                            type="button"
                            value ="Registrate" 
                           	class="btn btn-info"/>
	  </div>
	  <div class="col-md-4">
		<h1>Entrar con Twitter</h1>
		<input  onClick="location.href = 'twitter_login.php' "
                            id="twitter_login" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	  </div>

	</div>
	
	
</body>
</html>
