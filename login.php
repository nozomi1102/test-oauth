<?php
require_once '_config.php';
// GitHub�̔F�؉�ʂփ��_�C���N�g����URL�擾
$authUrl = $provider->getAuthorizationUrl([
	'scope'         => ['notify']
	]);
// CSRF�΍�̂��߂ɂ��܂̏�Ԃ����Ă���
$_SESSION['oauth2state'] = $provider->getState();
header('Location: '.$authUrl);
exit;