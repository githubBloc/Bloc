<?php	
$Email =  trim($_POST['Email']);  
$Password = trim($_POST['password']);
 
$Password = stripslashes($Password); $Password = htmlspecialchars($Password); $Password = trim($Password);
	
$Salt = '$2y$11$' . substr(md5($Email), 0, 22); 	
$HashPassword = crypt($Password,$Salt);

require_once("../DB/DB_connections.php"); 
$bdd = new DB_connections($localhost, 'Bloc', 'root', 'root');

$sql = "UPDATE `users`   
   		SET `Password` = :Password
 		WHERE `Email` = :Email";

$bdd->execute($sql, $Email, $HashPassword);
echo $bdd;

?>	