<?php
$Email = $_GET['Email'];
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Setup a New Password</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<style type="text/css">
#Block{border:1px solid #999; margin:auto auto; width:225px; padding:25px;}
</style>

	<script type="application/javascript">
 
 		$(document).ready(function (e){
			
			$('#Submit').click(function (e) {
			var Password = $('#Password').val();
			var Password2 = $('#Password2').val();
			var Email = $('#Email').text();
	
			var reg_exp = /^^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
			  
			if(!reg_exp.test(Password))
				{
					$('#Warning').html("<p id='red_msg'>Password must be between 7 to 15 characters which contain at least one numeric digit and a special character.</p>");
					return false;
					
				}			
			if(Password!=Password2)
			{ $('#Warning').html("<p id='red_msg'>Please type the same password in second field</p>");
					return false; }
			
			e.preventDefault();
			
	                $.ajax({
					type: "POST",  
                    url: "Create_Password.php",
					data: {Password:Password, Email:Email},  
                    success: function(callback){  
                        alert("We update your password succesfuly"); 
						window.location.href = "../index.php";
                    },
					error: function (){  
					$("#Block").html("Error, Sorry you can't register this time. Please try again.");
					}
					
                }); 
			 
	});
			
		   
		});
    </script>
</head>

<body>

<div id="Block">

	<form name="Form" >     
    	<label>HI, <span id="Email"><?php echo $Email;?></span></label> <br><br>  
        <label>Enter Your Password: </label><br><span id="Warning"></span>
        <input name="Password" type="password" size="30" id="Password"><br><br>
        <label>Re-Enter Your Password again:</label><br>
        <input name="Password2" type="password" size="30" id="Password2"><br><br>
        <input type="submit" id="Submit">
     </form>

</div>

</body>
</html>