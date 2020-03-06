 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
             <style type="text/css">
          #map{ width:700px; height: 500px; }
        </style>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqw66tVpzUXBspF_CttcalmI4xsZlCmPI&callback=initMap">
    </script>  
 </head>
 <body>
    
  <div class="card-body">
    <div class="form-group">
        <label for="name">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
    </div>
    <div class="form-group" data-target="#myModal1" data-toggle="modal">
        <label for="name">Location</label>
        <input type="text" name="location" class="form-control" id="location" placeholder="Location">
    </div>
        <div class="form-group">
        <label for="lat">Latitude</label>
        <input type="text" name="lat" class="form-control" id="lat" placeholder="" readonly="yes">
    </div>
        <div class="form-group">
        <label for="lng">Longitude</label>
        <input type="text" name="lng" class="form-control" id="lng" placeholder="" readonly="yes">
    </div>
    <div class="form-group">
        <label for="zip_code">Zip code</label>
        <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Zip code">
    </div>
        <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="DD/MM/YYYY">
    </div>
    <div class="form-group">
        <label for="start_time">Time</label>
        <input name="start_time" type="time" class="form-control float-right" id="start_time" value="" >
        <input name="end_time" type="time" class="form-control float-right" id="end_time" value="" >
    </div>
    <div class="form-group">
        <label for="haight">Height</label>
        <input name="height" type="text" class="form-control" id="height" value="" placeholder="Height in metres">
    </div>
    
    <div class="form-group">
        <label>Purpose</label>
        <select name="purpose" class="form-control select2" style="width: 100%;">
            <option selected="selected" value="">Select Size</option>
            <option value='1'>Photography </option>
            <option value="2">Surveying</option>
            <option value="3">Inspection</option>
            <option value="4">Security Surveillance</option>
            <option value="5">Crowd Monitoring</option>
            <option value="6">Other</option>
        </select>
    </div>
    @if (Auth::user()->role == 1)
        <div class="form-group">
            <label>Select Pilots</label>
            <select name="pilot_id" class="form-control select2" style="width: 100%;">
                <option selected="selected">Select Pilots</option>
                @foreach ($pilots as $pilot)
                    <option value= {{$pilot->id}}>{{$pilot->name}} </option>
                @endforeach
            
            </select>
        </div>
    @endif

    <div class="form-group">
        <label>Select Drone</label>
        <select name="drone_id" class="form-control select2" style="width: 100%;">
            <option selected="selected">Select Drone</option>
            @foreach ($drones as $drone)
                <option value= {{$drone->id}}>{{$drone->name}} </option>
            @endforeach
           
        </select>
    </div>
</div>

<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>

 <div class="container">
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-sm"  >
            <div class="modal-content" style="width: 245%" >
              <div class="modal-header">
                <h2 class="modal-title" style="text-align: left; ">Select Location</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body noti-body"  style="height: 533px;" >
              
              <div id="map"></div>

              </div>               
              </div>
            </div>
          </div>
        </div>  

<script type="text/javascript">
    var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
 
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(23.2599, 77.4126);
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 12 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
}
        
        
//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);
</script>

 </body>
 </html>

