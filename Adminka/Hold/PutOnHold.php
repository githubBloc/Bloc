
<?php
//Varialbes
$Id = $_POST['Id'];
$ClaimId = $_POST['ClaimId'];
if($ClaimId==null || $ClaimId==""){$ClaimId=0;}else{$ClaimId = $_POST['ClaimId'];}

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

date_default_timezone_set("America/Los_Angeles");
$Date = date("Y/m/d");

$Comments= $_POST['Comments'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db)or die("Could not select a database");


$results = mysql_query("INSERT INTO Hold_Requests (BizType, Email, Business_Name, Phone_Number, Address, City, State, Zip_Code, Business_Email, Google_Plus_URL, Twitter_URL, Facebook_URL, Web_Address, Categories, Hours, Tags, Service_Cities, About_Company, Payments, Features, Latitude, Longtitude, ClickTrueRate, BizId, ClaimId) VALUES('$BizType', '$Email', '$Business_Name', '$Phone_Number', '$Address', '$City', '$State', '$Zip_Code', '$Business_Email','$Google_Plus_URL', '$Twitter_URL', '$Facebook_URL', '$Web_Address', '$Categories', '$Hours', '$Tags', '$Service_Cities', '$About_Company', '$Payments', '$Features', '$Latitude', '$Longtitude', '$ClickTrueRate', '$Id', '$ClaimId')") or die(mysql_error());
$insertedId = mysql_insert_id();

mysql_query("DELETE FROM Business_Requests WHERE id='$Id'")or die(mysql_error());
mysql_query("DELETE FROM Claim_Requests WHERE id='$Id'")or die(mysql_error());


if($Comments!=null || $Comments!=""){
mysql_query("INSERT INTO Comments (Hold_Number, Comments, Date) VALUES('$insertedId', '$Comments', '$Date')")or die(mysql_error());
}

echo "<a href='MainPage.php'>Return back Home</a>";

mysql_close($db);
?>
