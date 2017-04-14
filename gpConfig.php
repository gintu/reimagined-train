<?php
session_start();

//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '948939943221-f1e8o6e43paiofg32k5kd256uuql805a.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'XKXbQLx_VUK8XgEIRoM6EC3O'; //Google client secret
$redirectURL = 'http://localhost/project/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
