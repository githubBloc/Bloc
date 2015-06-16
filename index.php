<?php include("Scripts/Sessions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Bloc</title>
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<link href="CSS/flexslider.css" type="text/css" rel="stylesheet">
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<script type="application/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/myJS.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
</head>

<body>
<div id="wrapper">
<?php
if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}

include("Blocks/Header.php");

include ("Blocks/NavigationBlock.php");

include("Blocks/Search_Area.php");

include("Blocks/Signs.php");

include("Blocks/Ads.php");

include("Blocks/Blog.php");

include("Blocks/MostPopularListings.php");

include("Blocks/BizReg.php");

include("Blocks/Footer.php");

include("Blocks/Copyright.php");

?>
</div>
</body>
</html>