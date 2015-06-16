<?php session_start();

if(isset($_SESSION['Email'])){
$_SESSION['counter']=1;
$_SESSION['counter2']=1;
$Email=$_SESSION['Email'];
include ("DB/bd.php");
$results = mysql_query("SELECT FirstName FROM users WHERE Email = '$Email'", $db);
$myrow = mysql_fetch_array($results);
$FirstName = $myrow['FirstName'];}
else{session_unset(); session_destroy(); header('Location: ../index.php');}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<style type="text/css">
#FreeBiz, #BasicBiz, #PremiumBiz {color:#565656;font-family:"Gotham Rounded Book";font-size:12px; float:left; width:300px;height:500px;margin-left:5px; padding:5px;}
#BasicBiz{border-left:3px solid #565656;border-right:3px solid #565656;}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
<script type="text/javascript" src="../js/jquery.wallform.js"></script>
<script type="text/javascript">

$(document).ready(function(){

$('#file').live('change', function() 
 {
var A=$("#Loading");
var C = $('#Loader');
	$('#imageForm').ajaxForm({target: '#Loader',
			
			beforeSubmit:function(){C.html(""); A.show();},
			success:function(){A.hide(); $('#photoImg').prop('disabled', false);},
			error:function(){$('#Loader').html("Error, try again.");}
			
		}).submit();


});

var counter=0;
var counter2=0;
//Premium Picture Uploader
$('#photoImg').live('change', function() 
 {
var A=$("#LoadingGal");
var C = $('#LoaderGallery');
	$('#GalleryForm').ajaxForm({target: '#Preview',
			
			beforeSubmit:function(){C.html(""); A.show(); counter++; if($('#Preview').innerText=="Invalid file"){counter--;}},
			success:function(){A.hide(); if(counter==20){$('#photoImg').prop('disabled', true);}},
			error:function(){$('#Loader').html("Error, try again.");}
			
		}).submit();


});

// Basic pictures uploader
$('#file2').live('change', function() 
 {
var A=$("#Loading2");
var C = $('#Loader');
	$('#imageForm2').ajaxForm({target: '#Loader2',
			
			beforeSubmit:function(){C.html(""); A.show();},
			success:function(){A.hide(); $('#photoImg2').prop('disabled', false);},
			error:function(){$('#Loader2').html("Error, try again.");}
			
		}).submit();


});

$('#photoImg2').live('change', function() 
 {
var A=$("#LoadingGal2");
var C = $('#LoaderGallery2');
	$('#GalleryForm2').ajaxForm({target: '#Preview2',
			
			beforeSubmit:function(){C.html(""); A.show(); counter2++; if($('#Preview2').innerText=="Invalid file"){counter2--;}},
			success:function(){A.hide(); if(counter2==5){$('#photoImg2').prop('disabled', true);}},
			error:function(){$('#LoaderGallery2').html("Error, try again.");}
			
		}).submit();


});

	$('#FreeBiz a').click(function(){
		$.ajax({
			url:"Blocks/RegisterFree.php",
			cashe: false,
			success: function(callback){ $('#Content').html(callback); }
			});
	   });
	   
	   	$('#BasicBiz a').click(function(){
		$.ajax({
			url:"Blocks/RegisterBasic.php",
			cashe: false,
			success: function(callback){ $('#Content').html(callback); }
			});
	   });
	   	
		$('#PremiumBiz a').click(function(){
		$.ajax({
			url:"Blocks/RegisterPremium.php",
			cashe: false,
			success: function(callback){ $('#Content').html(callback); }
			});
	   });
	
	});
</script>


<title>Back Office</title>
</head>

<body>
<div id="wrapper">
<?php if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}?>
<?php include("Blocks/Header.php");?>
<div style="background-color:#e7ebec; height:58px; border: 1px solid #b7b8b8"></div>
<div id="Content">

<div id=FreeBiz>
<h1>Free Profile</h1>
<p>To add your Free Business profile Click <a href="#">HERE</a></p>
</div>

	<div id=BasicBiz>
    <h1>Basic Profile</h1>
    <p> To add your Basic Profile Page please click: <a href="#">Here</a></p>
    </div>

		<div id=PremiumBiz>
        <h1>Premium Profile</h1>
        <p>To add your Premium Profile Page please click <a href="#">Here</a></p>
		</div>





</div>
<?php

/*Footer	*/
include("Blocks/Footer.php"); 

/*<!--Copyright-->*/	
include("Blocks/Copyright.php");
mysql_close($db);
 ?>
</div>
</body>
</html>