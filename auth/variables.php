<?php
/**
* @file
* \brief Variables del sistema
* \details Variables que se usarán en el subsistema: Título, tiempo de la cookie
*  y credenciales de conexión a la base de datos.
* \author auth.agoraUS
*/

    define("TITLE", "Agora@US");
    define("ONE_YEAR", 3600*24*365);

    //DATABASE
    
    //define("DB_HOST", "mysql:dbname=n260m_17280281_agoraus;host=sql210.260mb.net");
    //define("DB_USER", "n260m_17280281");
    //define("DB_PASS", "EGC1516");
    
    define("DB_HOST", "mysql:dbname=egcdb;host=localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");

    // Facebook

/**
*	'app_id' => '1166797976702360', // 4 Replace {app-id} with your app id
*	'app_secret' => '21a7d98d0f739cef31c6dc5f43f37716',
* 	'default_graph_version' => 'v2.8',
**/
    define("FB_APP_ID", "1166797976702364")
    define("FB_APP_SECRET", "21a7d98d0f739cef31c6dc5f43f37716")
    define("FB_APP_VERSION", "v2.8")