<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<script type="text/javascript" src="js/Timeout.js"></script>
<style type="text/css">
p {color:#565656;font-family:"Gotham Rounded Book";font-size:14px;text-transform:uppercase;margin:5px 0px;}
#Loader2 {width:88px;height:76px;border:1px solid #565656;}
#Picture2 {width:100%; height:100%;}
#Loading2, #LoadingGal2 {display:none;}
#Preview2 ul{display:inline-block; padding:0px; margin:0px;}
#Preview2 li{width:150px; height:140px;margin:5px;display:inline-block; border:1px solid #565656;}
#PictureGal2 {width:100%; height:100%;}
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
<h1>Basic</h1>
<h2>Please upload your pictures below:</h2>

<form id="imageForm2" name="imageForm" method="POST" enctype="multipart/form-data" action='../Scripts/CheckBasicPictures.php'>
<p>Your Logo: </p>   

<div id="Loader2">
</div>
<img id="Loading2" src="Images/8.gif">
<br>
<input name="file" id="file2"  type="file">
</form>

<br><br>
<p>Gallery Pictures: <h4>Your limit is 5 pictures.</h4></p>
<div id="Preview2">
	<ul>
	
	</ul>
</div>

<form id="GalleryForm2" name="imageForm2" method="POST" enctype="multipart/form-data" action='../Scripts/BasicGalleryPictures.php'>
<input name="photos[]" id="photoImg2"  type="file" multiple="true" disabled>
<div id="LoaderGallery2">
<img id="LoadingGal2" src="Images/8.gif">
</div>
</form>
<br>
<a href="../BackOffice.php">Confirm</a>
</body>
</html>

