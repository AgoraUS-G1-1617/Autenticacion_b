<?php 

session_start(); 

include("lib/EpiCurl.php"); 

include('lib/EpiOAuth.php'); 

include('lib/EpiTwitter.php'); 

include('keyTwitter.php'); 

if (isset($_GET['oauth_token'])) { 

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$twitterObj->setToken($_GET['oauth_token']); 

$token = $twitterObj->getAccessToken(); 

$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret); 

$userdata = $twitterObj->get_accountVerify_credentials(); 

$_SESSION["name"] = $userdata->screen_name; 

$_SESSION["image"] = $userdata->profile_image_url;} 

// agregar a base de datos 

//header("Location: loginTwitter.php"); 
print("name: ");
print($userdata->screen_name);

print("<h2>Verify credentials</h2>");
$creds = $twitterObj->get('/account/verify_credentials.json');
print_r($creds->response);

?>

