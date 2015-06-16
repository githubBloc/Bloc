<?php
$Id = $_POST['id'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db)or die("Could not select a database");

$results = mysql_query("SELECT * FROM Business_Requests WHERE id='$Id'");
$row = mysql_fetch_array($results);
echo "<form name='form'>
	  <p>ID</p><input name='Id' type='text' value='".$Id."'>
	  <p>Business Type</p><input name='BizType' type='text' value='".$row['BizType']."'>
	  <p>Email</p><input name='Email' type='text' value='".$row['Email']."'>
	  <p>Business Name</p><input name='Business_Name' type='text' value='".$row['Business_Name']."'>
	  <p>Phone Number</p><input name='Phone_Number' type='text' value='".$row['Phone_Number']."'>
	  <p>Address</p><input name='Address' type='text' value='".$row['Address']."'>
	  <p>City</p><input name='City' type='text' value='".$row['City']."'>
	  <p>State</p><input name='State' type='text' value='".$row['State']."'>
	  <p>Zip Code</p><input name='Zip_Code' type='text' value='".$row['Zip_Code']."'>
	  <p>Business_Email</p><input name='Business_Email' type='text' value='".$row['Business_Email']."'>
	  <p>Google Plus URL</p><input name='Google_Plus_URL' type='text' value='".$row['Google_Plus_URL']."'>
	  <p>Twitter URL</p><input name='Twitter_URL' type='text' value='".$row['Twitter_URL']."'>
	  <p>Facebook URL</p><input name='Facebook_URL' type='text' value='".$row['Facebook_URL']."'>
	  <p>Web Address</p><input name='Web_Address' type='text' value='".$row['Web_Address']."'>
	  <p>Categories</p><textarea name='Categories' rows='4' cols='20' maxlength='2000'>".$row['Categories']."</textarea>
	  <p>Hours</p><textarea name='Hours' rows='7' cols='17' maxlength='2000'>".$row['Hours']."</textarea>
	  <p>Tags</p><input name='Tags' type='text' size='50' value='".$row['Tags']."'>
	  <p>Service Cities</p><input name='Service_Cities' size='50' type='text' value='".$row['Service_Cities']."'>
	  <p>About Company</p><textarea name='About_Company' rows='20' cols='100' maxlength='2000'>".$row['About_Company']."</textarea>
	  <p>Payments</p><input name='Payments' type='text' size='50' value='".$row['Payments']."'>
	  <p>Features</p><input name='Features' type='text' size='50' value='".$row['Features']."'>
	  <p>Latitude</p><input name='Latitude' type='text' size='30' value='".$row['Latitude']."'>
	  <p>Longtitude</p><input name='Longtitude' type='text' size='30' value='".$row['Longtitude']."'>
	  <p>ClickTrueRate</p><input name='ClickTrueRate' type='text' value='0'>
	  
	  <br> <input name='submit' type='submit'  id='Submit' value='Submit'>
	  <br><br> <p>Add a new Comment</p><textarea name='Comments' rows='10' cols='100' placeholder='Please add your comments here'></textarea>
	  <br><input name='Save' type='submit' id='PutClaimOnHold' value='Put on Hold'>
		</form>	";
mysql_close($db);
?>