<?php 
$FirstName = $_POST['First_Name'];
$LastName = $_POST['Last_Name']; 
$Email = $_POST['E_mail'];
$Password = $_POST['Password'];		
$FirstName = stripslashes($FirstName); $FirstName = htmlspecialchars($FirstName); $FirstName = trim($FirstName);
$LastName = stripslashes($LastName); $LastName = htmlspecialchars($LastName); $LastName = trim($LastName);
$Email = stripslashes($Email); $Email = htmlspecialchars($Email); $Email = trim($Email);
$Password = stripslashes($Password); $Password = htmlspecialchars($Password); $Password = trim($Password);
$Salt = '$2y$11$' . substr(md5($Email), 0, 22); 	
$HashPassword = crypt($Password,$Salt);

$Parameters = array(
	':FirstName' => $FirstName,
	':LastName' => $LastName,
	':Email' => $Email,
	':Password' => $HashPassword,
	':Salt' => $Salt
);

$Bloc = 'Bloc';
$localhost = 'localhost';

require_once('DB_connections.php');
$bdd = new DB_connections($localhost, $Bloc, 'root', 'root');
$sql = "INSERT INTO users SET FirstName = :FirstName, LastName=:LastName, Email=:Email, Password=:Password, Salt=:Salt";

$results = $bdd->execute($sql, $Parameters);

    if ($results == TRUE){ 
    	$query = "SELECT id FROM users WHERE Email =:parameter";
    	$User = $bdd->getOne($query, $Email);

		$activation = md5($User['id']).md5($Email);
		$bdd->disconnect();
		$headers = 'From: abc@yahoo.com' . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$subject = "Email Confirmation";
		$Link =  '<a style="color:#fff; font-size:18px; text-decoration:none;" href="http://localhost/DB/activation.php?Email='.$Email.'&code='.$activation.'">Confirm</a>';
			$message1 = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
			<html>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
			<title>Email Confirmation</title>
			</head>

			<body>
			<div style='border:2px solid #666; padding:50px'>
			<h1 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Hello <span style='color:#F66;'>".$FirstName."</span></h4><br>
			<h2 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Please click on button below:  <br><br><br> <span style='background-color:#F66; padding:15px;'>".$Link."</span></h3><br><br>
			<h4 style='color:#666; text-align:center; font-family:'Gotham Rounded Book';'>Best Regards</h4> 
			</div>
			</body>
			</html>";
		mail($Email,$subject,$message1, $headers);
		
    echo "Thank you $FirstName<br> Please check your $Email Email to confirm your reqistration and sign in.";
    } else {
    	echo "Error, sorry for that. Try again.";
    	}
?>