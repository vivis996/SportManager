<?php 
	$valor = $_GET['valor'];
	$enctor = $_GET['enctor'];
    $tiempo = $_GET['tiemp'];
    $tiempEncuentro = "";
    $tiempTorneo = "";
	$contador = 0;
	$dimensiones = $_GET['dimensiones'];
	require_once("conexion.php");
	$fecha_actual = date("Y/m/d");
    if ($tiempo == "Por jugar"){
        $tiempEncuentro = " and encuentro.Fecha>='".$fecha_actual."'";
        $tiempTorneo = " and FechaFin >= '".$fecha_actual."' ";
    }
    if ($tiempo == "Pasados"){
        $tiempEncuentro = " and encuentro.Fecha<='".$fecha_actual."'";
        $tiempTorneo = " and FechaFin <= '".$fecha_actual."' ";
    }

	$sql_Encuentros = "SELECT idEncuentro,encuentro.Nombre as 'encuentro', Fecha, HoraIni, deporte.Nombre_Deporte, equipo.Nombre as 'retador', 
	lugar.Nombre as 'lugar' FROM encuentro, deporte, lugar, equipo WHERE encuentro.id_Lugar=lugar.idLugar AND 
	deporte.idDeporte=encuentro.idDeporte AND equipo.idEquipo=encuentro.idEquipo_Retador and encuentro.idTorn='0' ".$tiempEncuentro.$dimensiones;

	$sql_lalo = "SELECT encuentro.Nombre as 'encuentro',lugar.latitud,lugar.longitud FROM encuentro, deporte, lugar, equipo 
	WHERE encuentro.id_Lugar=lugar.idLugar AND deporte.idDeporte=encuentro.idDeporte AND equipo.idEquipo=encuentro.idEquipo_Retador  and encuentro.idTorn='0' ".$tiempEncuentro.$dimensiones;

	$sql_torneos = "SELECT torneo.idTorneo, torneo.Nombre, deporte.Nombre_Deporte, concat(usuarios.Nombre,\" \",usuarios.Apellidos_Paterno) AS 'Organizador', Inscripcion, FechaInicio, FechaLimiteEquipo FROM torneo, deporte, usuarios WHERE torneo.idOrganizador = usuarios.idUsuario AND torneo.idDeporte = deporte.idDeporte ".$tiempTorneo;

	$file = fopen("home_recarga.txt", "w");
	fwrite($file, "-----". PHP_EOL);
	fclose($file);
	if ($valor != "") {
		$sql_Encuentros = $sql_Encuentros." and deporte.Nombre_Deporte in (".$valor.")";
		$sql_lalo = $sql_lalo." and deporte.Nombre_Deporte in (".$valor.")";
		$sql_torneos = $sql_torneos." and deporte.Nombre_Deporte in (".$valor.")";
	}
	$sql_torneos = $sql_torneos." ORDER BY torneo.idTorneo ASC";
	$encuentros = mysql_db_query($bd,$sql_Encuentros,$con);
	$torneos = mysql_db_query($bd,$sql_torneos, $con);
	if ($enctor == "Encuentros" || $enctor == "Enc\Tor") {
		$lalo = mysql_db_query($bd,$sql_lalo,$con);	
		$Todo = "\"";
		while ($res = mysql_fetch_array($lalo)) {
			$Todo = $Todo.$res["encuentro"].",".$res["latitud"].",".$res["longitud"].";";
		}
		$Todo = $Todo."\"";
		$file = fopen("home_recarga.txt", "w");
		fwrite($file, $Todo. PHP_EOL);
		fclose($file);
		while ($res = mysql_fetch_array($encuentros)) {
?>
	<li class="span3 alto3">
		<?php echo "<a href=\"ModificarEncuentro.php?idTorneo=".$res["idEncuentro"]."\" title=\"".$res["encuentro"]."\" class=\"thumbnail\">";  ?>
			<?php echo "<img src=\"../img/Deportes/".$res["Nombre_Deporte"].".png\" style=\"width:100px;\" alt=\"\">" ?>
			<div class="caption text-center clearfix">
				<h3><?php echo $res["encuentro"]; ?></h3>
				<h4><?php echo $res["Nombre_Deporte"]; ?></h4>
				<hr>
				<div class="clearfix" style="height=300px">
					<div class="span1 pull-left" style="margin-left:10px; margin-right:10px">
						<span class="label label-important">Equipo retador</span>
						<p><?php echo $res["retador"]; ?></p>
					</div>
					<div class="span1 pull-right" style="margin-left:10px; margin-right:10px">
						<span class="label label-success">Lugar</span>
						<p><?php echo $res["lugar"]; ?></p>
					</div>
				</div>
				<div class="clearfix" style="height=300px">
					<div class="span1 pull-left" style="margin-left:10px; margin-right:10px">
						<span class="label label-warning">Hora</span>
						<p><?php 
								$date = new DateTime($res["HoraIni"]);
								echo $date->format('H:i');
							?>
						</p>
					</div>
					<div class="span1 pull-right" style="margin-left:10px; margin-right:10px">
						<span class="label label-info">Fecha</span>
						<p><?php
								$date = new DateTime($res["Fecha"]);
								echo $date->format('d/m/Y');
								$contador = $contador + 1;
							?>
						</p>
					</div>
				</div>
				<div class="clearfix">
					<span class="badge badge-success">Encuentro</span>
				</div>
			</div>
		</a>
	</li>
<?php
	}
}
	if ($enctor == "Torneos" || $enctor == "Enc\Tor") {
	   while ($res = mysql_fetch_array($torneos)) {
?>
	<li class="span3 alto3">
		<?php echo "<a href=\"../Torneo/TablaYCalendario.php?id=".$res["idTorneo"]."\"  title=\"".$res["Nombre"]."\" class=\"thumbnail\">";  ?>
			<?php echo "<img src=\"../img/Deportes/".$res["Nombre_Deporte"].".png\" style=\"width:100px;\" alt=\"\">" ?>
			<div class="caption text-center clearfix">
				<h3><?php echo $res["Nombre"]; ?></h3>
				<h4><?php echo $res["Nombre_Deporte"]; ?></h4>
				<hr>
				<div class="clearfix" style="height=300px">
					<div class="span1 pull-left" style="margin-left:10px; margin-right:10px">
						<span class="label label-important">Organizador</span>
						<p><?php echo $res["Organizador"]; ?></p>
					</div>
					<div class="span1 pull-right" style="margin-left:10px; margin-right:10px">
						<span class="label label-success">Inscripción</span>
						<p><?php echo $res["Inscripcion"]; ?></p>
					</div>
				</div>
				<div class="clearfix" style="height=300px">
					<div class="span1 pull-left" style="margin-left:10px; margin-right:10px">
						<span class="label label-warning">Inicio</span>
						<p><?php 
								$date = new DateTime($res["FechaInicio"]);
								echo $date->format('d/m/Y');
								$contador = $contador + 1;
							?>
						</p>
					</div>
					<div class="span1 pull-right" style="margin-left:10px; margin-right:10px">
						<span class="label label-info">Limite</span>
						<p><?php
								$date = new DateTime($res["FechaLimiteEquipo"]);
								echo $date->format('d/m/Y');
								$contador = $contador + 1;
							?>
						</p>
					</div>
				</div>
				<div class="clearfix">
					<span class="badge badge-info">Torneo</span>
				</div>
			</div>
		</a>
	</li>
<?php
	}
}
	if ($contador == 0) {
		echo "<h3>Cambie de ubicación</h3><p>No se encuentran torneos ni encuentros en el rango del mapa";
	}
?>