<?php
global $location;
$start_location = get_field('start_location');
if( !empty($location) ):
    ?>
    <div class="acf-map">
        <div class="marker"
             data-lat="<?php echo $location['lat']; ?>"
             data-lng="<?php echo $location['lng']; ?>"
             data-icon="<?= ASSETS_PATH ?>images/marker.png">
            <h1><?= $location['address'] ?></h1>
        </div>
        <?php if ( $start_location ) : ?>
            <div class="marker"
                 data-lat="<?php echo $start_location['lat']; ?>"
                 data-lng="<?php echo $start_location['lng']; ?>"
                 data-resize="true"
                 data-icon="<?= ASSETS_PATH ?>images/start-marker.png">
                <h1><?= $start_location['address'] ?></h1>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
function gg_map_scripts(){
    global $acf_option;
    ?>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=<?= $acf_option['google_map_api_key'] ?>"></script>
    <script defer>
        (function($) {

            /*
            *  new_map
            *
            *  This function will render a Google Map onto the selected jQuery element
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	$el (jQuery element)
            *  @return	n/a
            */

            function new_map( $el ) {
                // var
                var $markers = $el.find('.marker');
                var zoom = $el.parent().attr('data-zoom');

                // vars
                var args = {
                    zoom : parseInt(zoom),
                    center : new google.maps.LatLng(0, 0),
                    // mapTypeId	: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true,
                    styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station.rail",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                },
                                {
                                    "saturation": "-100"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ]
                };


                // create map
                var map = new google.maps.Map( $el[0], args);

                // add a markers reference
                map.markers = [];

                // add markers
                $markers.each(function(){
                    add_marker( $(this), map );
                });


                // center map
                center_map( map );


                // return
                return map;

            }

            /*
            *  add_marker
            *
            *  This function will add a marker to the selected Google Map
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	$marker (jQuery element)
            *  @param	map (Google Map object)
            *  @return	n/a
            */

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
                var iconCustom = $marker.attr('data-icon');

                if ($marker.attr('data-resize')) {
                    iconCustom = {
                        url: $marker.attr('data-icon'), // url
                        scaledSize: new google.maps.Size(32, 15), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(7, 7) // anchor
                    };
                }

                // create marker
                var marker = new google.maps.Marker({
                    position	: latlng,
                    icon        : iconCustom,
                    map			: map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content		: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            /*
            *  center_map
            *
            *  This function will center the map, showing all markers attached to this map
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	4.3.0
            *
            *  @param	map (Google Map object)
            *  @return	n/a
            */

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length == 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 12 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            /*
            *  document ready
            *
            *  This function will render each map when the document is ready (page has loaded)
            *
            *  @type	function
            *  @date	8/11/2013
            *  @since	5.0.0
            *
            *  @param	n/a
            *  @return	n/a
            */
            // global var
            var map = null;

            $(document).ready(function(){

                $('.acf-map').each(function(){

                    var $markers = $(this).find('.marker');

                    // create map
                    map = new_map( $(this) );

                    // Draw line
                    if ( $markers.length > 1 ) {
                        var data = [];

                        $markers.each(function(){
                            var item = [];
                            item['lat'] = $(this).attr('data-lat');
                            item['lng'] = $(this).attr('data-lng');
                            data.push(item);
                        });

                        var directionsDisplay;
                        var directionsService = new google.maps.DirectionsService();
                        directionsDisplay = new google.maps.DirectionsRenderer();
                        directionsDisplay.setMap(map);

                        var start = new google.maps.LatLng(data[1]['lat'], data[1]['lng']);
                        var end = new google.maps.LatLng(data[0]['lat'], data[0]['lng']);
                        var request = {
                            origin: start,
                            destination: end,
                            travelMode: google.maps.TravelMode.WALKING
                        };
                        directionsService.route(request, function(response, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                directionsDisplay.setDirections(response);
                                directionsDisplay.setMap(map);
                                directionsDisplay.setOptions( { suppressMarkers: true } );
                            } else {
                                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
                            }
                        });
                    }

                });

            });

        })(jQuery);
    </script>
    <?php
}

add_action( 'wp_footer', 'gg_map_scripts', 100, 1 );
