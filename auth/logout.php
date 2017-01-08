<?php

session_start();

if(isset($_SESSION["administradorCorrecto"])){
	unset($_SESSION["administradorCorrecto"]);
	Header("Location: index.php");
}else{
	Header("Location: index.php");
}

?>