<?php
require_once '_config.php';

// ちゃんとlogin.phpからきたかどうか確認
if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
}

$line_keys = require('./line-app-keys.php');
$query=array(
    'grant_type'=>'authorization_code',
    'code'=>$_GET['code'],
    'redirect_uri'=>'http://localhost/login2/callback.php',
    'client_id'=>$line_keys['clientId'],
    'client_secret'=>$line_keys['clientSecret']
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://notify-bot.line.me/oauth/token');
$result = curl_exec($ch);
echo 'RETURN:'.$result;
curl_close($ch);

/*
// 認証コードからアクセストークンを取得
$token = $provider->getAccessToken('authorization_code', [
    'grant_type' =>['authorization_code'],
    'code' => $_GET['code']
]);
echo $token->getToken() .'\n';
echo 'Successfully callbacked!!'.'\n';
// トークン使って認可した情報を取得できる
$user = $provider->getResourceOwner($token);
echo '<pre>';
var_dump($user);
echo '</pre>';
*/