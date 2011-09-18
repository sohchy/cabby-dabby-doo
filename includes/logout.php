<?php
if(!$_SESSION) {
	session_start();
}

if(isset($_COOKIE["user_session_variable_cookie"])) {
	unset($_COOKIE["user_session_variable_cookie"]);
}
session_destroy();

echo 'loggedout';

?>