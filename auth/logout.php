<?php

session_start();

if(isset($_SESSION["administradorCorrecto"]) || isset($_SESSION["inicioSesionCorrecto"])){
	unset($_SESSION["administradorCorrecto"]);
	unset($_SESSION["inicioSesionCorrecto"]);

	Header("Location: index.php");
}else if(isset($_REQUEST["Cancelar"])){
	if(isset($_SESSION['registerForm'])){
		unset($_SESSION['registerForm']);
		Header("Location: index.php");
	}
}else{
	Header("Location: index.php");
}

?>