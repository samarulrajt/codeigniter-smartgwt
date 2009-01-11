<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
require_once(BASEPATH.'application/controllers/LoginService.php');

function isLogin($session) {
	$loginService = new LoginService();
	return $loginService->isSessionKeyValid($session);
}



?>