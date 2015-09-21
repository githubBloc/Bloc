<?php
$Login = trim($_POST["username"]);
$Password = trim($_POST["password"]);
$localhost = 'localhost';
$Bloc = "Bloc";

if(!$Login==TRUE || !$Password==TRUE)
	{
	echo "You Forgot to Enter Email or Password"; exit;
	}
	
require_once("DB_connections.php"); 
$bdd = new DB_connections($localhost, $Bloc, 'root', 'root');
$User = $bdd->getOne('SELECT * FROM users WHERE Email=:parameter', $Login);  	
$bdd->disconnect();	

	if(!$User==TRUE){echo "1"; exit;}
	
	$Salt = $User['Salt'];
	$HashPass = $User['Password'];
	$CheckActive = $User['Activation'];
	
	if(crypt($Password,$Salt)!==$HashPass){echo "2"; exit;}
	if($CheckActive!=='1'){echo "3"; exit;}
	
	//start session
	
	session_start();
	$_SESSION['Email']=$User['Email'];


?>