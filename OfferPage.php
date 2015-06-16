<?php include("Scripts/Sessions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bloc</title>
<link href="CSS/OfferPage.css" type="text/css" rel="stylesheet">
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<script type="application/javascript" src="js/jquery-1.11.2.min.js"></script>
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
	<div id="Offer_Page_Picture">
		<img src="Images/OfferPageTop.png">
	</div>

<!-- Signes -->
    <div id="Signes">
   					<p id="First_sign">MAKE SURE YOUR NAME APPEARS</p>
   					<div class="line_seperator"></div>
   					<p id="Second_sign">WHERE PEOPLE LOOK - ON XXXXXX</p>
   	</div>

<!-- HOW IT WORKS BLOCK -->
	<div id="How_It_Works">
		<h1>HOW IT WORKS</h1>

		<div class="How_It_Work_Item">
			<img src="Images/Submit_Your_Business.png" />
			<h2>SUBMIT</h2>
			<h3>YOUR BUSINESS</h3>
		</div>

			<div class="How_It_Work_Item" style="margin: 0px 105px;">
				<img src="Images/Get_More_Visibility.png" />
				<h2>GET MORE</h2>
				<h3>VISIBILITY</h3>
			</div>
				
				<div class="How_It_Work_Item" style="margin-right: 105px;">
					<img src="Images/Get_More_Business.png" />
					<h2>GET MORE</h2>
					<h3>BUSINESS</h3>
				</div>

					<div class="How_It_Work_Item">
						<img src="Images/Get_More_Money.png" />
						<h2>GET MORE</h2>
						<h3>MONEY</h3>
					</div>

	<div style="clear:both;"></div>

	<p> Connecting your company with potential customers doesn't have to be difficult. </br>
		Showcase your business and connect with customers, hassle free</p>

	</div>

<!--Offer_Cards -->

	<div id="Offer_Cards">
		<h1>SEE HOW XXXXXXX CAN CONNECT YOU </h1>
		<p>In one easy step your business can be seen by the thousands Russian speaking people.</br>
			All you have to do is to enter your business information. We do the rest.</p>
<div class="Flex">
		<div class="Card">
			<h2>FREE</h2>
			<div class="Price">
				<p>$<span>0</span> /month</p>
			</div>
			<div class="Includes"><p>INCLUDES</p></div>
			<ul>
					<li>Logo</li>
					<li>1 Category</li>
					<li>Address</li>
					<li>Phone Number</li>
					<li>Email</li>
			</ul>

			<div class="Footer">
					<a href="test"><div class="Card_Button"><p>CHOOSE THIS PLAN</p></div></a>
			</div>
		</div>
			
				<div class="Card" style="margin:0px 40px;">
					<h2>BASIC</h2>
					<div class="Price">
						<p>$<span>20</span> /month</p>
					</div>
						<div class="Includes"><p>INCLUDES</p></div>
						<ul>
							<li>Logo</li>
							<li>2 Category</li>
							<li>2 Tags</li>
							<li>Address</li>
							<li>Phone Number</li>
							<li>Email</li>
							<li>Web URL</li>
							<li>Company Description</li>
							<li>6 Pictures</li>
							<li>Removal of Competitors</li>
						</ul>

						<div class="Footer">
							<a href="test"><div class="Card_Button"><p>CHOOSE THIS PLAN</p></div></a>
						</div>
				</div>

								<div class="Card">
									<h2>FREE</h2>
									<div class="Price">
									<p>$<span>50</span> /month</p>
									</div>
										<div class="Includes"><p>INCLUDES</p></div>
										<ul>
											<li>Logo</li>
											<li>4 Category</li>
											<li>6 Tags</li>
											<li>Address</li>
											<li>Phone Number</li>
											<li>Email</li>
											<li>Web URL</li>
											<li>Company Description</li>
											<li>20 Pictures</li>
											<li>Removal of Competitors</li>
											<li>Upgrade Design</li>
										</ul>

										<div class="Footer">
											<a href="test"><div class="Card_Button"><p>CHOOSE THIS PLAN</p></div></a>
										</div>
								</div>
		<div style="clear:both;"></div>
	</div>
	</div>

<div style="clear:both;"></div>
<!-- What is Sets us block -->	
	
<div id="What_Sets_Us">

		<h2>WONDERING WHY YOU SHOULD CHOOSE US OVER THE  OTHER GUYS?</h2>

		<h1>WHAT SETS US APART</h1>

		<div class="What_Sets_Us_Item" style="margin-left:75px;">
			<img src="Images/We_Are_Affordable.png" />
			<h2>WE ARE</h2>
			<h3>AFFORDABLE</h3>
		</div>

			<div class="What_Sets_Us_Item" style="margin: 0px 140px 0px 165px;">
				<img src="Images/We_Are_Convenient.png" />
				<h2>WE ARE</h2>
				<h3>CONVENIENT</h3>
			</div>
				
				<div class="What_Sets_Us_Item">
					<img src="Images/We_Are_Available.png" />
					<h2>WE ARE AVAILABLE</h2>
					<h3>WHENEVER YOU NEED</h3>
				</div>


	<div style="clear:both;"></div>


	</div>

<?php

include("Blocks/Footer.php");

include("Blocks/Copyright.php");

?>
</div>
</body>
</html>