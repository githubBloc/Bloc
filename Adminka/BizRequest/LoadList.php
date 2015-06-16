<?php
$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Adminka",$db)or die("Could not select a database");

$results = mysql_query("SELECT id, BizType, Business_Name, Address, City, State, Zip_Code, Phone_Number FROM Business_Requests")or die(mysql_error());
$counter2= 1;
while($row = mysql_fetch_array($results))
{
	echo "<a href='#' id='ProfileLink' data-title='".$row['id']."'><div class='List'>
			<h4>".$row['BizType']. "</h4>
			<h5>".$counter2.".".ucwords($row['Business_Name'])."</h5>
			<h5><span id=Address>".$row['Address']." ". ucwords($row['City'])." ".$row['State']." ".$row['Zip_code']."</span><br/>".$row['Phone_Number']."</h5>      
		</div></a>";
		$counter2++;
}


mysql_close($db);
?>