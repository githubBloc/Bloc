<?php include("Scripts/Sessions.php");
$id=$_GET['id'];
$db = mysql_connect("localhost","Eugene","12345") or die("Connection error:".mysql_error());
mysql_select_db("Bloc",$db);

$results = mysql_query("SELECT * FROM BizInfo WHERE id='$id'");
$row = mysql_fetch_array($results);


$Logo = mysql_query("SELECT LogoPic FROM FreePictures WHERE BizId='$id'");
$LogoPath = mysql_fetch_array($Logo);

$CounterResults = mysql_query("UPDATE BizInfo SET ClickTrueRate = ClickTrueRate + 1 WHERE id='$id'");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $row['Business_Name'];?></title>
<link href="CSS/css_styles.css" type="text/css" rel="stylesheet">
<link href="CSS/FreeProfile.css" type="text/css" rel="stylesheet">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNLgi1Z5IZHLK5EwOuAzd99vxJoyB-IfI"></script>
<script type="text/javascript" src="js/Timeout.js"></script>
<script type="text/javascript" src="js/LoginPassword.js"></script>
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

});
</script>
</head>

<body>
<div id="wrapper">
<?php if(isset($_SESSION['Email'])){include("Blocks/User_Header.php");}
include("Blocks/Header.php");
include("Blocks/SearchBar.php");?>
<div id="MainContent">

	<div id="BizInfo">
    	
        <div id="BizHeader">
        	<div id="Logo"><img src="<?php echo $LogoPath["LogoPic"];?>"></div>
        <h1><?php echo $row['Business_Name'];?></h1>
        <h2><span id="Address"><?php echo $row['Address'];?> <br><?php echo ucwords($row['City']);?>, <?php echo $row['State'];?> <?php echo $row['Zip_Code'];?></span><br><?php echo $row['Phone_Number'];?></h2><h3><?php echo $row['Business_Email'];?></h3> 
    	</div>
    
    			<div id="BizDetails">
        			<h1>BUSINESS DETAILS</h1>
                    <br>
       					
                     <h3>CATEGORIES: Coffee</h3>
        			
                </div>
 
 </div><!--End  BizInfo-->
					
                    
                    <!-- Map's block-->
                    <div id="Map">
                    </div><!-- End of map block-->


								
                                <!--Similar Listing-->
                                <div id="SimilarListing">
                                <h1>SIMILAR LISTINGS</h1>
                                <table>
                                	<tr><td><h2><a href="#">Crush Coffee</a></h2><h3>1101 34th Ave, Seattle WA 98122 <br> (206) 883-7656</h3></td></tr>
                                    <tr ><td id="Border"><h2><a href="#">Standart Coffee Service Company</a></h2><h3>1101 34th Ave, Seattle WA 98122 <br> (206) 883-7656</h3></td></tr>
                                    <tr><td><h2><a href="#">Pegasus Coffee Bar</a></h2><h3>1101 34th Ave, Seattle WA 98122 <br> (206) 883-7656</h3></td></tr>
                                </table>
                                </div>

</div><!--End Main Content-->
<?php include("Blocks/Footer.php");

include("Blocks/Copyright.php");
mysql_close($db);?>
</div>
</body>
</html>