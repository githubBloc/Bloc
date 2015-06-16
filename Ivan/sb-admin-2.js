
$(function () {

    var homeLatLng = new google.maps.LatLng(homeCoordinate[0], homeCoordinate[1]);

    var locations = [];

    var mapOptions = {
        center: homeLatLng,
        zoom: 8
    };
    var map = new google.maps.Map(document.getElementById("gmap"),
        mapOptions);

    var marker = new google.maps.Marker({
        position: homeLatLng,
        map: map,
        title: "My Location",
        icon: mapImgHome
    });

    function addLocation(name, lat, lon) {

        return [latLng, marker];
    }

    $('.search-result-item').each(function () {
        var that = $(this);
        var name = that.find('.business-name').text();
        var id = that.attr('data-id');
        var lat = that.attr('lat');
        var lon = that.attr('lon');

        console.log('Location for: '+name+', lat='+lat+',lon='+lon);

        var latLng = new google.maps.LatLng(lat, lon);
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: name
        });

        that.hover(function() {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }, function() {
            marker.setAnimation(null);
        });
    });
});

