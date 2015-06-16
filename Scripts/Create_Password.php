<?php	
$Email =  $_POST['Email'];  
$Password = $_POST['Password'];
 
   $Password = stripslashes($Password); $Password = htmlspecialchars($Password); $Password = trim($Password);
	
	$Salt = '$2y$11$' . substr(md5($Email), 0, 22); 	
	$HashPassword = crypt($Password,$Salt);

$db = mysql_connect ("localhost","Eugene","12345");
mysql_select_db ("Bloc",$db);

    $results = mysql_query("UPDATE users SET Password='$HashPassword' WHERE Email='$Email'")or die(mysql_error());
	
?>	