<?php 
$Email=$_POST['Email'];
$EmailLink = "http://localhost/Scripts/New_Password.php?Email=".$Email;

$db = mysql_connect ("localhost","Eugene","12345");
	mysql_select_db ("Bloc",$db);
	
	$results = mysql_query("SELECT * FROM users WHERE Email='$Email'",$db);
	$MyRow = mysql_fetch_assoc($results);
	
	if(!$MyRow=='TRUE'){echo "This User is not exist"; exit;}else{

$Password = $MyRow['Password'];
$FirstName = $MyRow['FirstName'];

		$headers = 'From: abc@yahoo.com' . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$subject = "Your Password";
		
$message1 = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>Email Confirmation</title>
</head>

<body>
<div style='border:2px solid #666; padding:50px'>
<h1 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Hello <span style='color:#F66;'>".$FirstName."</span></h4>
<h2 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Please click on link below to setup a new password:</h2><br><br>
<h3 style='#666'; text-align:center; font-family:'Gotham Rounded Book';><a style='#666'; text-align:center; font-family:'Gotham Rounded Book'; href='".$EmailLink."'>CLICK ME</a></h3><br><br>
<h4 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Best Regards</h4> 
</div>
</body>
</html>";
		mail($Email,$subject,$message1, $headers);
		echo "Please check your email."; exit;}
		
mysql_close($db);
?>