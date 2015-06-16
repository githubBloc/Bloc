<?php include("Scripts/Sessions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bloc</title>
<link href="CSS/AboutUS.css" type="text/css" rel="stylesheet">
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<script type="application/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/myJS.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
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

<!-- Our Story -->
	<div id="Our_Story">
		<h4>OUR STORY</h4>

		<p>Have a cool story about how your product or service was created? Put it on your 'About Us' page. 
			Good stories humanize your brand and provide context and meaning for your product. 
			What’s more, good stories are sticky -- which means people are more likely to connect with them and pass them on.</p>

		<p>You’re not like everyone else -- so why should you sound the same as everyone else? 
			Stand out with an 'About Us' page that shows off who you really are with witty headlines and a real brand voice.</p>

		<p>I Shot Him is different. The creative studio communicates that point with both a super edgy name and an incredibly fun presentation of who the company is, 
			right on the homepage. Rather than waiting for the 'About Us' page, 
			I Shot Him shows its true colors right from the creatively designed homepage with parallax scrolling. 
			And while the 'About Us' page is a gem once you get there, 
			it’s great to see a company embrace its own brand of quirk consistently throughout the site. </p>

	</div>
<!-- Vic and Me Profiles -->

	<div id="Profiles" style="padding: 35px 35px 35px 0px;">
        <div id="Profile_Picture_Vik" style="margin: -35px 35px 0px 0px">
           	<img src="Images/Viktor.png" alt="Blogs">
        </div>      
           	<h1>VIKTOR BOGUN</h1>
           	<p style="text-align:left;">FOUNDER</p>
           	<h2>IF YOU DONT KNOW WHERE YOU ARE GOING, YOU WILL PROBABLY END UP SOMEWHERE ELSE</h2>
           	<p style="text-align:right;">-LAURENCE J. PETER</p>
           	<h3> Have a cool story about how your product or service was created? Put it on your 'About Us' page. 
			Good stories humanize your brand and provide context and meaning for your product. 
			What’s more, good stories are sticky -- which means people are more likely to connect with them and pass them on.</h3>
    </div>

<div style="clear:both; height: 20px;"></div>

    <div id="Profiles" style="padding: 35px 0px 35px 35px;">
    	<div id="Profile_Picture_Eug" style="margin: -35px 0px 0px 35px">
           	<img src="Images/Eugene.png" alt="Blogs">
        </div>
           	<h1>EUGENE STANISLAVOV</h1>
           	<p style="text-align:left;">IT SUPPORT</p>
           	<h2>IF YOU DONT KNOW WHERE YOU ARE GOING, YOU WILL PROBABLY END UP SOMEWHERE ELSE</h2>
           	<p style="text-align:right;">-LAURENCE J. PETER</p>
           	<h3> Have a cool story about how your product or service was created? Put it on your 'About Us' page. 
			Good stories humanize your brand and provide context and meaning for your product. 
			What’s more, good stories are sticky -- which means people are more likely to connect with them and pass them on.</h3>
    </div>


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
</body>
</html>