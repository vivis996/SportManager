<?php
	require_once("conexion.php");
	$sql_Deportes = "SELECT Nombre_Deporte FROM deporte";
	$deportes = mysql_db_query($bd, $sql_Deportes, $con);
	$file = fopen("archivo.txt", "w");
	fwrite($file, "----". PHP_EOL);
	fclose($file);
?>

<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="js" href="js/bootstrap.min.js">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		
	</head>
	<body>
		<div class="container">
			<div class="span12">
				<div class="page-header">
					<h1>Eventos y torneos</h1>
				</div>
			</div>
			<div class="span12" style="">
				<div class="span9" style="margin-left:0px;">
					<div class="page-header">
						<h2>Eventos</h2>
					</div>
					<ul id="alldeportes" class="thumbnails"></ul>
				</div>
				<div class="span3" style="margin-left:15px;">
					<div class="page-header">
						<h2>Filtrado</h2>
					</div>
					
					<div id="googleMap" style="width:250px;height:250px;"></div>
					<form name="filtraform" action="filtrado">
			        	<label>Tipo</label>
			        	<select>
			        		<option value="Enc\Tor">Encuentros\Torneos</option>
			        		<option value="Encuentros">Encuentros</option>
			        		<option value="Torneos">Torneos</option>
			        	</select>
						<label>Deporte</label>
			        	<select name="deportes" onchange="changeSport(this.value)">
			        		<option value="--------">--------</option>
			        		<?php
				        		while ($res = mysql_fetch_array($deportes))
								{
									echo "<option value=\"".$res["Nombre_Deporte"]."\">".$res["Nombre_Deporte"]."</option>";
								}
							?>
			        	</select>
			        	<div class="span3" id="selectdeportes"></div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		<div id="lalo"></div>
		<div class="span12">&nbsp;</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script src="google.js"></script>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoFb5L_04-60bVlMOtuR-Dewd6x-ly2Ao&callback=initMap"></script>
		<script src="home_recarga.js"></script>
		<script src="js/Concurrent.Thread.js"></script>
	</body>
</html>