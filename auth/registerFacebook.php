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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
   <?php  
    $name = $_POST['nombre'];
    $name = mysql_real_escape_string($name);

    $name = $_POST['apellido'];
    $name = mysql_real_escape_string($name);

    $email = $_POST['email'];
    $email  = mysql_real_escape_string($email);

    $gender = $_POST['genero'];
    $gender = mysql_real_escape_string($gender);

    print($name);
    print($apellido);
    print($email);
    print($gender);


?>
 </diV>
</body>
</html>