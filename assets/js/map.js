navigator.geolocation.getCurrentPosition(successHandler, errorHandler);

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
    document.getElementById("city").value = city;

    window.location = "/test/" + city;


  }
  L.mapquest.geocoding().reverse([latitude, longitude], generatePopupContent);
}

window.onload = function () {
  createMap();
}



