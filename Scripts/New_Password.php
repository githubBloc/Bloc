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
	#Block{ border:1px solid #999; margin:auto auto; width:225px; padding:25px; }
	#Warning { color:red;}
</style>

	<script type="application/javascript">
 
 		$(document).ready(function (e){
			
			$('#Submit').click(function (e) {
			e.preventDefault();
			var password = $('#Password').val().trim();
			var Password2 = $('#Password2').val().trim();
			var Email = $('#Email').text().trim();
	
			var reg_exp = /^^(?=.*[0-9])(?=.*[!@#$%^&*\-\(\)\[\]\{\}+_=])[a-zA-Z0-9!@#$%^&*\-\(\)\[\]\{\}+_=]{7,15}$/;
			 
			 
				if(!reg_exp.test(password)){
					$('#Warning').html("<p id='red_msg'>Password must be between 7 to 15 characters which contain at least one numeric digit and a special character.</p>");
					return false;		
				}			
				if(password != Password2){
					$('#Warning').html("<p id='red_msg'>Please type the same password in second field</p>");
						return false; 
				}
			
                $.ajax({
					type: "POST",  
                    url: "Create_Password.php",
					data: { password:password, Email:Email},  
                    success: function(callback){ 
                    	if(callback){
                    		alert("Your password has been successfully updated");
                    		window.location.href = "../index.php";
                    	}else {
                    		alert("We can't update your password right now, please contact Us.");
                    		window.location.href = "../AboutUS.php";
                    	}
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