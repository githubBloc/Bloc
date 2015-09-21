<?php session_start();
if(isset($_SESSION['Email'])){
	$Email=trim($_SESSION['Email']);
	$localhost = "localhost";
	$Bloc = "Bloc";

	require_once('../DB/DB_connections.php');
	$bdd = new DB_connections($localhost, $Bloc, 'root', 'root');
	$query = 'SELECT FirstName, Activation FROM users WHERE Email =:parameter';
	$User = $bdd -> getOne($query, $Email);

	$FirstName = ($User['Activation']==1) ? $User['FirstName'] : NULL;	
}

?>