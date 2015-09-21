<?php
$localhost = 'localhost';

if(isset($_POST["email"])){

	$email=$_POST["email"];
	require_once("DB_connections.php"); 
	$bdd = new DB_connections($localhost, 'Bloc', 'root', 'root');
	$User = $bdd->getOne('SELECT id FROM users WHERE Email=:parameter', $email);  
	$bdd->disconnect();

	if($User['id']>0)
		{
		die("<p id='red_msg'>Username is exist already. Please re-enter a new email address.</p>");
		} 
			if ($email==null or $email=="") 
			{ die (" ");}
			
				
	else { die ("<p id='green_msg'>Username is available</p>");}
}

?>