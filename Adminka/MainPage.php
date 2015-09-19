<?php

session_start();
if(!isset($_SESSION['Admin']))
{session_unset(); session_destroy();  header('Location: index.php');}

require_once("../DB/DB_connections.php"); 
$bdd = new DB_connections('localhost', 'Adminka', 'root', 'root');

$Users = $bdd->getAll('SELECT id FROM Business_Requests'); // select ALL from Requests   
$counter = count($Users); // return the number of lines

$Users = $bdd->getAll('SELECT id FROM Claim_Requests'); // select ALL from Requests   
$counter2 = count($Users);

$Users = $bdd->getAll('SELECT id FROM Hold_Requests'); // select ALL from Requests   
$counter3 = count($Users);

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
		
        <div id="Left_Sidebar" class="menu_links">
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
<?php $bdd->disconnect();?>