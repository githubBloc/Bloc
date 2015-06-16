<?php
$Login = $_POST['username'];
$Password = $_POST['password'];

if(!$Login==TRUE || !$Password==TRUE)
	{
	echo "You Forgot input Email or Password"; exit;
	}
	
	$db = mysql_connect ("localhost","Eugene","12345");
	mysql_select_db ("Bloc",$db);
	
	$results = mysql_query("SELECT * FROM users WHERE Email='$Login'",$db);
	$MyRow = mysql_fetch_assoc($results);
	if(!$MyRow==TRUE){echo "1"; exit;}
	
	$Salt = $MyRow['Salt'];
	$HashPass = $MyRow['Password'];
	$CheckActive = $MyRow['Activation'];
	
	if(crypt($Password,$Salt)!==$HashPass){echo "2"; exit;}
	if($CheckActive!=='1'){echo "3"; exit;}
	
	//start session
	
	session_start();
	$_SESSION['Email']=$MyRow['Email'];

mysql_close($db);
?>