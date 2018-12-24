var dato = "",
    anterior = "----",
    dat = "",
    enctor = "Enc\\Tor",
    tiempo = "Por jugar";
var contador = 0;

function changeSport(str) {
	var query_dimensiones = "";
	try {
		dat = String(map.getBounds());
        var dimen = dat.split("),"),
            dimenMIN = dimen[0].replace("((", "").split(","),
            dimenMAX = dimen[1].replace("(", "").replace("))", "").split(",");
		query_dimensiones += " and lugar.latitud>='" + dimenMIN[0] + "' and lugar.latitud<='" + dimenMAX[0] + "' and lugar.longitud>='" + dimenMIN[1] + "' and lugar.longitud<='" + dimenMAX[1] + "'";
	}
	catch (err) {}
	if ((!dato.includes(str + "-")) && (str !== "") && (str !== "--------")) {
		dato += str + "-";
	}
	var sport = '<div class="row-fluid">',
        consulta = '',
        ss = dato.split("-");
	for (var i = 0; i < ss.length; i++) {
		if (ss.length - 1 != i) {
			sport +=	'<div class="span9">';
			sport +=		'<div class="alert alert-info">';
			sport +=			'<button id="deporteActual" onclick="quitarDeportes(this.value)" value="' + ss[i] + '" type="button" class="close" data-dismiss="alert" title="Cerrar">&times;</button>';
			sport +=			'<h4>' + ss[i] + '</h4>';
			sport +=		'</div>';
			sport +=	'</div>';
			if (i == (ss.length - 1))
				consulta += "'" + ss[i] + "'";
			else
				consulta += "'" + ss[i] + "',";
		}
	}
	consulta = consulta.substring(0, consulta.length -1);
	sport += "</div>";

	if (window.XMLHttpRequest) {
		alldeportes = new XMLHttpRequest();
	}
	else {
		alldeportes = new ActiveXObject("Microsoft.XMLHTTP");
	}
	alldeportes.onreadystatechange = function() {
		if (alldeportes.readyState == 4 && alldeportes.status == 200) {
			document.getElementById("alldeportes").innerHTML = alldeportes.responseText;
		}
	};
	document.getElementById("selectdeportes").innerHTML = sport;
	alldeportes.open("POST","home_recarga.php?valor=" + consulta + "&dimensiones=" +query_dimensiones + "&enctor=" +enctor + "&tiemp=" + tiempo,true);
	alldeportes.send();
    contador++;
	Concurrent.Thread.create(readTextFile, 500);
	var combo = document.forms["filtraform"]["deportes"].value = "--------";
}

function quitarDeportes(datoSport) {
	dato = dato.replace(datoSport + "-", "");
	changeSport("");
	var combo = document.forms["filtraform"]["deportes"].value = "--------";
}

function changeEncTor(valor){
	enctor = valor;
	changeSport("");
}

function changeTiempo(valor){
    tiempo = valor;
    changeSport("");
}

function readTextFile() {
    while (contador > 0){
        var allText = anterior;
        while (allText == anterior) {
            try {
                var file = "home_recarga.txt";
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
        contador--;
        anterior = allText;
        clearMarkers(myMarker);
    }
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