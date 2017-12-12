<script>
                    var markers = [];
                    function setMapOnAll(map) {
                      for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                      }
                    }
                    //Removes the markers from the map, but keeps them in the array.
                    function clearMarkers() {
                      setMapOnAll(null);
                    }

                    // Shows any markers currently in the array.
                    function showMarkers() {
                      setMapOnAll(map);
                    }

                    // Deletes all markers in the array by removing references to them.
                    function deleteMarkers() {
                      clearMarkers();
                      markers = [];
                    }
                    $("#tbody").on("click","#{{$product->id}}x",function() {
                        directionsDisplay.setMap(null);
                        deleteMarkers();
                        $('#map-container').css('display', 'block');
                        $("#pac-input").val("");
                        $("#pac-input").focus();
                        google.maps.event.trigger(map, 'resize');
                        map.setCenter(new google.maps.LatLng{{$product->xuat_phat}});
                        var marker{{$product->id}}x = new google.maps.Marker({
                            map: map,
                            anchorPoint: new google.maps.Point(0, -29)
                        });

/*
                        var infowindow{{$product->id}}x = new google.maps.InfoWindow();
                        infowindow{{$product->id}}x.close();
                        marker{{$product->id}}x.setVisible(false);
                        $("#infowindow-content").after('<div id="{{$product->id}}xinfowindow-content"><img src="" width="16" height="16" id="{{$product->id}}xplace-icon"><span id="{{$product->id}}xplace-name" class="title"></span><br><span id="{{$product->id}}xplace-address"></span></div>');
                        var infowindowContent{{$product->id}}x = document.getElementById('{{$product->id}}xinfowindow-content');
                        infowindow{{$product->id}}x.setContent(infowindowContent{{$product->id}}x);
                        marker{{$product->id}}x.setPosition(new google.maps.LatLng{{$product->xuat_phat}});
                        marker{{$product->id}}x.setVisible(true);
                        markers.push(marker{{$product->id}}x);

                        infowindowContent{{$product->id}}x.children['{{$product->id}}xplace-icon'].src = "/assets/images/ui/map_marker.png";
                        infowindowContent{{$product->id}}x.children['{{$product->id}}xplace-name'].textContent = "{{$product->xuat_phat_details}}";
                        infowindowContent{{$product->id}}x.children['{{$product->id}}xplace-address'].textContent = "{{$product->xuat_phat_details}}";
                        infowindow{{$product->id}}x.open(map, marker{{$product->id}}x);*/

                        directionsDisplay = new google.maps.DirectionsRenderer;
                        directionsService = new google.maps.DirectionsService;
                        directionsDisplay.setMap(map);
                        ori = new google.maps.LatLng(10.7734543,106.6598146);
                        des = new google.maps.LatLng{{$product->xuat_phat}};
                        // infowindow{{$product->id}}x.close();
                        // marker{{$product->id}}x.setVisible(false);

                        calculateAndDisplayRoute(directionsService, directionsDisplay,ori,des);

                    });
                    $("#tbody").on("click","#{{$product->id}}d",function() {
                        directionsDisplay.setMap(null);
                      deleteMarkers();
                        $('#map-container').css('display', 'block');
                        $("#pac-input").val("");
                        $("#pac-input").focus();
                        google.maps.event.trigger(map, 'resize');
                        map.setCenter(new google.maps.LatLng{{$product->dich_den}});
                        var marker{{$product->id}}d = new google.maps.Marker({
                            map: map,
                            anchorPoint: new google.maps.Point(0, -29)
                        });


                        /*var infowindow{{$product->id}}d = new google.maps.InfoWindow();
                        infowindow{{$product->id}}d.close();
                        marker{{$product->id}}d.setVisible(false);
                        $("#infowindow-content").after('<div id="{{$product->id}}dinfowindow-content"><img src="" width="16" height="16" id="{{$product->id}}dplace-icon"><span id="{{$product->id}}dplace-name" class="title"></span><br><span id="{{$product->id}}dplace-address"></span></div>');
                        var infowindowContent{{$product->id}}d = document.getElementById('{{$product->id}}dinfowindow-content');
                        infowindow{{$product->id}}d.setContent(infowindowContent{{$product->id}}d);
                        marker{{$product->id}}d.setPosition(new google.maps.LatLng{{$product->dich_den}});
                        marker{{$product->id}}d.setVisible(true);
                        markers.push(marker{{$product->id}}d);
                        infowindowContent{{$product->id}}d.children['{{$product->id}}dplace-icon'].src = "/assets/images/ui/map_marker.png";
                        infowindowContent{{$product->id}}d.children['{{$product->id}}dplace-name'].textContent = "{{$product->dich_den_details}}";
                        infowindowContent{{$product->id}}d.children['{{$product->id}}dplace-address'].textContent = "{{$product->dich_den_details}}";
                        infowindow{{$product->id}}d.open(map, marker{{$product->id}}d);*/
                        directionsDisplay = new google.maps.DirectionsRenderer;
                        directionsService = new google.maps.DirectionsService;
                        directionsDisplay.setMap(map);
                        ori = new google.maps.LatLng(10.7734543,106.6598146);
                        des = new google.maps.LatLng{{$product->dich_den}};
                        /*infowindow{{$product->id}}d.close();
                        marker{{$product->id}}d.setVisible(false);*/

                        calculateAndDisplayRoute(directionsService, directionsDisplay,ori,des);
                 
                    });
                    
                    </script>