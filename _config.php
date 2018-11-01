<?php
require_once "./vendor/autoload.php";
session_start();
$line_keys = require('./line-app-keys.php');
$provider = new League\OAuth2\Client\Provider\GenericProvider([
    'clientId'          => $line_keys['clientId'],
    'clientSecret'      => $line_keys['clientSecret'],
    'redirectUri'       => 'http://localhost/login2/callback.php',
    'urlAuthorize'      => 'https://notify-bot.line.me/oauth/authorize',
    'urlAccessToken'    => 'https://notify-bot.line.me/oauth/token',
    'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
    
]);

$title = "PHP Line notify Login Sample";