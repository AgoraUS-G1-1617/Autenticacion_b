<?php
/**
* Facebook Access
* Author: evilnapsis
**/

session_start();

if(isset($_SESSION["fb_access_token"])){

require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => '614797408693423', // Replace {app-id} with your app id
  'app_secret' => '014de4ddef3ab38507d1380c349a09d0',
  'default_graph_version' => 'v2.8',
  ]);


$accessToken = $_SESSION['fb_access_token'] ;

if(isset($accessToken)){
$fb->setDefaultAccessToken($accessToken);

try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

echo 'Bienvenid@ ' . $userNode->getName();
echo " <a href='logout.php'>Salir</a>";
}

}else{
  header("Location: login.php");

}

?>