<?php
$Id = $_POST['Id'];
$ClaimId = $_POST['ClaimId'];

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db)or die("Could not select a database");

$results = mysql_query("SELECT * FROM Hold_Requests WHERE id='$Id'");
$row = mysql_fetch_array($results);

$ClaimIn = mysql_query("SELECT * FROM ClaimInfo WHERE id='$ClaimId'")or die(mysql_error());
$ClaimInfo = mysql_fetch_array($ClaimIn);

$results2 = mysql_query("SELECT * FROM Comments WHERE Hold_Number='$Id'")or die(mysql_error());

if($ClaimId==0)
{
echo "<form name='form'>
	 <p>Business Information:</p>
	  <p>ID</p><input name='Id' type='text' value='".$Id."'>
	  <p>Business Type</p><input name='BizType' type='text' value='".$row['BizType']."'>
	  <p>Email</p><input name='Email' type='text' value='".$row['Email']."'>
	  <p>Business Name</p>
	  <input name='Business_Name' type='text' value='".$row['Business_Name']."'>
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
	  
	  <br> <input name='submit' type='submit'  id='SubmitHold' value='Submit'>
	  <br><br> <p>Add a new Comment</p><textarea name='Comments' rows='10' cols='100' placeholder='Please add your comments here'></textarea>
	  <br><input name='Save' type='submit' id='PutOnHoldAgain' value='Put on Hold'>

		</form>
		
	  <br> <p>Comments<p>";
}
else
			{
					echo "<form name='form'>
	 
					 <table class='Claim'>
					
					 <th>Business Information:</th><th>Claim Information:</th>
					  <tr>
					  <td><p>ID</p></td><td><p>First Name</p></td>
					  </tr>
					  <tr>
					  <td><input name='Id' type='text' value='".$Id."'></td><td>".$ClaimInfo['FirstName']."</td>
					  </tr>
					  <tr>
					  <td><p>Business Type</p></td><td><p>Last Name</p></td>
					  </tr>
					  <tr>
					  <td><input name='BizType' type='text' value='".$row['BizType']."'></td><td>".$ClaimInfo['LastName']."</td>
					  </tr>
					  <tr>
					  <td><p>Email</p></td><td><p>Contact Phone Number</p></td>
					  </tr>
					  <tr>
					  <td><input name='Email' type='text' value='".$row['Email']."'></td><td>".$ClaimInfo['ContactPN']."</td>
					  </tr>
					  <tr>
					  <td><p>Business Name</p></td><td><p>Business Name</p></td>
					  </tr>
					  <tr>
					  <td><input name='Business_Name' type='text' value='".$row['Business_Name']."'></td><td>".$ClaimInfo['PersonalEmail']."</td>
					  </tr>
					  <tr>
					  <td><p>Phone Number</p></td><td><p>Business Phone Number</p></td>
					  </tr>
					  <tr>
					  <td><input name='Phone_Number' type='text' value='".$row['Phone_Number']."'></td><td>".$ClaimInfo['BusinessNumber']."</td>
					  </tr>
					  <tr>
					  <td><p>Address</p></td><td><p>UBI Number</p></td>
					  </tr>
					  <tr>
					  <td><input name='Address' type='text' value='".$row['Address']."'></td><td>".$ClaimInfo['UBINumber']."</td>
					  </tr>
					  <tr>
					  <td><p>City</p></td><td><p>Address</p></td>
					  </tr>
					  <tr>
					  <td><input name='City' type='text' value='".$row['City']."'></td><td>".$ClaimInfo['BusinessAddress']."</td>
					  </tr>
					  <tr>
					  <td><p>State</p></td><td><p>City</p></td>
					  </tr>
					  <tr>
					  <td><input name='State' type='text' value='".$row['State']."'></td><td>".$ClaimInfo['BusinessCity']."</td>
					  </tr>
					  <tr>
					  <td><p>Zip Code</p></td><td><p>State</p></td>
					  </tr>
					  <tr>
					  <td><input name='Zip_Code' type='text' value='".$row['Zip_Code']."'></td><td>".$ClaimInfo['BusinessState']."</td>
					  </tr>
					  <tr>
					  <td><p>Business_Email</p></td><td><p>Zip Code</p></td>
					  </tr>
					  <tr>
					  <td><input name='Business_Email' type='text' value='".$row['Business_Email']."'></td><td>".$ClaimInfo['ZipCode']."</td>
					  </tr>
					  <tr>
					  <td><p>Google Plus URL</p></td><td><p>Business Email</p></td>
					  </tr>
					  <tr>
					  <td><input name='Google_Plus_URL' type='text' value='".$row['Google_Plus_URL']."'></td><td>".$ClaimInfo['BusinessEmail']."</td>
					  </tr>
					  <tr>
					  <td><p>Twitter URL</p></td><td><p>Registered Owner's Name</p></td>
					  </tr>
					  <tr>
					  <td><input name='Twitter_URL' type='text' value='".$row['Twitter_URL']."'></td><td>".$ClaimInfo['RegisteredON']."</td>
					  </tr>
					 <tr>
					  <td><p>Facebook URL</p></td><td><p>Claim ID</p></td>
					  </tr>
					  <tr>
					  <td><input name='Facebook_URL' type='text' value='".$row['Facebook_URL']."'></td><td><input name='ClaimId' type='text' value='".$ClaimInfo['id']."'></td>
					  </tr>
					  <tr>
					  <td><p>Web Address</p></td><td><p>Business ID</p></td>
					  </tr>
					  <tr>
					  <td><input name='Web_Address' type='text' value='".$row['Web_Address']."'></td><td><input name='BizId' type='text' value='".$row['BizId']."'></td>
					  </tr>
					  </table>
				
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
					  
					  <br> <input name='submit' type='submit'  id='SubmitHold' value='Submit'>
					  <br><br> <p>Add a new Comment</p><textarea name='Comments' rows='10' cols='100' placeholder='Please add your comments here'></textarea>
					  <br><input name='Save' type='submit' id='PutOnHoldAgain' value='Put on Hold'>
				
						</form>
						
					  <br> <p>Comments<p>";
			}
			
			
	  while($row2 = mysql_fetch_array($results2))
{
	echo "<b>========================================================</b>
		<p>".$row2['Date']."</p>
		<p>".$row2['Comments']."</p>";
		
}
mysql_close($db);
?>