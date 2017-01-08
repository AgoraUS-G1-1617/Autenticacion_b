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

    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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
		$password = $i["PASSWORD"];
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
	$seleccionCreador="";
}
else if($rol=="USUARIO"){
	$seleccionAdmin="";
	$seleccionUsuario="selected";
	$seleccionCreador="";
}else{
	$seleccionAdmin="";
	$seleccionUsuario="";
	$seleccionCreador="selected";
}


}
else{
	echo '<script language="javascript">
            window.location.href="index.php";
          </script>';
}

?>


<form action="modificarUsuario.php" class="styleForm">
			
<br>
<br>		

	 <label for="username" class="labelForm"> <i class="glyphicon glyphicon-user"></i> Nombre de usuario:</label>
	<input class="inputForm" type="text" name="username" id="username" <?php echo'value="'.$username.'"'; ?>/>

	<input class="inputForm" type="hidden" name="password" id="password" <?php echo'value="'.$password.'"'; ?>/>

	<div class="enLinea textoRojo" id="eUsername"></div>

	<label for="email" class="labelForm"><i class="glyphicon glyphicon-envelope"></i> Correo electrónico:</label>
	<input class="inputForm" type="text" name="email" id="email" <?php echo'value="'.$email.'"'; ?>/>

	<div class="enLinea textoRojo" id="ePrincipal"></div><br>


	<label for="name" class="labelForm">Nombre:</label>
	<input class="inputForm" type="text" name="name" id="name" <?php echo'value="'.$name.'"'; ?>/>

	<div class="enLinea textoRojo" id="eApellidos"></div>


	<label for="surname" class="labelForm">Apellidos:</label>
	<input class="inputForm" type="text" name="surname" id="surname" <?php echo'
value="'.$surname.'"'; ?>/>

	<div class="enLinea textoRojo" id="eNif"></div>


	


	<label for="genre" class="labelForm">Género:</label>
	<select  type="text" name="genre" id="genre" list="genre" class="inputForm">
	
		<option value="Masculino" <?php echo $seleccionMasculino; ?>>Masculino</option>
		<option value="Femenino" <?php echo $seleccionFemenino; ?>>Femenino</option>
	</select>

	<label for="age" class="labelForm">Edad: </label>
	<input class="inputForm" type="text" name="age" id="age" <?php echo'
value="'.$age.'"'; ?>/>

	<label for="autonomous_community" class="labelForm">Comunidad autónoma:</label>
	<input class="inputForm" type="text" name="aut" id="aut" list="aut" <?php echo'value="'.$aut.'"'; ?>/>
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
	
	<br><br>

	<label for="role" class="labelForm">Rol:</label>
	<select  type="text" name="role" id="role" list="role" class="inputForm" >
	
		<option value="ADMIN" <?php echo $seleccionAdmin; ?>>Administrador</option>
		<option value="USUARIO" <?php echo $seleccionUsuario; ?>>Usuario</option>
		<option value="CREADOR_VOTACIONES" <?php echo $seleccionCreador; ?>>Creador de votaciones</option>
	</select>

	<div class="enLinea textoRojo" id="ePrincipal"></div>
	
	<br><br>

	<div align="center">  
    	<input  type="submit" id="submit" value ="Modificar" class="btn btn-info" align="center"/>
 	</div> 


</form>




</body>
</html>
