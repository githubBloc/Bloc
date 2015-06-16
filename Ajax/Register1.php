<?php session_start();
if(isset($_SESSION['Email'])){
$Email=$_SESSION['Email'];
include ("DB/bd.php");
$results = mysql_query("SELECT FirstName FROM users WHERE Email = '$Email'", $db);
$myrow = mysql_fetch_array($results);
$FirstName = $myrow['FirstName'];}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Register</title>

<style type="text/css">
p {color:#565656;font-family:"Gotham Rounded Book";font-size:11px;text-transform:uppercase;margin:5px 0px;}
input:last-child {margin-top:5px;}
#red_msg{color:red; font-family:"Gotham Rounded Book";}
#green_msg{color:green; font-family:"Gotham Rounded Bold";}
#Star {color:red;}
</style>
<script type="text/javascript" src="js/Timeout.js"></script>
</head>

<body>

    	<h3>Register a New User</h3>
        <form name="form">
    		<p>First Name: <span id="Star">*</span></p><input  id="First_Name" name="First_Name" type="text" size="30">
            <span id="Check_FName"></span>
            <p>Last Name: <span id="Star">*</span></p><input  id="Last_Name" name="Last_Name" type="text" size="30">
            <span id="Check_LName"></span>
            <p>E-mail: <span id="Star">*</span></p><input  id="E_mail" name="E_mail" type="text" size="30">
            <span id="Check_email"></span>
			<p>Password: <span id="Star">*</span></p><input id="Pwd" name="Password" type="password" size="30">
            <span id="Check_pwd"></span>
            <p>Confirm Password: <span id="Star">*</span></p><input id="Pwd2" name="Password2" type="password" size="30">
            <span id="Check_pwd2"></span>
            <br><br><input style="float:left; margin-right:5px 5px 0px 0px;" id="Terms" name="Terms" type="checkbox"><p style="margin:0;padding:0;">Terms and Contidions.<span id="Star">*</span>	</p>
            <span id="Check_Terms"></span>
        <input id="SubmitButton" name="submit" type="submit" value="Submit" disable style="cursor:pointer">
        </form>
        
<script type="text/javascript">

		$(document).ready(function(){
			  
		 $('#First_Name').blur(function(){ 
				  if($(this).val()!==null || $(this).val()!=="")
				  {
					  $('#Check_FName').html("");
					  }
					  
		 });
		 
		  $('#Last_Name').blur(function(){ 
				  if($(this).val()!==null || $(this).val()!=="")
				  {
					  $('#Check_LName').html("");
					  }
		 });
		 
		  $('#Terms').blur(function(){ 
				  if($(this).val()!==null || $(this).val()!=="")
				  {
					  $('#Check_Terms').html("");
					  }
		 });
		
          $('#E_mail').blur(function(e){
			 var E_mail = $(this).val();
			 var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
			 
			 if(!email_regex.test(E_mail))
			 { 
			 	$('#Check_email').html("<p id='red_msg'>This is not valid email</p>");
			  	return false;  
			 }
			 
			  $.post('DB/Check_Email.php', {'email':E_mail}, function (data){
				  $('#Check_email').html(data);
			  });
			  
			 $('#Pwd').blur(function() {
				  var Pwd = $(this).val();
				  var result = false;
				var reg_exp=  /^^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
			  if(!reg_exp.test(Pwd))
				{
					$('#Check_pwd').html("<p id='red_msg'>Password must be between 7 to 15 characters which contain at least one numeric digit and a special character.</p>");
					return false;
					
				}if(Pwd!==null || Pwd!==""){		    				  
				  $('#Check_pwd').html("");
				  
				}
				  });
			  });
			  
		  	   $('#Pwd2').blur(function(){ 
				  if($(this).val()!==null || $(this).val()!=="" && ('#Pwd2').val()==$('#Pwd').val())
				  {
					  $('#Check_pwd2').html("");
					  }
		 });
		  
            $('#SubmitButton').click(function(e){ 
				
				
				if($('#First_Name').val()==null || $('#First_Name').val()=="")
				{
					$('#Check_FName').html("<p id='red_msg'>Please type your First Name</p>");
					return false;
				}
					if($('#Last_Name').val()==null || $('#Last_Name').val()=="")
					{	
						$('#Check_LName').html("<p id='red_msg'>Please type your First Name</p>");
						return false;
					}
						if($('#E_mail').val()==null || $('#E_mail').val()=="")
						{
							$('#Check_email').html("<p id='red_msg'>Please type your Email</p>");
							return false;
						}
							if($('#Pwd').val()==null || $('#Pwd').val()=="")
							{
								$('#Check_pwd').html("<p id='red_msg'>Please type your Password</p>");
								return false;
							}
							if($('#Pwd').val()!==$('#Pwd2').val())
							{
								$('#Check_pwd2').html("<p id='red_msg'>Your password doesn't match</p>");
								return false;
							}
							if($('#Pwd2').val()==null || $('#Pwd2').val()=="")
							{
								$('#Check_pwd2').html("<p id='red_msg'>Type Confirm Password</p>");
								return false;
								}
								
									if(form.Terms.checked==false)
									{	
										$('#Check_Terms').html("<p id='red_msg'>Select Terms and Contidions</p>");
										return false;
									}
			
				e.preventDefault(); 
				var mydata = $('form').serialize();
	                $.ajax({
					type: "POST",  
                    url: "../DB/save_user.php",
					data: mydata,  
                    success: function(callback){  
                        $("#Content").html("<h3>"+callback+"</h3>");  
                    },
					error: function (){  
					$("#Content").html("Error, Sorry you can't register this time. Please try again.");
					}
					
                }); 
				
            });
			
			});  
</script>

        
</body>
</html>