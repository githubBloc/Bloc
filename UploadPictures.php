<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<script type="text/javascript" src="js/Timeout.js"></script>
<style type="text/css">
p {color:#565656;font-family:"Gotham Rounded Book";font-size:14px;text-transform:uppercase;margin:5px 0px;}
#Loader {width:88px;height:76px;border:1px solid #565656;}
#Picture {width:100%; height:100%;}
#Loading, #LoadingGal {display:none;}
#Preview ul{display:inline-block; padding:0px; margin:0px;}
#Preview li{width:150px; height:140px;margin:5px;display:inline-block;border:1px solid #565656;}
#PictureGal {width:100%; height:100%;}
</style>
<script type="application/javascript">
$(document).ready(function(){ 
	
	$('a').click(function(e) {
		e.preventDefault();
		alert("We will verify your Business Information");	
		window.location.href = "../BackOffice.php";
	});

});
</script>
</head>

<body>
<h1>Last Step</h1>
<h2>Please upload your pictures below:</h2>

<form id="imageForm" name="imageForm" method="POST" enctype="multipart/form-data" action='Scripts/CheckPicture.php'>
<p>Your Logo: </p>   

<div id="Loader">
</div>
<img id="Loading" src="Images/8.gif">
<br>
<input name="file" id="file"  type="file">
</form>

<br><br>
<p>Gallery Pictures: <h4>Your limit is 20 pictures.</h4></p>
<div id="Preview">
	<ul>
	
	</ul>
</div>

<form id="GalleryForm" name="imageForm" method="POST" enctype="multipart/form-data" action='Scripts/PremiumGalleryPictures.php'>
<input name="photos[]" id="photoImg"  type="file" multiple="true" disabled>
<div id="LoaderGallery">
<img id="LoadingGal" src="Images/8.gif">
</div>
</form>
<br>
<a href="../BackOffice.php">Confirm</a>

</body>
</html>

