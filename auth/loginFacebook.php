<?php   

session_start();
require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => '1166797976702364', // Replace {app-id} with your app id
  'app_secret' => '21a7d98d0f739cef31c6dc5f43f37716',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://beta.authb.agoraus1.egc.duckdns.org/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>