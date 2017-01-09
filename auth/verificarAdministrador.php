<?php

require_once("panelAdministracion.php");
require_once("database.php");

if (isset($_REQUEST["pass"])){

    $pass = $_REQUEST["pass"];
    $admin = $_REQUEST["admin"];


  // si hay errores vamos al formulario para corregirlos
    if ($pass == "" || $pass == " " || $admin ==  "" || $admin == " ") {

      $_SESSION["errorAdministrar"] = "¡ERROR! Acceso no permitido";
      Header("Location: panelAdministracion.php");

    }else{

      $administradores = getAdministrators();

      foreach ($administradores as $administrador) {

        if($administrador["PASSWORD"]==md5($pass) && $administrador["USERNAME"]==$admin){

          $_SESSION["administradorCorrecto"] = "Correcto";
          Header("Location: panelAdministracion.php");
        }
      }
      if(!isset($_SESSION["administradorCorrecto"])){
         Header("Location: index.php");
      }

    }



  }else{
    Header("Location: panelAdministracion.php");
  }



  ?>