<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<script type="text/javascript" src="../js/Timeout.js"></script>
<style type="text/css">
p {color:#565656;font-family:"Gotham Rounded Book";font-size:14px;text-transform:uppercase;margin:5px 0px;}
</style>

<script type="text/javascript">
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

<form id="imageForm" name="imageForm" method="POST" enctype="multipart/form-data" action='../Scripts/FreeCheckPictures.php'>
<p>Your Logo: </p>   <input name="file" id="file"  type="file">
<div id="Loader">
<img id="Loading" style="display:none" src="../Images/8.gif">
</div>

</form>
<br><br>

<a href="../BackOffice.php">Confirm</a>
</body>
</html>