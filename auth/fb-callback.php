<?php

session_start();
require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
  'app_id' => '243693826062601', // Replace {app-id} with your app id
  'app_secret' => '084f0e9148fe6df7a71a67cb50523e56',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getCanvasHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

// Logged in
echo '<h3>Signed Request</h3>';
var_dump($helper->getSignedRequest());

echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());
?>