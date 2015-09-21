<?php include("Scripts/Sessions.php");
 
if(!isset($_GET['id'])){echo "Your request is not correct"; exit;}

$id=$_GET['id'];
$db = mysql_connect("localhost","Eugene","12345") or die("Connection error:".mysql_error());
mysql_select_db("Bloc",$db);

$results = mysql_query("SELECT * FROM BizInfo WHERE id='$id'");
$row = mysql_fetch_array($results);


$Logo = mysql_query("SELECT * FROM PremiumPictures WHERE BizId='$id'");
$Pictures = mysql_fetch_array($Logo);

$CounterResults = mysql_query("UPDATE BizInfo SET ClickTrueRate = ClickTrueRate + 1 WHERE id='$id'");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $row['Business_Name'];?></title>
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<link href="CSS/PremiumProfile.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNLgi1Z5IZHLK5EwOuAzd99vxJoyB-IfI"></script>
<script type="text/javascript">

$(window).ready(function() {

//loading Map
geocoder = new google.maps.Geocoder(); 		
var address = $('#Address').text();
var image = "../Images/loc.png";
 
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


  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
		  
		  var mapOptions = {
          zoom: 11,
		  center: results[0].geometry.location,
		  styles: styles
       };
		   
		   var map = new google.maps.Map(document.getElementById("Map"),
           mapOptions);
		   
      var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location,
	  icon: image
    });
    } else {
      alert('Could not display this address ' + status);
   }
  });
}
      
      google.maps.event.addDomListener(window, 'load', initialize);

//slide show

$("#Stack > img:gt(0)").hide();
function checkMouseOver (id){if (id.length != 0) {return true;}else{return false;}
	}

setInterval(function() { 
  if(!checkMouseOver($('#carousel:hover'))){
  $('#Stack > img:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#Stack');}else{}
},  5000);




/*Click prev/next button*/
$('#RightArrow').click(function(e) {
    $('#Stack img:first').fadeOut().next().fadeIn().end().appendTo('#Stack');
});

$('#LeftArrow').click(function(e) {
    $('#Stack img:first').fadeOut();
	$('#Stack img:last').prependTo('#Stack');
	$('#Stack img:first').fadeIn();
});
/*Gallery Pictures Row*/
var ulGalRow = $('#GalPicRow li');
var GalPicRow = ulGalRow.length*195;
var GalPicRowUl = $('#GalPicRow ul');
$('#GalPicRow ul').css('width',GalPicRow);

setInterval(function(){
	if(!checkMouseOver($('#GalPicRow:hover'))){
        GalPicRowUl.animate({marginLeft:-195.9},function(){
            $(this).find("li:last").after($(this).find("li:first"));
            $(this).css({marginLeft:0});
        })}else{}
    },5000);	
	
/*Click prev/next button for GalRow*/

$('#RightArrow2').click(function(e) {
    
	        GalPicRowUl.find("li:last").after(GalPicRowUl.find("li:first"));
            GalPicRowUl.css({marginLeft:0});
        
});



$('#LeftArrow2').click(function(e) {

GalPicRowUl.find("li:first").before(GalPicRowUl.find("li:last"));
   /*GalPicRowUl.animate({marginLeft:195.9},1000,function(){*/
	  
            GalPicRowUl.css({marginLeft:0});
        
});



// Search Query
$('#Search_Button_li').click(function (){
	  
	  		
	  
			  if(SearchArea.val()=="" && SearchNear.val()=="")
			 	 {
				  SearchArea.css('border-color','red').attr('placeholder','Type any query here');
				  SearchNear.css('border-color','red').attr('placeholder','Type any City/Location here');;
				
				  }
			  else
			  	{
					$('#Results').remove(".Result_Box");
					
					 $.ajax({
						 type:"POST",
						 url:"DB/SearchQuery.php",
						 data: {SearchQuery: SearchArea.val(), SearchNear: SearchNear.val()},
						 success: function (callback)
						 { 
						 $('#Results').html(callback); 
						 FootOffset = $('#Footer').offset().top-distance-Map.height()-36;
						 MapSet = FootOffset-100;
						 },
						 error: function (e){$('#Results').html(e);}
							});
			  	}
	  });

});
</script>
</head>

<body>
<div id="wrapper">
<?php if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}
include("Blocks/Header.php");
include("Blocks/SearchBar.php");?>
<div id="MainContent">

	<!--Short Biz Info on left div-->
    <div id="BizInfo">
        <div id="Logo"><img src="<?php echo $Pictures["LogoPic"];?>"></div>
        <h1><?php echo $row['Business_Name'];?></h1>
        <h2><span id="Address"><?php echo $row['Address'];?> <br><?php echo ucwords($row['City']);?>, <?php echo $row['State'];?> <?php echo $row['Zip_Code'];?></span><br><span style="color:#e74c3c;">$$</span><br><?php echo $row['Phone_Number'];?></h2>
        <a href="#"><?php echo $row['Web_Address'];?></a>
        <ul id="SocialLinks">
        <li><a href="http://<?php if(isset($row['Google_Plus_URL'])) {echo $row['Google_Plus_URL'];}else{echo "#";}?>"><img src="Images/google.png"></a></li>
        <li><a href="http://<?php if(isset($row['Facebook_URL'])) {echo $row['Facebook_URL'];}else{echo "#";}?>"><img src="Images/facebook.png"></a></li>
        <li><a href="http://<?php if(isset($row['Twitter_URL'])) {echo $row['Twitter_URL'];}else{echo "#";}?>"><img src="Images/twitter.png"></a></li>
        </ul>
    </div>
    <!-------------------------------------------------------->            
                    
                    <div id="carousel">
                    
                        	<span class="PreNext" id="LeftArrow" style="margin:175.5px 0px 0px 0px;"></span>
                            <span class="PreNext" id="RightArrow" style="margin:175.5px 0px 0px 544.8px;"></span>
           					
                         <div id="Stack">
                            <img src="<?php echo $Pictures["1Pic"];?>" />
                            <img src="<?php echo $Pictures["2Pic"];?>" />
                            <img src="<?php echo $Pictures["3Pic"];?>" />
                            <img src="<?php echo $Pictures["4Pic"];?>" />
                            <img src="<?php echo $Pictures["5Pic"];?>" />
                            <img src="<?php echo $Pictures["6Pic"];?>" />
                            <img src="<?php echo $Pictures["7Pic"];?>" />
                        </div>
                    </div>

					
                     <div id="GalPicRow">
                       	
                        	<span class="PreNext" id="LeftArrow2" style="margin:50.5px 0px;"></span>
                            <span class="PreNext" id="RightArrow2" style="margin:50.5px 0px 0px 933px;"></span>
                  
                        <ul>
                           <li><img src="<?php echo $Pictures["1Pic"];?>" /></li>
                           <li><img src="<?php echo $Pictures["2Pic"];?>" /></li> 
                           <li><img src="<?php echo $Pictures["3Pic"];?>" /></li> 
                           <li><img src="<?php echo $Pictures["4Pic"];?>" /></li> 
                           <li><img src="<?php echo $Pictures["5Pic"];?>" /></li> 
                           <li><img src="<?php echo $Pictures["6Pic"];?>" /></li> 
                           <li><img src="<?php echo $Pictures["7Pic"];?>" /></li>  
						</ul>
                      </div>   
	
<div id="BizContent">
        <div id="BizDetails">
        	
                    <table id="Table">
                    	<tr>
                        <td><h1>BUSINESS DETAILS</h1></td><td><h3>Coffee Shop | French Bakery</h3></td>
                        </tr>
                    	<tr>
                        <td><h2>HOURS: </h2></td> <td><h3>Mon - Fri 11:00 am - 12:00 am</h3><h3>Sat 12:00 pm - 10:00 pm</h3><h3>Sun 12:00 pm - 12:00 am</h3></td>
                        </tr>
                        <tr>
                        <td><h2>PAYMENT METHODS: </h2></td> <td><h3>Amex, Visa, Master Card, Discovery</h3></td>
                        </tr>
            			<tr>
                    	<td><h2>PRODUCTS OFFERED: </h2></td> <td><h3>Coffee, Tea, Sandwiches, Pastries</h3></td>
                    	</tr>
                        <tr>
                        <td><h2>CATEGORIES: </h2></td> <td><h3>Coffee, Tea, Coffee Shop, Bakeries, Pastries, <br> Sandwiches, Restaurants, Tea Rooms</h3></td>
        				</tr>
                    </table>
		</div>    
    		
            <div id="Menue">
           	<h1>MENUE</h1>
            <table id="Table2">
            	<tr><td><h2>Caramel Latte</h2></td><td><h3>$3.25 - $4.95</h3></td></tr>
                <tr><td><h2>Vanilla Latte</h2></td><td><h3>$3.25 - $4.95</h3></td></tr>
                <tr><td><h2>Espresso</h2></td><td><h3>$3.25 - $4.95</h3></td></tr>
                <tr><td><h2>Mocha Latte</h2></td><td><h3>$3.25 - $4.95</h3></td></tr>
                <tr><td><h2>Hot Chocolate</h2></td><td><h3>$3.25 - $4.95</h3></td></tr>
            </table>
            <p style="text-align:right"><a href="#">VIEW FULL MENUE >></a></p>
            
            </div>
    			
                <div id="About">
                <h1>ABOUT OUR COMPANY</h1>
                <h4><?php echo $row['About_Company'];?></h4>
                
                </div>
    
 	</div>
    
    
    											<!--Map-->
                                                <div id="Map">
                     							                           
                                                
                                                </div>



	<!--More Business Information-->
    <div id="MoreBizInfo">
        <h1>MORE BUSINESS INFORMATION</h1>
        <h3>Take reservation | <strong>No</strong></h3>
        <h3>Delivery | <strong>No</strong></h3>
        <h3>Take out | <strong>Yes</strong></h3>
        <h3>Parking | <strong>Yes</strong></h3>
        <h3>Wheel Chair access | <strong>Yes</strong></h3>
        <h3>Good for kids | <strong>Yes</strong></h3>
        <h3>Good for group | <strong>Yes</strong></h3>
        <h3>Attire | <strong>Casual</strong></h3>
        <h3>Noise level | <strong>Average</strong></h3>
        <h3>Ourdoor seating | <strong>Yes</strong></h3>
        <h3>WiFi | <strong>Free</strong></h3>
        <h3>Has TV | <strong>No</strong></h3>
        <h3>Waiter service | <strong>No</strong></h3>
    </div>
			
            
</div>
<?php include("Blocks/Footer.php");
include("Blocks/Copyright.php");
mysql_close($db);
?>

</div>

<script type="text/javascript" src="js/Timeout.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
</body>
</html>