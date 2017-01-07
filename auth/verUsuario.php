<?php

include_once ('variables.php');
include_once ('database.php');

session_start();


if(!(isset($_SESSION["administradorCorrecto"]))){
	echo '<script language="javascript">
            window.location.href="index.php";
          </script>';
}



?>



<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
	
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
	

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Panel de Administracion</title>
</head>

<body>

	<div class="tituloInicio">Modificar Usuario</div>


<?php
	if(isset($_REQUEST['ID'])){
		$id = $_REQUEST['ID'];
		$i = getUserByID($id);


		$username = $i["USERNAME"];
		$name = $i["NAME"];
		$surname = $i["SURNAME"];
		$email = $i["EMAIL"];
		$genre = $i["GENRE"];
		$aut = $i["AUTONOMOUS_COMMUNITY"];
		$age = $i["AGE"];
		$rol = $i["ROLE"];


if($genre=="Masculino"){
	$seleccionMasculino="selected";
	$seleccionFemenino="";
}
else{
	$seleccionMasculino="";
	$seleccionFemenino="selected";
}

if($rol=="ADMIN"){
	$seleccionAdmin="selected";
	$seleccionUsuario="";
}
else{
	$seleccionAdmin="";
	$seleccionUsuario="selected";
}


}
else{
	echo '<script language="javascript">
            window.location.href="index.php";
          </script>';
}

?>


<form action="modificarUsuario.php">
			
							

	<div name="username" for="username" class="labelContacto">Usuario: </div>
	<input class="inputConfirmar" type="text" name="username" id="username" <?php echo'value="'.$username.'"'; ?>/>

	<div class="enLinea textoRojo" id="eUsername"></div><br>


	<div name="name" for="name" class="labelContacto">Nombre: </div>
	<input class="inputConfirmar" type="text" name="name" id="name" <?php echo'value="'.$name.'"'; ?>/>

	<div class="enLinea textoRojo" id="eApellidos"></div><br>


	<div name="surname" for="nif" class="labelContacto">Apellido: </div>
	<input class="inputConfirmar" type="text" name="apellido" id="apellido" <?php echo'
value="'.$surname.'"'; ?>/>

	<div class="enLinea textoRojo" id="eNif"></div><br>


	<div name="email" for="email" class="labelContacto">Email: </div>
	<input class="inputConfirmar" type="text" name="email" id="email" <?php echo'value="'.$email.'"'; ?>/>

	<div class="enLinea textoRojo" id="ePrincipal"></div><br>


	<div name="genre" for="genre" class="labelContacto">Sexo: </div>
	<select  type="text" name="genre" id="genre" list="genre" >
	
		<option value="Masculino" <?php echo $seleccionMasculino; ?>>Masculino</option>
		<option value="Femenino" <?php echo $seleccionFemenino; ?>>Femenino</option>
	</select>

	<div name="aut" for="aut" class="labelContacto">Comunidad Autonoma: </div>
	<input class="inputConfirmar" type="text" name="aut" id="aut" list="aut" <?php echo'value="'.$aut.'"'; ?>/>
	<datalist id="aut">
						<option value="Andalucia"></option>
                      	<option value="Murcia"></option>
                        <option value="Extremadura"></option>
                        <option value="Castilla la Mancha"></option>
                        <option value="Comunidad Valenciana"></option>
                        <option value="Madrid"></option>
                        <option value="Castilla y Leon"></option>
                        <option value="Aragon"></option>
                        <option value="Cataluña"></option>
                        <option value="La Rioja"></option>
                        <option value="Galicia"></option>
                        <option value="Asturias"></option>
                        <option value="Cantabria"></option>
                        <option value="Pais Vasco"></option>
                        <option value="Navarra"></option>
	</datalist>

	<div name="role" for="role" class="labelContacto">Rol: </div>
	<select  type="text" name="role" id="role" list="role" >
	
		<option value="ADMIN" <?php echo $seleccionAdmin; ?>>Administrador</option>
		<option value="USUARIO" <?php echo $seleccionUsuario; ?>>Usuario</option>
	</select>

	<div class="enLinea textoRojo" id="ePrincipal"></div><br>

<input class="botonEnviar" type="submit" value="Modificar"/>


</form>




</body>
</html>
