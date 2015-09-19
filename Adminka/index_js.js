// JavaScript Document

$(document).ready(function(){ 
	$('.menu_links a').click(function(e){
		e.preventDefault();
		$.ajax({
			url:this.id+'/LoadList.php',
			cache:false,
			success: function(callback_body){
				$('#Content').html(callback_body);
			}
		});
	});

$(document).on('click', '#ProfileLink', function (e) {
    e.preventDefault();
	var data = $(this).data('title');
	
	$.ajax({
		url:"BizRequest/LoadBiz.php",
		type:'POST',
		data: {id:data},
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}
		
	}); //end of ajax funtion
}); // end of click event

$(document).on('click', '#HoldProfileLink', function (e) {
    e.preventDefault();
	var id = $(this).data('id');
	var claimId = $(this).data('claimid');
	$.ajax({
		url:"Hold/LoadBiz.php",
		type:'POST',
		data: {Id:id, ClaimId:claimId},
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}
		
	}); //end of ajax funtion
}); // end of click event

$(document).on('click', '#ClaimProfileLink', function (e) {
    e.preventDefault();
	var id = $(this).data('id');
	var ClaimId = $(this).data('claimid');
	
	$.ajax({
		url:"ClaimRequest/LoadBiz.php",
		type:'POST',
		data: {Id:id, ClaimId:ClaimId},
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}
		
	}); //end of ajax funtion
}); // end of click event

$(document).on('click', '#Submit', function (e) {
	
	e.preventDefault();
	var myData = $('form').serialize();
	$.ajax({
		url:"BizRequest/Submit.php",
		type:'POST',
		data: myData,
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}	
	});
	
	
});// end of submit function

$(document).on('click', '#SubmitHold', function (e) {
	
	e.preventDefault();
	var myData = $('form').serialize();
	$.ajax({
		url:"Hold/SubmitHold.php",
		type:'POST',
		data: myData,
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}	
	});
	
	
});// end of submit function

$(document).on('click', '#ClaimSubmit', function (e) {
	
	e.preventDefault();
	var myData = $('form').serialize();
	$.ajax({
		url:"ClaimRequest/SubmitClaim.php",
		type:'POST',
		data: myData,
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}	
	});
	
	
});// end of submit function

$(document).on('click', '#PutOnHoldAgain', function (e) {
	
	e.preventDefault();
	var myData = $('form').serialize();
	$.ajax({
		url:"Hold/PutOnHoldAgain.php",
		type:'POST',
		data: myData,
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}	
	});
	
	
});// end of hold function


$(document).on('click', '#PutClaimOnHold', function (e) {
	
	e.preventDefault();
	var myData = $('form').serialize();
	$.ajax({
		url:"Hold/PutOnHold.php",
		type:'POST',
		data: myData,
		success: function(callback){$('#Content').html(callback);},
		error:function(callback){$('#Content').html(callback);}	
	});
	
	
});// end of hold function












});// end of ready function


