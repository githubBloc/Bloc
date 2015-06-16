<?php include("Scripts/Sessions.php");?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search List Results</title>
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<link href="CSS/Search_css.css" type="text/css" rel="stylesheet">
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<script type="application/javascript" src="js/jquery-1.11.2.min.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNLgi1Z5IZHLK5EwOuAzd99vxJoyB-IfI"></script>-->

<script type="text/javascript">
$(document).ready(function(e) {

//loading Map	
		

var image = "../Images/loc.png";
geocoder = new google.maps.Geocoder();
var address = $('#Results span:first').text();



function initialize() {
		  // styles
 		
var styles = [
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#00bbb5" }
    ]
  },{
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#00bbb5" }
    ]
  },{
    "featureType": "road.arterial",
    "elementType": "geometry.stroke",
    "stylers": [
      { "color": "#B7B8B8" },
      { "weight": 1 }
    ]
  },{
    "featureType": "road.local",
    "elementType": "geometry.stroke",
    "stylers": [
      { "color": "#B7B8B8" },
      { "weight": 0.6 }
    ]
  },{
    "featureType": "landscape.man_made"  }
];

// set up map first time
var mapOptions = { zoom: 11,  styles: styles };
var map = new google.maps.Map(document.getElementById("Map"), mapOptions); 

var first = $('#Results span:first').text();
  
  geocoder.geocode( { 'address': first}, function(results, status) 
  {
	if (status == google.maps.GeocoderStatus.OK) 
		{ 
		
		map.setCenter(results[0].geometry.location);
		}
		else{alert("Could not find this address"+status);}
  });
  
  
  
// to place Market

var test = $('#Results span');
	
	for(var i=0; i<test.length; i++)
	{
		var current = test[i].innerText;
		
  		geocoder.geocode( { 'address': current}, function(results, status) 
  		{
    		if (status == google.maps.GeocoderStatus.OK) 
			{		   
			  var marker = new google.maps.Marker({map: map, position: results[0].geometry.location, icon:image });
		 	} 
			else { alert('Could not display this address ' + status); }
		
  		});
	}
}
      
      google.maps.event.addDomListener(window, 'load', initialize);



// vars for search list	results
var distance = $('#Search_Fields2').offset().top;


	var Search_Fields2 = $('#Search_Fields2');
	var Register_links_2 = $('#Register_links_2');
	var Register_links_3 = $('#Register_links_3');
	var Main_Content = $('#Main_Content');
	var Map = $('#Map');
	var FootOffset = $('#Footer').offset().top-distance-Map.height()-32;
	
	var MapSet = FootOffset-100+'px';
	
	var SearchArea = $('#Search_Area_Input');
	var SearchNear = $('#Near_Area_Input');
	
$(window).scroll(function(e){
		
		
	if(window.pageYOffset > distance) 
	{	
		if(window.pageYOffset > FootOffset){Map.css({'position':'absolute','margin-top':MapSet});}
		else{ 
				if(distance > 110){Map.css({'position':'fixed','margin-top':'-145px'});}
				else{
					Map.css({'position':'fixed','margin-top':'-98px'});
					}
			}
		
		Search_Fields2.css({'position':'fixed', 'top':'0.1px','background-color':'rgb(231,235,236)', 'background-color':'rgba(231,235,236,0.9)'});
		Main_Content.css({'margin-top':'72px'});
		
		Register_links_2.css({'display':'block'});
		Register_links_3.css({'display':'block'});
		
		
	 }
	else if (window.pageYOffset < distance)
	{
		Search_Fields2.css({'position':'relative', 'top':'0px','background-color':'rgb(231,235,236)', 'background-color':'rgba(231,235,236,1)'});
		Main_Content.css({'margin-top':'0px'});
		Map.css({'position':'absolute','margin-top':'0px'});
		Register_links_2.css({'display':'none'});
		Register_links_3.css({'display':'none'}); 
	}
	
	
	});
	
	//endcoding json
	
	
});
</script>
</head>

<body>
<div id="wrapper">
<?php if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}
include("Blocks/Header.php");
include("Blocks/SearchBar.php");

?>
<div id="Main_Content">
	
    <div id="Sort">
            <p>SORT:
                    <div id="Sort_Drop_Down">
                        <select>
                            <option>Most Relevant</option>
                            <option>Most Recent</option>
                            <option>Most Popular</option>
                            <option>Most Latest</option>
                            <option>Most Ratest</option>
                        </select>
                    </div>
          </p>
	</div>
 <!--end of Sort field-->   
    
<!-- Results boxes-->
<div id="Results">
<?php include("DB/SearchQuery.php");?>
</div>

    				<!-- Map's block-->
                
                    	<div id="Map">
                        
                    	</div><!-- End of map block-->
         		
	</div> <!--end main content-->

<div style="clear:both; height:25px;"></div>
<?php include("Blocks/Footer.php");
include("Blocks/Copyright.php");?>
</div>
</body>
<script type="text/javascript" src="js/Timeout.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
</html>