<?php   

session_start();
require_once "Facebook/autoload.php";
include_once "variables.php";

$fb = new Facebook\Facebook([
  'app_id' => '243693826062601', // Replace {app-id} with your app id
  'app_secret' => '084f0e9148fe6df7a71a67cb50523e56',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://beta.authb.agoraus1.egc.duckdns.org/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>