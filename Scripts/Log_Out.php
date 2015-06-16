<?php
session_start();
$id = $_SESSION['id'];
unset($_SESSION['Email']);
unset($_SESSION['FirstName']);
setcookie("TestCookies", '0', time()-3600);
session_unset();
session_destroy();
header('Location: ../index.php');
?>