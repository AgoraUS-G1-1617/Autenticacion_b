<?php   

session_start();
require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => '614797408693423', // Replace {app-id} with your app id
  'app_secret' => '014de4ddef3ab38507d1380c349a09d0',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>