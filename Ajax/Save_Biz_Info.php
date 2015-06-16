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
$Google_Plus_URL = strtolower($_POST['Google_Plus_URL']);
$Twitter_URL = strtolower($_POST['Twitter_URL']);
$Facebook_URL=strtolower($_POST['Facebook_URL']);
$Web_Address = strtolower($_POST['Web_Address']);
$Categories = $_POST['Categories']." ".$_POST['Sub_Categories']." ".$_POST['Categories2']." ".$_POST['Sub_Categories2']." ".$_POST['Categories3']." ".$_POST['Sub_Categories3']." ".$_POST['Categories4']." ".$_POST['Sub_Categories4'];
$Hours = $_POST['Hours_Monday'].$_POST['Hours_Monday2'].$_POST['Hours_Tuesday'].$_POST['Hours_Tuesday'].$_POST['Hours_Wednesday'].$_POST['Hours_Wednesday2'].$_POST['Hours_Thursday'].$_POST['Hours_Thursday2'].$_POST['Hours_Friday'].$_POST['Hours_Friday2'].$_POST['Hours_Saturday'].$_POST['Hours_Saturday2'].$_POST['Hours_Sunday'].$_POST['Hours_Sunday2'];
$Tags = $_POST['Tag1']." ".$_POST['Tag2']." ".$_POST['Tag3']." ".$_POST['Tag4']." ".$_POST['Tag5']." ".$_POST['Tag6'];
$Service_Cities = $_POST['City1']." ".$_POST['City2']." ".$_POST['City3'];
$About_Company = $_POST['About_Company'];
$Payments = $_POST['Cash'].$_POST['Check'].$_POST['Debit'].$_POST['Credit'].$_POST['Amex'].$_POST['Visa'].$_POST['Master_Card'].$_POST['Gift_Card'];
$Features = $_POST['Parking'].$_POST['Wi-Fi'].$_POST['Drive_Trhu'].$_POST['Delivery'];
$BizType="Premium";

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db)or die("Could not select a database");


$results = mysql_query("INSERT INTO Business_Requests (BizType, Email, Business_Name, Phone_Number, Address, City, State, Zip_Code, Business_Email, Google_Plus_URL, Twitter_URL, Facebook_URL, Web_Address, Categories, Hours, Tags, Service_Cities, About_Company, Payments, Features) VALUES('$BizType', '$Email', '$Business_Name', '$Phone_Number', '$Address', '$City', '$State', '$Zip_Code', '$Business_Email','$Google_Plus_URL', '$Twitter_URL', '$Facebook_URL', '$Web_Address', '$Categories', '$Hours', '$Tags', '$Service_Cities', '$About_Company', '$Payments', '$Features')") or die(mysql_error());


include("../UploadPictures.php");

mysql_close($db);
?>
