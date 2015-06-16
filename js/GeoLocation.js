// JavaScript Document
$(window).ready(function() {

//loading Map
var geocoder = new google.maps.Geocoder(); 		
 
 
 var address = "Lynnwood WA 98087";
 var Location = null;

function initialize() {

 geocoder = new google.maps.Geocoder();

	
	
	geocoder.geocode({'address':address}, function(results, status)
	{
		if(status==google.maps.GeocoderStatus.OK)
		{
			Location = results[0].geometry.location;
			
			var Latitude = Location['k'];
			var Longtitude = Location['B'];
			
		}
		else
		{
			alert("We can't find your address, please check again our");
			}
	}

	);// geocoder function

}
$('#test').append(Latitude).append(Longtitude);
google.maps.event.addDomListener(window, 'load', initialize);
	
//Ajax call to add location to DB	

	
	






});