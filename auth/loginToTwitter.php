<?php 
	include("EpiCurl.php");
	include('EpiOAuth.php');
	include('EpiTwitter.php');
	include('keyTwitter.php');
	$twitterObj = new EpiTwitter($consumer_key, $consumer_secret); 
	$authenticateUrl = $twitterObj->getAuthenticateUrl();

header('Location: '.$authenticateUrl.'');
?>