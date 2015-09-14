<?php
$username = $_POST["Username"];
$password = $_POST["Password"];


$db = mysql_connect ("localhost","Eugene","12345");
mysql_select_db ("Adminka",$db);

$results = mysql_query("SELECT * FROM users WHERE Username='$username'");
$row = mysql_fetch_array($results);

$pass = $row['Password'];
$salt = '$2y$11$' . substr(md5($username), 0, 22); 



if(crypt($password,$salt)==$pass)
{
	header("Location: ../MainPage.php");
	
	session_start();
    $_SESSION['Admin'] = $username;
}
else{ echo "Your login or password is not correct";}


mysql_close($db);
?>