@extends('layouts.main')

@section('content')
    <style>
       /* Set the size of the div element that contains the map */
#mapCanvas {
    width: 100%;
    height: 450px;
}
#map{
  height: 400px;
}
    </style>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> {{Auth::user()->role == 3?' Admin':''}} Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://drive.google.com/file/d/18iB3HIpV1wN0NnVmd7ulxobjBV_1Tb8O/view?usp=sharing">Download App</a></li>

              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@if($user->role =='3')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>
                  <?php
                 $count =  \App\User::where('role',2)->get()->count();      
                  
                  ?>
                  {{ $count}}
                </h4>

                <p>Total Pilots</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.pilot')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">


                <h4>
                  <?php
                    $count =  \App\Drone::get()->count();      
                  
                  ?>
                  {{ $count}}
                  <sup style="font-size: 20px"></sup></h4>

                <p>Registered Drones</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-plane"></i>
              </div>
              <a href="{{route('admin.drone')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Today's Flight<sup style="font-size: 20px"></sup></h4>

                <p>View All</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-plane"></i>
              </div>
              <a href="{{route('admin.map')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Flight Plan</h4>

                <p>View All</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.flightPlan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <div class=" card col-sm-12">
          <div class="card-body" id="mapCanvas">
             
           </div>
        </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
           
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

            <!-- Calendar -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

      <script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        ['MP Nagar, Bpl', 23.2313, 77.4326],
        ['Chetak Bridge, Bpl', 23.2344, 77.4354],
        ['New Market, Bpl', 23.2356, 77.4006],
        ['Motel Shiraj, Bpl', 23.2303, 77.4327],
        
    ];
                        
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
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
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

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
    </section>
@elseif($user->role!='3')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner"> 
               <h4>User Details</h4> 

                <p>Raman Singh</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('hello',1)}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Drone Images<sup style="font-size: 20px"></sup></h4>

                <p>5</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-plane"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Flights Taken</h4>

                <p>12</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      
            <!-- /.card -->


                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
               
            <!-- TO DO List -->

             <div class="card">
              <div class="card-header">Restricted Zone</div>
               <div class="card-body">
                 <div id="map"></div>
               </div>
             </div>
              <script>
      // This example creates circles on the map, representing populations in North
      // America.

      // First, create an object containing LatLng and population for each city.
      var citymap = {
        Airport: {
          center: {lat: 23.2908, lng: 77.3357},
          population: 300
        },

      };

      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 23.2908, lng: 77.3357},
          mapTypeId: 'terrain'
        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var city in citymap) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
          });
        }
      }
    </script>

             
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
           
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

            <!-- Calendar -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>




    @endif





   


    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqw66tVpzUXBspF_CttcalmI4xsZlCmPI&callback=initMap">
    </script>   
@endsection
