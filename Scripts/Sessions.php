<?php session_start();
if(isset($_SESSION['Email'])){
$Email=$_SESSION['Email'];
$db = mysql_connect ("localhost","Eugene","12345");
mysql_select_db ("Bloc",$db);
$results = mysql_query("SELECT FirstName FROM users WHERE Email = '$Email'", $db);
$myrow = mysql_fetch_array($results);
$FirstName = $myrow['FirstName'];}

?>