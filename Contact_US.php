<?php include("Scripts/Sessions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bloc</title>
<link href="CSS/Contact_US.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body>
<div id="wrapper">
<?php
if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}

include("Blocks/Header.php");
?>
	
<!-- About US blocks -->

<!-- Top Picture -->
	<div id="About_US_Picture">
		<img src="Images/About_US.png">
	</div>

<!-- Signes -->
    <div id="Signes">
   					<p id="First_sign">PASSION FOR WHAT WE DO.</p>
   					<div class="line_seperator"></div>
   					<p id="Second_sign">EVERY STEP OF THE PROCESS.</p>
   	</div>


<div style="clear:both; height: 20px;"></div>

<!-- Contact US Block -->
	
<div id="Contact_US"> 

	<div id="Contact_US_Text">
		<h2>CONTACT US</h2>

		<h3>NEED TO GET IN TOUCH? </br>
			CALL US AT <strong> (888) 888-8888 </strong> OR FILL OUT THE CONTACT FORM.</h3>
	</div>

		<div id="Contact_US_Form">
			<div id="Your_Name" style="float:left; margin-right: 35px;">
				<label>YOUR NAME</label></br>
				<input type="text">
			</div>

			<div id="Your_Email">
				<label>YOUR E-MAIL</label></br>
				<input type="text">
			</div>

			<div id="Message" style="margin-top:20px;">
				<label>MESSAGE</label></br>
				<input type="textarea" style="width:100%; height:250px;">
			</div>

			<a href="Contact_US_Form"><div id="Contact_US_Form_Button"><p>SEND</p></div></a>
				
			<div style="clear:both;"></div>

		</div>

</div>

<?php

include("Blocks/Footer.php");

include("Blocks/Copyright.php");

?>
</div>
<script type="text/javascript" src="js/myJS.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
</body>
</html>