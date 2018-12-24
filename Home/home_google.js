var map;
var markers = [];
var myMarker = [];
var latitud, longitud;
function initMap() {
	map = new google.maps.Map(document.getElementById('googleMap'), {
		center: {lat: 21.161454306107082, lng: -86.8275356295635},
		zoom: 6,
		mapTypeControl: true,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			var marker = new google.maps.Marker({
				position: pos,
				map: map
			});
			var infowindow = new google.maps.InfoWindow({
				content: 'Ubicación'
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
			google.maps.event.addListener(marker,'click',function() {
				map.setZoom(14);
				map.setCenter(marker.getPosition());
			});
			map.setZoom(11);
			map.setCenter(pos);
            changeSport("");
		});
	} else {
		// Browser doesn't support Geolocation
		//handleLocationError(false, infoWindow, map.getCenter());
	}
	changeSport("");
}

function Agregar(pos, texto){
	var marker = new google.maps.Marker({
		position: pos,
		map: map
	});
	var infowindow = new google.maps.InfoWindow({
		content: texto
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	google.maps.event.addListener(marker,'click',function() {
		map.setZoom(14);
		map.setCenter(marker.getPosition());
	});
	myMarker.push(marker);
}
function setMapOnAll(map, marcadores) {
	for (var i = 0; i < marcadores.length; i++) {
		marcadores[i].setMap(map);
	}
}
function clearMarkers(marcadores) {
	setMapOnAll(null, myMarker);
}
function deleteMarkers() {
	clearMarkers(myMarker);
	//markers = [];
	myMarker = [];
}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
}