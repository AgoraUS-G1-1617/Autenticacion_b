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
	


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo TITLE?></title>
</head>
<body>
	
	<div class="tituloInicio">Selecciona dónde quieres acceder</div>
	
	<div class="row">
  <div class="col-md-4">
  	<div class="censo">
		<h1 class="tituloW">Censo</h1>
		<input  onClick="location.href = 'https://censos.agoraus1.egc.duckdns.org/' "
                            id="censoId" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	</div>
  </div>
  
  <div class="col-md-4">
  	<div class="cabina">
		<h1 class="tituloW">Cabina</h1>
		<input  onClick="location.href = 'https://cvotacion.agoraus1.egc.duckdns.org/' "
                            id="cabinaId"
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	</div>
  </div>
  
  <div class="col-md-4">
  	<div class="deliberaciones">
		<h1 class="tituloW">Deliberaciones</h1>
		<input  onClick="location.href = 'https://deliberaciones.agoraus1.egc.duckdns.org/' "
                            id="deliberacionesId" 
                            type="button"
                            value ="Entra" 
                           	class="btn btn-info"/>
	</div>
  </div>
</div>
	
	
</body>
</html>
