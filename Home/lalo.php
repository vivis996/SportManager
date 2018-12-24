<?php 
	$valor = $_GET['valor'];
	require_once("conexion.php");
	$fecha_actual = date("Y/m/d");

	$sql_lalo = "SELECT encuentro.Nombre as 'encuentro',lugar.latitud,lugar.longitud FROM encuentro, deporte, lugar, equipo 
	WHERE encuentro.id_Lugar=lugar.idLugar AND deporte.idDeporte=encuentro.idDeporte AND equipo.idEquipo=encuentro.idEquipo_Retador 
	AND encuentro.Fecha>='".$fecha_actual."'";
	if ($valor != "")
	{
		$sql_lalo = $sql_lalo." and deporte.Nombre_Deporte in (".$valor.")";
	}
	$encuentros = mysql_db_query($bd,$sql_lalo,$con);
	$Todo = "\"";
	while ($res = mysql_fetch_array($encuentros))
	{
		$Todo = $Todo.$res["encuentro"].",".$res["latitud"].",".$res["longitud"].";";
	}
	$Todo = $Todo."\"";
	$file = fopen("archivo.txt", "w");
	fwrite($file, $Todo. PHP_EOL);
	fclose($file);
?>