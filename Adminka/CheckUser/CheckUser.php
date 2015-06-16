<?php
$username = $_POST["Username"];
$password = $_POST["Password"];


$db = mysql_connect ("localhost","Eugene","12345");
mysql_select_db ("Adminka",$db);

$results = mysql_query("SELECT * FROM users WHERE Username='$username'");
$row = mysql_fetch_array($results);

$pass = $row['Password'];
$salt = $row["Salt"];

if(crypt($password,$salt)==$pass)
{
	header("Location: ../MainPage.php");
}
else{ echo "Your login or password is not correct";}

session_start();
$_SESSION['Admin'] = $username;

mysql_close($db);
?>