<?php 
	include("EpiCurl.php");
	include('EpiOAuth.php');
	include('EpiTwitter.php');
	include('keyTwitter.php');
	$twitterObj = new EpiTwitter($consumer_key, $consumer_secret); 
	$authenticateUrl = $twitterObj->getAuthenticateUrl();

	$userdata = $twitterObj->get_accountVerify_credentials(); 

	print("Nombre: ". $userdata->screen_name); 

//header('Location: '.$authenticateUrl.'');
?>