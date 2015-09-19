<?php

$username = trim($_POST["Username"]);
$password = trim($_POST["Password"]);
$localhost = 'localhost';
$Adminka = "Adminka";

require_once("../../DB/DB_connections.php"); 
$bdd = new DB_connections($localhost, $Adminka, 'root', 'root');

$User = $bdd->getOne('SELECT * FROM users WHERE Username=:parameter',$username);  

	$pass = $User['Password'];
	$salt = '$2y$11$' . substr(md5($username), 0, 22); 

	if(crypt($password,$salt)==$pass){

		header("Location: ../MainPage.php");
		session_start();
	    $_SESSION['Admin'] = $username;
    
    } else {

		echo "Your login or password is not correct";
	}

$bdd->disconnect();
?>