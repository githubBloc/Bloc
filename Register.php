<?php include("Scripts/Sessions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Register</title>
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<link href="CSS/Register.css" type="text/css" rel="stylesheet">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>

</head>

<body>
<div id="wrapper">
<?php if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}?>
<?php include("Blocks/Header.php"); ?>

<div style="background-color:#e7ebec; height:68px; border: 1px solid #b7b8b8"></div>

    <div id="Login_Exist">
	<form>
    	<h3>Login with existing account</h3>
    	<p>Username: </p><span id="Login_span3" style="color:#e74c3c; display:none;">Invalid Email Address</span><input id="Login3" type="text" size="30">
		<p>Password: </p><span style="color:#e74c3c; display:none;" id="Password_span3">Forgot your password</span><input id="Password3" type="password" size="30"><br>
    	<input name="submit" type="submit" id="Submit_Login3" value="Submit" style="cursor:pointer">
	</form>
	</div>
    
    
<div id="Content"> 
  <div id="InfoGraphic"><img src="Images/Infographic.png"></div>
   <a href="#"><div id="RegisterButton">Register Now</div></a>
   <h3>Mantra:</h3>
   <h4>Connecting Slavic people with Slavic Businesses</h4>
</div>  

<script type="text/javascript">

$(document).ready(function(){ 

$('#Submit_Login3').click(function (e) {
	var Email = $('#Login3').val();
	var Password = $('#Password3').val();
	var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	if(!email_regex.test(Email))
			 { 
			 	$('#Login_span3').css('display','block');
			  	return false;  
			 }
			 $('#Login_span3').css('display','none');
			 if(Password==null||Password==""){$('#Password_span3').css('display','block'); return false;}
			 
			 e.preventDefault();
	$.post('DB/Check_User.php', {'username':Email,'password':Password}, function (callback){
				  if(callback==1){alert("This User is not exist");}else if(callback==2){alert("Wrong Password");}else if(callback==3){alert("This User is not Active");}else{
				  window.location.href="BackOffice.php";}
			  });
			 
	});
          
            $('#Content a').click(function(){  
                $.ajax({  
                    url: "Ajax/Register1.php",  
                    cache: false,  
                    success: function(html){  
                        $("#Content").html(html);  
                    }  
                });  
            });                 
        });  
</script>

    
 

<!--Footer-->	
<?php include("Blocks/Footer.php"); ?>

<!--Copyright-->	
<?php include("Blocks/Copyright.php"); ?>
</div>
</body>
</html>