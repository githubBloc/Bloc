<?php
$BizName = strtolower($_POST['bizName']);
$PhoneNum = $_POST['phoneNumber'];
$PhoneNumber= substr($PhoneNum,0,3)."-".substr($PhoneNum,3,3)."-".substr($PhoneNum,6);
$db = mysql_connect ("localhost","Eugene","12345");
mysql_select_db ("Bloc",$db);

$results = mysql_query("SELECT Business_Name, Address, City, State, Zip_Code FROM BizInfo WHERE Business_Name='$BizName' AND Phone_Number='$PhoneNumber'");
$row = mysql_fetch_array($results);
	
	if(isset($row['Business_Name']))
	{
		echo "<div id='DuplicateResults'>
				<h2>We have just found the same registered Business.<br>To Claim this business click button below.</h2><br>
				<h3>".$row['Business_Name']."</h3>
				<h4>".$row['Address']." ". ucwords($row['City'])." ".$row['State']." ".$row['Zip_code']."</h4>
				<a href='#'>Claim</a>
			  </div>"; 
	}
	else "";

mysql_close($db);
?>