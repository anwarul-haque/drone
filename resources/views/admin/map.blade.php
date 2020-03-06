@extends('layouts.main')
<style type="text/css">
	#mapCanvas {
    width: 100%;
    height: 450px;
}
</style>



@section('content')






<!-- print_r($dd); -->
 <div class="card-body" id="mapCanvas">
             
           </div>


           <script>

function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    // map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    // var markers = [
    //     [23.2313, 77.4326],
    //     [23.2344, 77.4354],
    //     [23.2356, 77.4006],
    //     [23.2303, 77.4327],
        
    // ];
      
      // console.log(markers);         
    // Info window content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h5>Drone Pilot: Rohit</h5>' +
        '<ul><li>Drone Type: Nano</li></ul>' + '</div>'],
        ['<div class="info_content">' +
        '<h5>Drone Pilot: Jarvis</h5>' +
        '<ul><li>Drone Type: Micro</li></ul>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h5>Drone Pilot: Anwar</h5>' +
        'Drone Type: Micro' +
        '</div>']
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    var url = '{{route("admin.getMap")}}';
      $.ajax({
        url: url,
        type: 'get',
        success: function(response)
        {
          //  var location = [];
          // $.each(response, function( index, value ) {
            
          //   location.push(Number(value.lat));
          //   location.push(Number(value.lng));
            
          // });
          //   console.log(location);
          //   // return location;\
          var markers = response;
          console.log(response);
            for( i = 0; i < markers.length; i++ ) {
                console.log(markers[i].lat+'  '+markers[i].lng);
        var position = new google.maps.LatLng(Number(markers[i].lat), Number(markers[i].lng));
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
        });
        


        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }
        }
      });
    // Place each marker on the map  


    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>

   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqw66tVpzUXBspF_CttcalmI4xsZlCmPI&callback=initMap">
    </script>  

@endsection