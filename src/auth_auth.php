<?php

require_once('auth_class.php');

$user = new User($db);

$user->cookie_login();

$auth = $user->getAuth();

$accountId = $user->getAccountId();

$accountName = $user->getAccountName();

$accountPic = $user->getAccountPic($accountId, $db);

?>