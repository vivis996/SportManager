var map;
var markers = [];
var myMarker = [];
var latitud, longitud;
var myCenter=new google.maps.LatLng(51.508742,-0.120850);
function initMap() {
	map = new google.maps.Map(document.getElementById('googleMap'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 6,
		mapTypeControl:true,
		mapTypeControlOptions: {
			style:google.maps.MapTypeControlStyle.DROPDOWN_MENU
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	/*google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	});*/
	//var infoWindow = new google.maps.InfoWindow({map: map});
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
			//infoWindow.setPosition(pos);
			//infoWindow.setContent('Ubicación encontrada.');
			map.setZoom(11);
			map.setCenter(pos);
		}, function() {
			//handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		//handleLocationError(false, infoWindow, map.getCenter());
	}
	Concurrent.Thread.create(Hilo_Bounds);

	/*google.maps.event.addListener(map, 'bounds_changed', function() {
		Cambiar_Bounds();
	});*/
}

function Cambiar_Bounds(){
	changeSport("");
}

function Hilo_Bounds(){
	while(true){
		var BoundsChange = String(map.getBounds());
		if (dat != BoundsChange){
			changeSport("");
		}
	}
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
/*function placeMarker(location) {
	latitud = location.lat();
	longitud = location.lng();
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});
	var infowindow = new google.maps.InfoWindow({
		content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
	});
	//infowindow.open(map,marker);
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	google.maps.event.addListener(marker,'click',function() {
		map.setZoom(14);
		map.setCenter(marker.getPosition());
	});
	markers.push(marker);
}*/
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