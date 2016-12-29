<?php 


$registerFacebook["nombre"]=$_POST["nombre"];
$registerFacebook["email"]=$_POST["email"];
$registerFacebook["apellido"]=$_POST["apellido"];
$registerFacebook["genero"]=$_POST["genero"];

$_SESSION["registerFacebook"]=$registerFacebook;


?>