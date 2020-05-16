var getHttpRequest = function () {
  var httpRequest = false;

  if (window.XMLHttpRequest) { // Mozilla, Safari,...
    httpRequest = new XMLHttpRequest();
    if (httpRequest.overrideMimeType) {
      httpRequest.overrideMimeType('text/xml');
    }
  }
  else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) { }
    }
  }

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance XMLHTTP');
    return false;
  }

  return httpRequest
}

navigator.geolocation.getCurrentPosition(successHandler, errorHandler);

var latitude;
var longitude;

function successHandler(position) {

  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
}

// Error Handler
function errorHandler(positionError) {
  if (positionError.code == 1) { // PERMISSION_DENIED
    alert("Error: Permission Denied! " + positionError.message);
  } else if (positionError.code == 2) { // POSITION_UNAVAILABLE
    alert("Error: Position Unavailable! " + positionError.message);
  } else if (positionError.code == 3) { // TIMEOUT
    alert("Error: Timeout!" + positionError.message);
  }
}

function createMap() {
  L.mapquest.key = 'rnARviaGnSETNW3DJ1j9fBDLyKpGXIcl';

  var popup = L.popup();

  var map = L.mapquest.map('map', {
    center: [latitude, longitude],
    layers: L.mapquest.tileLayer('map'),
    zoom: 14
  });

  map.addControl(L.mapquest.control());

  var here = L.popup({ closeButton: false, closeOnClick: false })
    .setLatLng([latitude, longitude])
    .setContent("Vous êtes ici")
    .openOn(map);

  var markerD = L.marker([latitude, longitude])
    .addTo(map);

  markerD.bindPopup(here).openPopup();
  function generatePopupContent(error, response) {
    var location = response.results[0].locations[0];
    var city = location.adminArea5;
    var httpRequest = getHttpRequest();
    var chemin = "/map/" + city;
    httpRequest.open('GET', chemin, true);
    httpRequest.send();

    httpRequest.onreadystatechange = function () {

      if (httpRequest.readyState === 4) {
        var i;
        var arr = JSON.parse(httpRequest.responseText);
        for (i = 0; i < arr.length; i++) {
          var icone = L.icon({
            iconUrl: '/image/icone/' + arr[i].sport + '.png',
            iconSize: [20, 20], // size of the icon
          });

          var marker = L.marker([arr[i].latitude, arr[i].longitude],
            { icon: icone })
            .addTo(map)
            .bindPopup("<b> " + arr[i].name + " </b> <br> " + arr[i].address + "</br> <br> " + arr[i].city + "</br> ")
        }
      }
    }
  }
  L.mapquest.geocoding().reverse([latitude, longitude], generatePopupContent);
}

window.onload = function () {
  createMap();
}



