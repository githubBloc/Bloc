// JavaScript Document
$(document).ready(function(){

  function initialize() {
   var map_canvas = document.getElementById('Map');
      var mapOptions = {
      center: new google.maps.LatLng(44.5403, -78.5463),
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(map_canvas, mapOptions);
  }
  google.maps.event.addDomListener(window, 'load', initialize);
});
