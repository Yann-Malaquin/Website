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

    function generatePopupContent(error, response) {
        var location = response.results[0].locations[0];
        var city = location.adminArea5;
        var chemin = "/accueil/city=" + city;
        window.location.href = chemin;
    }

    L.mapquest.geocoding().reverse([latitude, longitude], generatePopupContent);
}

window.onload = function () {
    createMap();
}



