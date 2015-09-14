<?php session_start();
$_SESSION['Email'] = $_GET['Email']; 


if    (isset($_GET['code'])) {$code =$_GET['code']; } 
            else 
            {
				
			  exit("You logged in this page without conformation code<br><a href='../index.php'>Bloc</a>");	 
			 } 
 if (isset($_GET['Email'])) {$Email=$_GET['Email'];}
            else 
            {    
			exit("You got on this page without email<a href='../index.php'>Bloc</a><br>");
			} 
			
			include ("../DB/bd.php");

 $results1 = mysql_query("SELECT * FROM users WHERE Email = '$Email'", $db);
		$myrow1 = mysql_fetch_array($results1);
		
		$Kill_Link = $myrow1['Activation'];
		if($Kill_Link=='1'){exit("You did confirm your Registration already");}
		$activation = md5($myrow1['id']).md5($Email);
	
 if ($activation == $code) {
                     mysql_query("UPDATE users SET Activation='1' WHERE Email='$Email'",$db);
                     
					     			
        header('Location: ../BackOffice.php');            
		 
                     }
            else {
				exit("Error, your confirmation email does not match our database<a href='../index.php'>Bloc</a><br>");
            } 

mysql_close($db);
?>
