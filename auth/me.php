<?php
/**
* Facebook Access
* Author: evilnapsis
**/

session_start();

if(isset($_SESSION["fb_access_token"])){

require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => FB_APP_ID, // 4 Replace {app-id} with your app id
  'app_secret' => FB_APP_SECRET,
  'default_graph_version' => FB_APP_VERSION,
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

echo 'Bienvenido ' . $userNode->getName();
echo " <a href='logout.php'>Salir</a>";
}

}else{
  header("Location: login.php");

}

?>