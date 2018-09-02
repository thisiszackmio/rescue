var customLabel = {
                'Emergency Report': {
                  label: 'E',
                },
                'Traffic Accident': {
                  label: 'T'
                },
                'Vehicular Accident': {
                  label: 'V'
                },
                'Flood Incident': {
                  label: 'F'
                },
                'Crime Incident': {
                  label: 'C'
                }
              };

                function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(8.2280, 124.2452),
                zoom: 13
                });
                var infoWindow = new google.maps.InfoWindow;

                // Change this depending on the name of your PHP or XML file
               downloadUrl('data/scan.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var time = markerElem.getAttribute('time');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = address
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = time
              infowincontent.appendChild(text);
              //var icon = customLabel[type] || {};
              var end_marker = ' http://icons.iconarchive.com/icons/icons-land/vista-map-markers/64/Map-Marker-Marker-Inside-Chartreuse-icon.png';

              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
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

      function doNothing(){}