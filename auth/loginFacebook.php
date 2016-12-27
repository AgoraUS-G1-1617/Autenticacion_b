<?php   

session_start();
require_once "Facebook/autoload.php";
include_once "variables.php";

$fb = new Facebook\Facebook([
  'app_id' => FB_APP_ID, // 4 Replace {app-id} with your app id
  'app_secret' => FB_APP_SECRET,
  'default_graph_version' => FB_APP_VERSION,
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://beta.authb.agoraus1.egc.duckdns.org/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>