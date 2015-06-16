// JavaScript Document
$(document).ready(function (){

$('#Submit_Login').click(function (e) {
	var Email = $('#Login').val();
	var Password = $('#Password').val();
	var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	if(!email_regex.test(Email))
			 { 
			 	$('#Login_span').css('display','block');
			  	return false;  
			 }
			 $('#Login_span').css('display','none');
			 if(Password==null||Password==""){$('#Password_span').css('display','block'); return false;}
			 
			 e.preventDefault();
			 
			 $.post('DB/Check_User.php', {'username':Email,'password':Password}, function (callback){
				  
				  if(callback==1){alert("This User is not exist");}
				  else if(callback==2){alert("Wrong Password");}
				  else if(callback==3){alert("This User is not Active");}
				  else {window.location.href="BackOffice.php";}
			  });
			 
	});
	
	
$('#Submit_Login2').click(function (e) {
	var Email = $('#Login2').val();
	var Password = $('#Password2').val();
	var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	if(!email_regex.test(Email))
			 { 
			 	$('#Login_span2').css('display','block');
			  	return false;  
			 }
			 $('#Login_span2').css('display','none');
			 if(Password==null||Password==""){$('#Password_span2').css('display','block'); return false;}
			 
			 e.preventDefault();
	$.post('DB/Check_User.php', {'username':Email,'password':Password}, function (callback){
				  if(callback==1){alert("This User is not exist");}else if(callback==2){alert("Wrong Password");}else if(callback==3){alert("This User is not Active");}
				  window.location.href="../BackOffice.php";
			  });
			 
	});
			 
$('#Forgot_Password').click(function(){
	
	$('#Forgot_Password_Div').slideDown();
	$(this).css('display','none');
	});
	
$('#Forgot_Password2').click(function(e){
	e.preventDefault();
	$('#Forgot_Password_Div2').slideDown();
	$(this).css('display','none');
	});
	
$('#Submit').click(function (){
	var Email = $('#Email').val();
	var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	if(!email_regex.test(Email))
			 { 
			 	$('#Sign_In span').css('display','block');
			  	return false;  
			 }
	          $.post('Scripts/Forgot_Password.php', {'Email':Email}, function (callback){
				  alert(callback);
			  });
	});
	
$('#Submit2').click(function(){
	
var Email = $('#Email2').val();
	var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	if(!email_regex.test(Email))
			 { 
			 	$('#Sign_In2 span').css('display','block');
			  	return false;  
			 }
	 
	        $.post('Scripts/Forgot_Password.php', {'Email':Email}, function (callback){
				  alert(callback);
				  
			  });
			 Email="";

	});
	});