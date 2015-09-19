// JavaScript Document

$(document).ready(function(e) {
	
var distance = $('#Search_Fields').offset().top;	
$(window).scroll(function(e){
		
	var Search_Fields = $('#Search_Fields');
	var Register_links_2 = $('#Register_links_2');
	var Register_links_3 = $('#Register_links_3'); 
	
	if(window.pageYOffset > distance) 
	{
		Search_Fields.addClass('Search_Field_Appears').css({'position':'fixed','margin-top':'0px','top':'0.1px'});
		Register_links_2.css({'display':'block'});
		Register_links_3.css({'display':'block'}); 

	}
	else if (window.pageYOffset < distance)
	{
		Search_Fields.removeClass('Search_Field_Appears').css({'position':'absolute','margin-top':'130px','top':''});
		Register_links_2.css({'display':'none'});
		Register_links_3.css({'display':'none'}); 
	
	}
	
	});
  
   $('#Search_Button_li').click(function (){
	  
	  
	  if($('#Search_Area_Input').val()=="" && $('#Near_Area_Input').val()=="")
	  {
		  $('#Search_Area_Input').css('border-color','red').attr('placeholder','Type any query here');
		  $('#Near_Area_Input').css('border-color','red').attr('placeholder','Type any City/Location here');;
	 	
		  }else{
	 $('#SearchForm').submit();
	  }
	  });

});//the end ready function