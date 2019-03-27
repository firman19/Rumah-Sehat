<?php
//Include Google client library 
include 'src/Google_Client.php';
include 'src/contrib/Google_Oauth2Service.php';
/*
 * Configuration and setup Google API
 */
$clientId = '765954637143-9cqac03a2ncthnueupkr8q2q42li26ki.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'Od32cGfx8i6ZRVvgf3ZlRbRr'; //Google client secret
$redirectURL = 'https://rumahsehatbeta.000webhostapp.com/index.php'; //Callback URL
//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>