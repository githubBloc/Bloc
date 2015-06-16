<?php
//Varialbes
session_start();
$Id = $_POST['Id'];
$BizId = $_POST['BizId'];
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

$TempName = $BizType."+".$Email;

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Bloc",$db)or die("Could not select a database");

$search = mysql_query("SELECT id FROM BizInfo WHERE Business_Name='$Business_Name' AND Phone_Number='$Phone_Number'")or die(mysql_error());
$searchResults = mysql_fetch_array($search);

if($searchResults==null || $searchResults=="")
{
$results = mysql_query("INSERT INTO BizInfo (BizType, Email, Business_Name, Phone_Number, Address, City, State, Zip_Code, Business_Email, Google_Plus_URL, Twitter_URL, Facebook_URL, Web_Address, Categories, Hours, Tags, Service_Cities, About_Company, Payments, Features) VALUES('$BizType', '$Email', '$Business_Name', '$Phone_Number', '$Address', '$City', '$State', '$Zip_Code', '$Business_Email','$Google_Plus_URL', '$Twitter_URL', '$Facebook_URL', '$Web_Address', '$Categories', '$Hours', '$Tags', '$Service_Cities', '$About_Company', '$Payments', '$Features')") or die(mysql_error());
$LastId = mysql_insert_id();

$PicName = mysql_query("SELECT Name FROM FreePictures WHERE TempName='$TempName'")or die(mysql_error());
$PicName2 = mysql_fetch_array($PicName)or die(mysql_error());


$NewPath = "uploads/".$LastId."/".$PicName2['Name'];

//rename picture folder
$OldName = "../../uploads/".$BizType."+".$Email;
$NewName = "../../uploads/".$LastId;

rename($OldName, $NewName);

mysql_query("UPDATE FreePictures SET BizId='$LastId', LogoPic='$NewPath'")or die(mysql_error());
}
else
{
$results = mysql_query("UPDATE BizInfo SET BizType='$BizType', Email='$Email', Business_Name='$Business_Name', Phone_Number='$Phone_Number', Address='$Address', City='$City', State='$State', Zip_Code='$Zip_Code', Business_Email='$Business_Email', Google_Plus_URL='$Google_Plus_URL', Twitter_URL='$Twitter_URL', Facebook_URL='$Facebook_URL', Web_Address='$Web_Address', Categories='$Categories', Hours='$Hours', Tags='$Tags', Service_Cities='$Service_Cities', About_Company='$About_Company', Payments='$Payments', Features='$Features', Latitude='$Latitude', Longtitude='$Longtitude', ClickTrueRate='$ClickTrueRate' WHERE id='$BizId'") or die(mysql_error());
}

$db2 = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db2)or die("Could not select a database");

mysql_query("DELETE FROM Hold_Requests WHERE id='$Id'")or die(mysql_error());
mysql_query("DELETE FROM Comments WHERE Hold_Number='$Id'")or die(mysql_error());
mysql_query("DELETE FROM ClaimInfo WHERE id='$ClaimId'")or die(mysql_error());


echo "<a href='MainPage.php'>Return back Home</a>";

mysql_close($db);
mysql_close($db2);
?>
