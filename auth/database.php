<?php
/** 
* @file
* \brief Métodos de operaciones en base de datos
* \author auth.agoraUS
*/

include_once "variables.php";

/**
* \brief Conexión BD
* \details Método de conexión a la base de datos.
* \return PDO
*/
function connect() {
    $con = new PDO(DB_HOST, DB_USER, DB_PASS);
    $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}

/**
* \brief Crear BD
* \details Montar la base de datos con la tabla de usuarios vacía.
*/
function setUp() {
    $con = connect();
    $stmt = $con->query('
        DROP TABLE IF EXISTS USERS;
        CREATE TABLE USERS (
        U_ID INT AUTO_INCREMENT,
        USERNAME VARCHAR(40) UNIQUE,
        PASSWORD VARCHAR(40),
        NAME VARCHAR(30) NOT NULL,
        SURNAME VARCHAR(30) NOT NULL,
        EMAIL VARCHAR(100) UNIQUE,
        GENRE ENUM("Femenino","Masculino") NOT NULL,
        AUTONOMOUS_COMMUNITY ENUM(  "Andalucia",
                                    "Murcia",
                                    "Extremadura",
                                    "Castilla la Mancha",
                                    "Comunidad Valenciana",
                                    "Madrid",
                                    "Castilla y Leon",
                                    "Aragon",
                                    "Cataluña",
                                    "La Rioja",
                                    "Galicia",
                                    "Asturias",
                                    "Cantabria",
                                    "Pais Vasco",
                                    "Navarra") NOT NULL,
        ROLE ENUM("USUARIO","ADMIN","CREADOR_VOTACIONES") NOT NULL DEFAULT "USUARIO",
        AGE TINYINT NOT NULL,
        PRIMARY KEY(U_ID)
        );
        ');
}

/**
* \brief Consultar usuario
* \details Consultar toda la información de un usuario en la base de
* datos buscando por su nombre de usuario.
* \param $user Nombre de usuario
* \return Usuario consultado.
*/
function getUser($user) {
    $con = connect();
    $stmt = $con->prepare("SELECT   USERNAME, 
                                    PASSWORD,
                                    NAME,
                                    SURNAME,
                                    EMAIL, 
                                    GENRE, 
                                    AUTONOMOUS_COMMUNITY, 
                                    AGE,
                                    ROLE
                                    FROM USERS WHERE USERNAME=:user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    return $stmt->fetch();
}

/**
* \brief Consultar usuario
* \details Consultar toda la información de un usuario en la base de
* datos buscando por su nombre de usuario.
* \param $user Nombre de usuario
* \return Usuario consultado.
*/
function getUserByID($id) {
    $con = connect();
    $stmt = $con->prepare("SELECT   U_ID,
                                    USERNAME, 
                                    PASSWORD,
                                    NAME,
                                    SURNAME,
                                    EMAIL, 
                                    GENRE, 
                                    AUTONOMOUS_COMMUNITY, 
                                    AGE,
                                    ROLE
                                    FROM USERS WHERE U_ID=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}
/**
* \brief Consultar email
*/
function getEmail($email) {
    $con = connect();
    $stmt = $con->prepare("SELECT EMAIL FROM USERS WHERE EMAIL=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();
}

/**
* \brief Consultar todos los usuarios
* \details Consultar todos los usuario de la base de datos
* \return Todos los usuarios
*/
function getAllUsers() {
    $con = connect();
    $stmt = $con->prepare("SELECT U_ID, USERNAME, PASSWORD, NAME, SURNAME, EMAIL, GENRE, AUTONOMOUS_COMMUNITY, AGE, ROLE FROM USERS");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAdministrators() {
    $con = connect();
    $stmt = $con->prepare("SELECT U_ID, USERNAME, PASSWORD, NAME, SURNAME, EMAIL, GENRE, AUTONOMOUS_COMMUNITY, AGE, ROLE FROM USERS where ROLE='ADMIN'");
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
* \brief Crear usuario
* \details Crear un usuario con todos sus campos e insertarlo en la base de datos.
* \param $username Nombre de usuario
* \param $password Contraseña
* \param $email Dirección de email
* \param $genre Género
* \param $age Edad
* \param $autonomous_community Comunidad autónoma
*/
function createUser($username, $password, $name, $surname, $email, $genre, $age, $autonomousCommunity, $role) {
    $con = connect();
    $stmt = $con->prepare("INSERT INTO USERS VALUES(null, 
                                                    :username, 
                                                    :password, 
                                                    :name,
                                                    :surname,
                                                    :email, 
                                                    :genre, 
                                                    :autonomousCommunity, 
                                                    :age,
                                                    :role)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':autonomousCommunity', $autonomousCommunity);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':role', $role);
    $stmt->execute();
}

function actualizarUsuario($inscripcion){
    $res=false;
    $con =connect();
    
    if (isset($_REQUEST["username"]) || isset($_REQUEST["name"]) || isset($_REQUEST["surname"]) || isset($_REQUEST["email"])
    || isset($_REQUEST["genre"]) || isset($_REQUEST["aut"])
   || isset($_REQUEST["role"])){
        
        $stmt = $conexion->prepare("UPDATE usuarios SET USERNAME=?,NAME=?,SURNAME=?,EMAIL=?,GENRE=?,AUTONOMOUS_COMMUNITY=?,
        ROLE=? WHERE U_ID=?");
        
        $stmt->bind_param('sssssssi', $USERNAME, $NAME, $SURNAME, $EMAIL, $GENRE, $AUTONOMOUS_COMMUNITY,
            $ROLE, $U_ID);

        $U_ID = $inscripcion['id'];
        $NAME = $inscripcion['name'];
        $SURNAME = $inscripcion['surname'];
        $EMAIL = $inscripcion['email'];
        $GENRE = $inscripcion['genre'];
        $ROLE = $inscripcion['role'];
        $AUTONOMOUS_COMMUNITY = $inscripcion['aut'];
    

        $stmt->execute();

        if($stmt){
            $res = true;
        }

        $stmt->close();
    }

    return $res;
}
