<?php

session_start();
require_once("variables.php");
require_once("database.php");

if (isset($_REQUEST["username"]) || isset($_REQUEST["name"]) || isset($_REQUEST["surname"]) || 
    isset($_REQUEST["email"]) || isset($_REQUEST["genre"]) || isset($_REQUEST["age"]) || isset($_REQUEST["aut"]) || isset($_REQUEST["role"])){

  $formularioContacto["username"] = $_REQUEST["username"];
  $formularioContacto["password"] = $_REQUEST["password"];
  $formularioContacto["name"] = $_REQUEST["name"];
  $formularioContacto["surname"] = $_REQUEST["surname"];
  $formularioContacto["email"] = $_REQUEST["email"];
  $formularioContacto["genre"] = $_REQUEST["genre"];
  $formularioContacto["age"] = $_REQUEST["age"];
  $formularioContacto["aut"] = $_REQUEST["aut"];
  $formularioContacto["role"] = $_REQUEST["role"];

  $_SESSION["formularioContacto"]=$formularioContacto;
  $errores=validar($formularioContacto);

  // si hay errores vamos al formulario para corregirlos
  if (count($errores) > 0 ) {

    $_SESSION["erroresFormularioContacto"] = $errores;
    Header("Location: verUsuario.php");
  }


  //si no hay errores vamos a confirmar inscripcion
  else{

    $user = getUser($formularioContacto["username"]);
    

    //Si se ha inscrito correctamente
    $formularioContacto["id"] = $user["U_ID"];

    $modificado = actualizarUsuario($formularioContacto);


     //si se ha producido algun error fallo
      if($modificado==false){

        echo 'SE HA PRODUCIDO UN ERROR AL MODIFICAR AL INSCRITO. CONTACTE CON carcamcue@gmail.com';
      }

   
      unset($_SESSION["formularioContacto"]);

     echo '<script language="javascript">
              window.location.href="panelAdministracion.php";
            </script>';

    }

}else{
  echo '<script language="javascript">
         window.location.href="index.php";
         </script>';
}


function validar($formularioContacto) {
  $errores = null;

  if(empty($formularioContacto["surname"]) || !ereg("^[A-Za-záéíóúäëïöüÁÉÍÓÚÄËÏÖÜÑñ\ ]{3,50}$", $formularioContacto["surname"])){
    $errores[] = "<span class='fa fa-exclamation-circle' title='El apellido no puede contener carácteres especiales\nNo puede estar vacío\nNo puede superar los 50 carácteres'></span> Apellido inválido.<br>";
  }

    if(empty($formularioContacto["name"]) || !ereg("^[A-Za-záéíóúäëïöüÁÉÍÓÚÄËÏÖÜÑñ\ ]{3,50}$", $formularioContacto["name"])){
    $errores[] = "<span class='fa fa-exclamation-circle' title='El nombre no puede contener carácteres especiales\nNo puede estar vacío\nNo puede superar los 50 carácteres'></span> Nombre inválido.<br>";
  }

    if(empty($formularioContacto["username"]) || !ereg("^[A-Za-záéíóúäëïöüÁÉÍÓÚÄËÏÖÜÑñ\ ]{3,50}$", $formularioContacto["username"])){
    $errores[] = "<span class='fa fa-exclamation-circle' title='El nombre de usuario no puede contener carácteres especiales\nNo puede estar vacío\nNo puede superar los 50 carácteres'></span> Nombre de usuario inválido.<br>";
  }
  if(empty($formularioContacto["email"]) || !ereg("^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$", $formularioContacto["email"])){

    $errores[] = "<span class='fa fa-exclamation-circle' title='El email no puede estar vacío\nTiene que ser un email válido'></span> Email inválido.<br>";
  }
}
?>
