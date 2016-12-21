<?php
/** 
* @file
* \brief Inicio de la aplicación
* \details Pantalla de inicio de la aplicación. Añade cabeceras, muestra 
* los mensajes de error de logAttempt.php y define la estructura del layout.
* \author auth.agoraUS
*/

include_once 'variables.php';

?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
	
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
	

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo TITLE?></title>
</head>
<body>
	
	<div class="tituloInicio">Selecciona dónde quieres acceder</div>
	
	<div class="row">
  <div class="col-md-4">
  	<div class="loginDNIe">
		<h1 class="tituloW">Censo</h1>
		<input  onClick="location.href = 'http://localhost:90/ADMCensus/' "
                            id="loginDNIe" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	</div>
  </div>
  
  <div class="col-md-4">
  	<div class="loginNotDNIe">
		<h1 class="tituloW">Cabina</h1>
		<input  onClick="location.href = 'http://localhost:90/Cabina/' "
                            id="loginNotDNIe" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	</div>
  </div>
  
  <div class="col-md-4">
  	<div class="register">
		<h1 class="tituloW">Deliberaciones</h1>
		<input  onClick="location.href = 'http://localhost:90/Deliberaciones/' "
                            id="register" 
                            type="button"
                            value ="Registrate" 
                           	class="btn btn-info"/>
	</div>
  </div>
</div>
	
	
</body>
</html>
