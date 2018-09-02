<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="image/811.png" type="image/x-icon">
    <title>Map Incident</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <?php
  include('data/db.php');
  date_default_timezone_set("Asia/Manila");
    $id = $_GET['id'];
    $lat = $_GET['lat'];
    $long = $_GET['long'];
    $type = $_GET['type'];

    $sea = "SELECT * FROM incident WHERE incident_id='$id'";
    $err = mysqli_query($conn, $sea);

    $haha = mysqli_fetch_array($err);

    $stat = $haha['status'];

    if($stat == 'unseen'){
     $remove = "UPDATE incident SET status='seen', respond='1', read_ko='unread' WHERE incident_id='$id'";
     mysqli_query($conn, $remove); 
    }
  ?>  
  
    <div id="map" ></div>  
    <div style="height:15% auto; width:20% auto;background-color:lightgrey;border-radius:10px;margin:20px;padding:20px;">
      <p style="font-family:verdana;font-weight:bold;">Incident Type:</p> <font style="font-family:verdana;margin-left:20px;font-weight:bold;color:#f7584c;"><?php echo $type; ?>:</font>
      <?php
      $des = "SELECT description FROM incident WHERE incident_id='$id'";
      $rip = $conn->query($des);
      $row = mysqli_fetch_array($rip);
      ?>
      <p style="font-family:verdana;font-weight:bold;">Description: </p><font style="font-family:verdana;margin-left:20px;font-weight:bold;color:#f7584c;"><?php echo $row['description']; ?></font>
      <h3 style="font-family:verdana;font-weight:normal;"><a href="asign.php?in_id=<?php echo $id;?>">Assign Team to Rescue</a><h3>  
    </div>
      
      
    <div id="right-panel"></div>
    

    <input type="hidden" id="id" value="<?php echo $id; ?>" readonly>
    <input type="hidden" id="lat" value="<?php echo $lat; ?>" readonly>
    <input type="hidden" id="long" value="<?php echo $long; ?>" readonly>

    <script>
      function initMap() {

        var r_id = document.getElementById('id').value;
        var r_lat = document.getElementById('lat').value;
        var r_long = document.getElementById('long').value;
        var directionDisplay = new google.maps.DirectionsRenderer();
        var directionService = new google.maps.DirectionsService();
        var map_ko;
        var marker;
        var starter = new google.maps.LatLng(8.230254, 124.251380);
        var end = new google.maps.LatLng(r_lat, r_long);
        var movingIcon = new google.maps.MarkerImage('image/marker.png');

        var mapOptions = {
          zoom: 14,  
          center: end
        }
        
        map_ko = new google.maps.Map(document.getElementById('map'), mapOptions);
        directionDisplay.setMap(map_ko);
        directionDisplay.setPanel(document.getElementById('right-panel'));

        function calculateRoute(){
            var request = {
              origin: starter, 
              destination: end, 
              travelMode: 'DRIVING'
            };
        
            directionService.route(request, function(result, status){
                if (status == 'OK') {
                directionDisplay.setDirections(result);
                marker.addListener('click', toggleBounce);
                  }
             });

        }
     
        //Button on Map
        function CenterControl(controlDiv, map_ko){

        //border
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Detect The Direction';
        controlUI.appendChild(controlText);

        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener('click', function() {
          calculateRoute();
        });
        }
        var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map_ko);

        centerControlDiv.index = 1;
        map_ko.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
      }

        function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
              
        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

       function doNothing() {}


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjyT65cPbZZRQp5f5osvHDpd-LbQ33RUM&callback=initMap"
    async defer></script>
  </body>
</html>
