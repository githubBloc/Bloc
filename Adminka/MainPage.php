<?php
session_start();
if(!isset($_SESSION['Admin']))
{session_unset(); session_destroy();  header('Location: index.php');}

$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database")or die(mysql_error());
mysql_select_db("Adminka",$db) or die(mysql_error());

$counter = 0;
$results = mysql_query("SELECT id FROM Business_Requests");
while($row = mysql_fetch_array($results))
{
	$counter++;
}

$counter2 = 0;
$results = mysql_query("SELECT id FROM Claim_Requests");
while($row = mysql_fetch_array($results))
{
	$counter2++;
}

$counter3 = 0;
$results = mysql_query("SELECT id FROM Hold_Requests");
while($row = mysql_fetch_array($results))
{
	$counter3++;
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Administrator</title>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script type="text/javascript" src="index_js.js"></script>
 <link href="index_css.css" type="text/css" rel="stylesheet">
</head>

<body>
	
    <div id="wrapper">
    	<div id="header"><p style="text-align:left; float:left;">Admin: <?php echo $_SESSION['Admin']; ?></p><a href="LogOut.php">Log Out</a></div>
		
        <div id="Left_Sidebar">
        	<ul>
            	<li><a id="BizRequest" href="#">Business Request's <b style="color:#e74c3c; font-size:16px;"><?php echo $counter; ?></b></a></li>
                <li><a id="ClaimRequest" href="#">Claim Request's <b style="color:#e74c3c; font-size:16px;"><?php echo $counter2; ?></b></a></li>
                <li><a id="HoldRequest" href="#">Hold Request's <b style="color:#e74c3c; font-size:16px;"><?php echo $counter3; ?></b></a></li>
            </ul>
        </div>
        
        	
            	<div id="Content">
                
                
                </div>
        
	</div>

</body>
</html>
<?php mysql_close($db);?>