<?php

include_once ('variables.php');
include_once ('database.php');

session_start();


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

    <div class="tituloInicio">Panel de Administracion</div>


<?php 
if(!isset($_SESSION["administradorCorrecto"])){
    echo '<form onsubmit="" action="verificarAdministrador.php">                      
<div name="admin" for="admin" class="labelContacto">Administrador: </div>
<input class="inputFormulario" type="text" name="admin" id="admin"/>

<div name="pass" for="pass" class="labelContacto">Pass: </div>
<input class="inputFormulario" type="password" name="pass" id="pass"/>


<input class="botonEnviar" type="submit" value="Entrar"/>
            
                                

    </form>';

}else{
    if(isset($_SESSION["errorAdministrar"])){
        $error = $_SESSION["errorAdministrar"];
        unset($_SESSION["errorAdministrar"]);

        echo '
            <br><br>
            <div class="visible ancho textoCentro padding20 margenAbajo20 bordeError fondoErrorTransparente">'. $error . '</div>';

    }else if(isset($_SESSION["administradorCorrecto"])){

echo '<br><br><table class="ancho"><tr class="impar">
            <td>Usuario</td>
            <td>Email</td>
            <td>Genero</td>
            <td>Edad</td>
            <td>Comunidad Autonoma</td>
            <td>Rol</td>
           
        </tr>';
}
        


$usuarios = getAllUsers();


foreach($usuarios as $i){


//AQUI MOSTRAREMOS LOS DATOS DE LOS USUARIOS
echo '
<tr>
<td class="textoIzquierda lineaAbajoPeque">'. $i['USERNAME'] .'</td>
<td class="lineaAbajoPeque">'. $i['EMAIL'] .'</td>
<td class="lineaAbajoPeque">'. $i['GENRE'] .'</td>
<td class="lineaAbajoPeque">'. $i['AGE'] .'</td>
<td class="lineaAbajoPeque">'. $i['AUTONOMOUS_COMMUNITY'] .'</td>
<td class="lineaAbajoPeque">'. $i['ROLE'] .'</td>


<td>
<form method="post" action="verUsuario.php">
       <input id="ID" name="ID" type="hidden" value="'.$i['U_ID'].'"/> 
    
    
<input name="verUsuario" class="botonEnviar" type="submit" value="Ver Usuario"/>
</form>
</td>
</tr>

';}}
?>
