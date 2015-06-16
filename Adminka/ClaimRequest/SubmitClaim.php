<?php
//Varialbes
session_start();
$Id = $_POST['Id'];
$ClaimId= $_POST['ClaimId'];
$BizType=$_POST['BizType'];
$Email = $_POST['Email'];
$Business_Name= $_POST['Business_Name'];
$Phone_Number= $_POST['Phone_Number'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$State= $_POST['State'];
$Zip_Code = $_POST['Zip_Code'];
$Business_Email = $_POST['Business_Email'];
$Google_Plus_URL = $_POST['Google_Plus_URL'];
$Twitter_URL = $_POST['Twitter_URL'];
$Facebook_URL=$_POST['Facebook_URL'];
$Web_Address = $_POST['Web_Address'];
$Categories = $_POST['Categories'];
$Hours = $_POST['Hours'];
$Tags = $_POST['Tags'];
$Service_Cities = $_POST['Cities'];
$About_Company = $_POST['About_Company'];
$Payments = $_POST['Payments'];
$Features = $_POST['Features'];
$Latitude = $_POST['Latitude'];
$Longtitude = $_POST['Longtitude'];
$ClickTrueRate = $_POST['ClickTrueRate'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Bloc",$db)or die("Could not select a database");


$results = mysql_query("UPDATE BizInfo SET BizType='$BizType', Email='$Email', Business_Name='$Business_Name', Phone_Number='$Phone_Number', Address='$Address', City='$City', State='$State', Zip_Code='$Zip_Code', Business_Email='$Business_Email', Google_Plus_URL='$Google_Plus_URL', Twitter_URL='$Twitter_URL', Facebook_URL='$Facebook_URL', Web_Address='$Web_Address', Categories='$Categories', Hours='$Hours', Tags='$Tags', Service_Cities='$Service_Cities', About_Company='$About_Company', Payments='$Payments', Features='$Features', Latitude='$Latitude', Longtitude='$Longtitude', ClickTrueRate='$ClickTrueRate' WHERE id='$Id'") or die(mysql_error());


$db2 = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db2)or die("Could not select a database");

mysql_query("DELETE FROM Claim_Requests WHERE id='$Id' AND ClaimId='$ClaimId'")or die(mysql_error());


echo "<a href='MainPage.php'>Return back Home</a>";

mysql_close($db);
mysql_close($db2);
?>
