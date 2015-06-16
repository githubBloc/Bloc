<?php
//Varialbes
session_start();
$Email = strtolower($_SESSION['Email']);
$Business_Name= strtolower($_POST['Business_Name']);
$PhoneNum = strtolower($_POST['Phone_Number']);
$Phone_Number= substr($PhoneNum,0,3)."-".substr($PhoneNum,3,3)."-".substr($PhoneNum,6);
$Address = $_POST['Address'];
$City = strtolower($_POST['City']);
$State= $_POST['State'];
$Zip_Code = $_POST['Zip_Code'];
$Business_Email = strtolower($_POST['Business_Email']);
$Web_Address = strtolower($_POST['Web_Address']);
$Categories = $_POST['Categories']." ".$_POST['Sub_Categories']." ".$_POST['Categories2']." ".$_POST['Sub_Categories2'];
$Tags = $_POST['Tag1']." ".$_POST['Tag2'];
$About_Company = $_POST['About_Company'];
$Payments = $_POST['Cash'].$_POST['Check'].$_POST['Debit'].$_POST['Credit'].$_POST['Amex'].$_POST['Visa'].$_POST['Master_Card'].$_POST['Gift_Card'];
$Features = $_POST['Parking'].$_POST['Wi-Fi'].$_POST['Drive_Trhu'].$_POST['Delivery'];
$BizType = "Basic";

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database")or die(mysql_error());
mysql_select_db("Adminka",$db) or die(mysql_error());


$results = mysql_query("INSERT INTO Business_Requests (BizType, Email, Business_Name, Phone_Number, Address, City, State, Zip_Code, Business_Email, Web_Address, Categories, Hours, Tags, About_Company, Payments, Features) VALUES('$BizType', '$Email', '$Business_Name', '$Phone_Number', '$Address', '$City', '$State', '$Zip_Code', '$Business_Email', '$Web_Address', '$Categories', '$Hours', '$Tags', '$About_Company', '$Payments', '$Features')") or die(mysql_error());

//mysql_query("UPDATE users SET BasicBiz='1' WHERE Email='$Email'",$db)or die(mysql_error());

include("../Blocks/BasicUploadPictures.php");

mysql_close($db);
?>