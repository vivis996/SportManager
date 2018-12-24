var map;
var anterior = "----";
var mapaActivado = false;
var myMarker = [];
var latitud, longitud;

function Lugar(){
    var value = document.getElementById("select").value;
    changeLugar(value);
}

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
	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	});
    Lugar();
}

function placeMarker(location) {
    if (!mapaActivado)
        return;
	deleteMarkers();
	latitud = location.lat();
	longitud = location.lng();
    
	Agregar(location, "Seleccionado");
    
    if (window.XMLHttpRequest) {
		alldeportes = new XMLHttpRequest();
	}
	else {
		alldeportes = new ActiveXObject("Microsoft.XMLHTTP");
	}
	alldeportes.open("GET","encuentro_google.php?id=" + -10 + "&la=" + latitud + "&lo=" + longitud,true);
	alldeportes.send();
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
	myMarker = [];
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
    map.setZoom(14);
    map.setCenter(pos);
}

function changeLugar(idLugar){
	if (window.XMLHttpRequest) {
		alldeportes = new XMLHttpRequest();
	}
	else {
		alldeportes = new ActiveXObject("Microsoft.XMLHTTP");
	}
	alldeportes.open("GET","encuentro_google.php?id=" + idLugar + "&la=" + 0 + "&lo=" + 0,true);
	alldeportes.send();
	Concurrent.Thread.create(readTextFile);
}

function readTextFile() {
	var allText = anterior;
	while (allText == anterior)
	{
		try {
			var file = "encuentro_google.txt";
		    var rawFile = new XMLHttpRequest();
		    rawFile.open("GET", file, false);
		    rawFile.onreadystatechange = function ()
		    {
		        if(rawFile.readyState === 4)
		        {
		            if(rawFile.status === 200 || rawFile.status == 0)
		            {
		                allText = rawFile.responseText;
		            }
		        }
		    }
		    rawFile.send(null);
		}
		catch(err) {}
	}
	clearMarkers(myMarker);
	anterior = allText;
	allText = allText.replace("\"", "");
	var ss = allText.split(";");
	for (var i = 0; i < ss.length; i++) {
		if (i != (ss.length - 1)) {
			var posi = ss[i].split(",");

			var posicion = {
				lat: parseFloat(posi[1]),
				lng: parseFloat(posi[2])
			};
			Agregar(posicion, posi[0]);
		}
	}
}