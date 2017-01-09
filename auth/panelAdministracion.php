<?php

include_once ('variables.php');
include_once ('database.php');

session_start();

if(isset($_SESSION["administradorCorrecto"]) && $_SESSION["administradorCorrecto"]==false){
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
    
    <?php 

    if(isset($_SESSION["administradorCorrecto"]) && $_SESSION["administradorCorrecto"]==true){
        echo'
    <input  onClick="location.href = \'logout.php\' "
                            id="PanelAdm"
                            type="button"
                            value ="Cerrar sesión" 
                            class="btn btn-info botonAdministracion"/>
                            ';
    }
    ?>

    <div class="tituloInicio">Panel de Administracion</div>


<?php 
if(!isset($_SESSION["administradorCorrecto"])){
    echo '<form onsubmit="" action="verificarAdministrador.php"> 
            

            <br><br><br><br>

        <label for="user" class="labelForm2"><i class="glyphicon glyphicon-user"></i></label>
        <input  type="text" id="admin" name="admin" class="inputForm2" title="Su nombre de usuario" placeholder="Nombre de usuario" />

        <br>
        
        <label for="pass" class="labelForm2"><i class="fa fa-lock"></i></label>
        <input type="password" id="pass" name="pass" title="Su contraseña" placeholder="Contraseña"  class="inputForm2"/>
       
        <br><br><br><br>
        
        <input type="submit" class="btn btn-info" value="Entrar">
                                

    </form>';

}else{
    if(isset($_SESSION["errorAdministrar"])){
        $error = $_SESSION["errorAdministrar"];
        unset($_SESSION["errorAdministrar"]);

        echo '
            <br><br>
            <div class="visible ancho textoCentro padding20 margenAbajo20 bordeError fondoErrorTransparente">'. $error . '</div>';

    }else if(isset($_SESSION["administradorCorrecto"])){

echo '<br><br>

    <table class="principal">
    <tr class="">
            <td class="tablaTitulo">Usuario</td>
            <td class="tablaTitulo">Email</td>
            <td class="tablaTitulo">Genero</td>
            <td class="tablaTitulo">Edad</td>
            <td class="tablaTitulo">Comunidad Autonoma</td>
            <td class="tablaTitulo">Rol</td>
            <td class="tablaTitulo"></td>
        </tr>';
}
        


$usuarios = getAllUsers();
$cont = 0;

foreach($usuarios as $i){
    $posicionLinea = "";

    $cont++;
    if($cont%2==0){
        $posicionLinea = "par";
    }else{
        $posicionLinea = "impar";
    }


    //AQUI MOSTRAREMOS LOS DATOS DE LOS USUARIOS
    echo '
    <tr class="'.$posicionLinea.'">
        <td class="textoIzquierda ">'. $i['USERNAME'] .'</td>
        <td class="">'. $i['EMAIL'] .'</td>
        <td class="">'. $i['GENRE'] .'</td>
        <td class="">'. $i['AGE'] .'</td>
        <td class="">'. $i['AUTONOMOUS_COMMUNITY'] .'</td>
        <td class="">'. $i['ROLE'] .'</td>


        <td>
            <form method="post" action="verUsuario.php">
                <input id="ID" name="ID" type="hidden" value="'.$i['U_ID'].'"/> 
                <input name="verUsuario" class="btn btn-info botonTabla" type="submit" value="Ver Usuario"/>
            </form>
        </td>
</tr>

';}}
?>
