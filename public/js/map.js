var prevMarker;
var prevLocation;
function initMap() {
    var myLatlng = new google.maps.LatLng(13.847860, 100.604274);
    var mapOptions = {
        center: myLatlng,
        zoom: 18,
    }
        
    var maps = new google.maps.Map(document.getElementById("map"),mapOptions);

    var infowindow = new google.maps.InfoWindow();

    var autocomplete = new google.maps.places.Autocomplete(document.getElementById("map-input"));
    autocomplete.bindTo('bounds', maps);

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();

        prevLocation = place;
        if (!place.geometry) {
        return;
        }

        if (place.geometry.viewport) {
        maps.fitBounds(place.geometry.viewport);
        } else {
        maps.setCenter(place.geometry.location);
        maps.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
        placeId: place.place_id,
        location: place.geometry.location
        });
        marker.setVisible(true);

        infowindow.setContent('<b>'+place.name+'</b><br><br>'+place.adr_address+'');
        infowindow.open(maps, marker);
    });

    var marker = new google.maps.Marker({
        draggable: false,
        position: prevLocation ? prevLocation.location :myLatlng
    });
    
    if(prevLocation) {
        marker.setPlace({
            placeId: prevLocation.place_id,
            location: prevLocation.geometry.location
        });
        marker.setVisible(true);

        infowindow.setContent('<b>'+prevLocation.name+'</b><br><br>'+prevLocation.adr_address+'');
        infowindow.open(maps, marker);
    }

    prevMarker = marker;

    google.maps.event.addListener(maps, 'click', function(event) {
        var marker = new google.maps.Marker({
            position: event.latLng,
            map: maps
        });
        if(event.placeId){
            prevMarker.setMap(null);
            getDetail(maps, event.placeId);
        }           
        else{
            infowindow.setContent('ไม่พบสถานที่');
            addMarker(maps, marker);
        }
        infowindow.open(maps, marker);

    });
    
        // Add a marker at the center of the map.
    addMarker(maps, marker);
}
function addMarker(map, marker) {

    prevMarker.setMap(null);
    prevMarker = marker;

    marker.setMap(map);
}
function getDetail(maps, myPlaceId) {
    var service = new google.maps.places.PlacesService(maps);

    service.getDetails({
        placeId: myPlaceId
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
        $('#map-input').val(place.name+' '+place.formatted_address);
        }
    });
}