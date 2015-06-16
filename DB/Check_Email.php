<?php

if(isset($_POST["email"]))
{
	include ("../DB/bd.php");
	$email=$_POST["email"];
	
	$results = mysql_query("SELECT id FROM users WHERE Email='$email'",$db);
	$email_exist=mysql_num_rows($results);
	
	if($email_exist)
		{
		die("<p id='red_msg'>Username is exist already. Please re-enter a new email address.</p>");
		} 
			if ($email==null or $email=="") 
			{ die (" ");}
			
				
	else { die ("<p id='green_msg'>Username is available</p>");}
}

mysql_close($db);
?>