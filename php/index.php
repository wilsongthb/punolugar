<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
      <link href="../css/styles.css" rel="stylesheet">
    <style>
      

      #map {
        height: 75%;
      }
       #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
     <?php 
         
      echo "<div class='titular'  >PUNO CIUDAD TURISTICA</div>
      <button type='submit' id='enviar' class='btn btn-alert'>Presionar el marcador del mapa para visualizar descripcion de la Base De Datos</button><br>
     
      ";
     
      ?>
  </head>

  <body>
    
    <div id="map"></div>
    <div id="legend"><h3>Legend</h3></div>


    <script>
      var customLabel = {
        isla: {
          label: 'I'
        },
        plaza: {
          label: 'P'
        },
        atractivo: {
          label: 'A'
        },
         mirador: {
          label: 'M'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-15.836085, -70.023738), 
          zoom: 14
        });

         var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          parque: {
            name: 'Parque',
            icon: iconBase + 'parking_lot_maps.png'
          },
          museo: {
            name: 'Museo',
            icon: iconBase + 'library_maps.png'
          },
          info: {
            name: 'Ayuda',
            icon: iconBase + 'info-i_maps.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng(-15.840088,  -70.027713),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-15.840464,-70.028614),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-15.83566,  -70.023491),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-15.835253, -70.014900),
            type: 'info'
          },  {
            position: new google.maps.LatLng(-15.83785, -70.027875),
            type: 'parque'
          }, {
            position: new google.maps.LatLng(-15.838622,  -70.024214),
            type: 'parque'
          }, {
            position: new google.maps.LatLng(-15.824470,  -70.017376),
            type: 'parque'
          }, {
            position: new google.maps.LatLng(-15.839072,  -70.023108),
            type: 'parque'
          }, {
            position: new google.maps.LatLng(-15.840521,  -70.029017),
            type: 'museo'
          }, {
            position: new google.maps.LatLng(-15.838295, -70.022346),
            type: 'museo'
          }, {
            position: new google.maps.LatLng(-15.835757,  -70.015355),
            type: 'museo'
          }, {
            position: new google.maps.LatLng(-15.841866, -70.029234),
            type: 'museo'
          }
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });

        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }

        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

        var infoWindow = new google.maps.InfoWindow;

         
          downloadUrl('formato.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('direccion');
              var type = markerElem.getAttribute('tipo');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
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

      function doNothing() {}
     
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5LyJgUAvKrx7EUMCC3nQ_YDEJ10Maq8s&callback=initMap">
    </script>
  </body>
</html>