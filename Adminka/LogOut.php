<?php
	session_start();
	unset($_SESSION['Admin']);
	setcookie("TestCookies", '0', time()-3600);
	session_unset();
	session_destroy();
	header('Location: index.php');
?>