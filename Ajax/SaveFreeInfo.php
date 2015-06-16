<?php
//Varialbes
session_start();

$data = json_decode(stripslashes($_POST['form']), true);

$Email = strtolower($_SESSION['Email']);
$Business_Name= strtolower($data['14']['value']);
$PhoneNum = strtolower($data['15']['value']);
$Phone_Number= substr($PhoneNum,0,3)."-".substr($PhoneNum,3,3)."-".substr($PhoneNum,6);
$Address = $data['16']['value'];
$City = strtolower($data['17']['value']);
$State= $data['18']['value'];
$Zip_Code = $data['19']['value'];
$Business_Email = strtolower($data['20']['value']);

$Categories = $data['21']['value']." ".$data['22']['value'];
$BizType = "Free";
$Latitude = $_POST['Latitude'];
$Longtude = $_POST['Longtitude'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database")or die(mysql_error());
mysql_select_db("Adminka",$db) or die(mysql_error());


$results = mysql_query("INSERT INTO Business_Requests (BizType, Email, Business_Name, Phone_Number, Address, City, State, Zip_Code, Business_Email, Categories, Latitude, Longtitude) VALUES('$BizType', '$Email', '$Business_Name', '$Phone_Number', '$Address', '$City', '$State', '$Zip_Code', '$Business_Email', '$Categories' ,'$Latitude', '$Longtude')") or die(mysql_error());


include("../Blocks/FreeUploadPictures.php");

mysql_close($db);
?>