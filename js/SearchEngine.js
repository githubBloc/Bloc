// JavaScript Document
// This is Java Script Front End Search fields validation and post requests to server

$(document).ready(function(){

	
	// Search fields validation
	
	$('#Search_Button').click(function (e){
	 	var What = $('#Search_Area_Input').val();
	    var Where = $('#Near_Area_Input').val();
	  
	  e.preventDefault();
	 
	  if(What =="" && Where =="")
	  {
		  $('#Search_Area_Input').css('border-color','red').attr('placeholder','Type any query here');
		  $('#Near_Area_Input').css('border-color','red').attr('placeholder','Type any City/Location here');
	  }
	  else {
	  		var Type = $(this).data("type");
	  
	  		if(Type == "Home"){
		    
			
					// POST request to SearchQuery script
					$.post("../DB/SearchQuery.php"); 
				
			}
			else if (Type == "Search" )
	        {
		       
			   //AJAX call for Search Page
		       
			 
			 }
	  }// end of else statament
	  }); // search button event ends
	
	
	
	
	
	
	
	
	
	
	
	
	
});