<style>
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

#map {
    height: 100%;
}

#map-container {
  position: fixed;
  bottom: 0px;
  right: 0px;
    height: 30em;
    width: 40%;
    z-index: 165;

}


/* Optional: Makes the sample page fill the window. */

html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

#description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
}

#infowindow-content .title {
    font-weight: bold;
}

#infowindow-content {
    display: none;
}

#map #infowindow-content {
    display: inline;
}

.pac-card {
    width: 70%;
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
}

#pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
}


#pac-input {
  
    z-index: 165;
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 100%;
}

#pac-input:focus {
    border-color: #4d90fe;
}

#title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
}
#place-icon{
  width: 16px !important;
}
</style>

<div id="map-container" style="display: none;" >
    <div class="pac-card" id="pac-card">
        <div>
            <div id="title">
                Nhập vào địa chỉ
            </div>
        </div>
        <div id="pac-container" class="form-group">

            <input id="pac-input" type="text" placeholder="Enter a location">
        </div>

            <button type="button" id="sendplace">Submit</button>
            <button type="button" id="close">Close</button>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
        <img src="" width="16" height="16" id="place-icon">
        <span id="place-name" class="title"></span>
        <br>
        <span id="place-address"></span>
    </div>
</div>
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
var map;
var autocomplete;
var address = '';
var infowindow;
var marker;
var infowindowContent;
var latlng;
var input;
var place;
var directionsDisplay;
var directionsService;
var ori;
var des;
var distance;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 10.773893, lng: 106.6597824 },
        zoom: 15
    });
    var card = document.getElementById('pac-card');
    

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
    input = document.getElementById('pac-input');
    autocomplete = new google.maps.places.Autocomplete(input);
    //directions
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsService = new google.maps.DirectionsService;
    directionsDisplay.setMap(map);
    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);

    infowindow = new google.maps.InfoWindow();
    infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        latlng = place.geometry.location;
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        //direc
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || ''),
                (place.address_components[3] && place.address_components[3].short_name || '')
            ].join(', ');
        }

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
        ori = latlng;
        infowindow.close();
        marker.setVisible(false);
        calculateAndDisplayRoute(directionsService, directionsDisplay,ori,des);

    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.




}

function calculateAndDisplayRoute(directionsService, directionsDisplay,ori) {
        directionsService.route({
          origin: ori,  // Haight.
          destination: des,  // Ocean Beach.

          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode["DRIVING"]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
            console.log(response.routes[0].legs[0].distance.value);
            return response.routes[0].legs[0].distance.value;
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
$("#close").click(function() {
     $('#map-container').css('display', 'none');
});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH73S3PCY9adNi4uCdJipUhcfVWzNYUdw&libraries=places&callback=initMap" async defer></script>
<!-- <script>
      $("#popup").click(function(){
    
            $('#map-container').css('visibility','visible');
        });
    </script> -->