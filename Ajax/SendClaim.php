<?php
session_start();
//Biz registered data dupplicate
$BizName = strtolower($_POST['BizName']);
$PhoneNum = $_POST['PhoneNumber'];
$PhoneNumber= substr($PhoneNum,0,3)."-".substr($PhoneNum,3,3)."-".substr($PhoneNum,6);


//claim form data
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$ContactPN = $_POST['ContactPN'];
$PersonalE = $_POST['PersonalEmail'];
$BusinessNumber = $_POST['BusinessNumber'];
$UBINumber = $_POST['UBINumber'];
$BusinessAddress = $_POST['BusinessAddress'];
$BusinessCity = $_POST['BusinessCity'];
$BusinessState = $_POST['BusinessState'];
$ZipCode = $_POST['ZipCode'];
$BusinessEmail = $_POST['BusinessEmail'];
$RegisteredON = $_POST['RegisteredON'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database")or die(mysql_error());
mysql_select_db("Bloc",$db) or die(mysql_error());

$db2 = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database")or die(mysql_error());
mysql_select_db("Adminka",$db2) or die(mysql_error());

$results = mysql_query("INSERT INTO Adminka.Claim_Requests SELECT * FROM Bloc.BizInfo WHERE Business_Name='$BizName' AND Phone_Number='$PhoneNumber'") or die(mysql_error());

mysql_query("INSERT INTO ClaimInfo (FirstName, LastName, ContactPN, PersonalEmail, BusinessNumber, UBINumber, BusinessAddress, BusinessCity, BusinessState, ZipCode, BusinessEmail, RegisteredON) VALUES('$FirstName', '$LastName', '$ContactPN', '$PersonalE', '$BusinessNumber', '$UBINumber', '$BusinessAddress', '$BusinessCity', '$BusinessState', '$ZipCode', '$BusinessEmail', '$RegisteredON')")or die(mysql_error());

$claimInfo=mysql_query("SELECT id FROM ClaimInfo WHERE LastName='$LastName' AND ContactPN='$ContactPN' AND PersonalEmail='$PersonalE' AND UBINumber='$UBINumber' AND BusinessEmail='$BusinessEmail'")or die(mysql_error());
$ClaimId = mysql_fetch_array($claimInfo)or die(mysql_error());

$Claim = $ClaimId['id'];
mysql_query("UPDATE Claim_Requests SET ClaimId='$Claim' WHERE ClaimId IS NULL")or die(mysql_error());


echo "We will verify your claim information.";

mysql_close($db);
mysql_close($db2);


?>