<?php
print_r($_POST);
require_once("conexion.php");


$sql = "select idEncuentro from encuentro where Jornada =".$_POST["idResultado"]." AND idTorn = ".$_POST["idToneo"];

echo $sql;
$res = mysql_db_query($bd, $sql,$con);

while ($reg=mysql_fetch_array($res)) {
	$sqlJugado = "UPDATE encuentro SET Jugado= 1 WHERE idEncuentro = ".$reg["idEncuentro"];
	$regJugado = mysql_db_query($bd, $sqlJugado,$con);
	$resultadoUno="Resultadouno".$reg["idEncuentro"];
	
	$resultadoDos="Resultadodos".$reg["idEncuentro"];

	$sqlModificar = "UPDATE encuentro SET ResultadoEquipoRetador=".$_POST[$resultadoUno].",ResultadoEquipoAceptado=".$_POST[$resultadoDos]." WHERE idEncuentro = ".$reg["idEncuentro"];

	$resModificar = mysql_db_query($bd, $sqlModificar,$con);

	$sqlPuntos = "select * from encuentro where idEncuentro = ".$reg["idEncuentro"];
	$resPuntos = mysql_db_query($bd, $sqlPuntos,$con);
	if($regPuntos = mysql_fetch_array($resPuntos))
	{
		if($regPuntos["ResultadoEquipoRetador"]>$regPuntos["ResultadoEquipoAceptado"])
		{
			$sqlSeleccionarEquipoUno = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resSeleccionarEquipoUno = mysql_db_query($bd,$sqlSeleccionarEquipoUno,$con);
			$partidosGanadosUno=0;
			$partidosJugadosUno=0;
			$partidosJugadosDos=0;
			$partidosPerdidosDos=0;
			$PuntosUno=0;
			$golesUno=0;
			if ($regSeleccionarEquipoUno = mysql_fetch_array($resSeleccionarEquipoUno)) {
				

					$partidosGanadosUno= $regSeleccionarEquipoUno["Partidos_Ganados"];
					$partidosJugadosUno=$regSeleccionarEquipoUno["Partidos_Jugados"];
					$PuntosUno=$regSeleccionarEquipoUno["Puntos"];
					$golesUno = $regSeleccionarEquipoUno["Goles"];
			}

			$partidosGanadosUno++;
			$partidosJugadosUno++;
			$PuntosUno = $PuntosUno + 3;
			$golesUno = $golesUno + $regPuntos["ResultadoEquipoRetador"];
			
			$sqlPuntosModificarUno = "UPDATE equipo SET Partidos_Ganados=".$partidosGanadosUno.",Partidos_Jugados=".$partidosJugadosUno.",Puntos=".$PuntosUno.",Goles =".$golesUno." WHERE idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarUno,$con);

			///////////////////////////////////////////////////////////////////////

			$sqlSeleccionarEquipoDos = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resSeleccionarEquipoDos = mysql_db_query($bd,$sqlSeleccionarEquipoDos,$con);
			$partidosJugadosDos=0;
			$partidosPerdidosDos=0;
			$golesdos=0;
			if ($regSeleccionarEquipoDos = mysql_fetch_array($resSeleccionarEquipoDos)) {
				

					$partidosPerdidosDos= $regSeleccionarEquipoDos["Partidos_Perdidos"];
					$partidosJugadosDos=$regSeleccionarEquipoDos["Partidos_Jugados"];
					$golesdos = $regSeleccionarEquipoDos["Goles"];
			
			}

			$partidosJugadosDos++;
			$partidosPerdidosDos++;
			$golesdos = $golesdos + $regPuntos["ResultadoEquipoAceptado"];
			
			$sqlPuntosModificarDos = "UPDATE equipo SET Partidos_Jugados=".$partidosJugadosDos.",Partidos_Perdidos=".$partidosPerdidosDos.",Goles= ".$golesdos." WHERE idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarDos,$con);

		}

		///////////////////////////////////////////////////////////////////////////////
/////////////////////////////

		if($regPuntos["ResultadoEquipoAceptado"]>$regPuntos["ResultadoEquipoRetador"])
		{
			$sqlSeleccionarEquipoUno = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resSeleccionarEquipoUno = mysql_db_query($bd,$sqlSeleccionarEquipoUno,$con);
			$partidosGanadosUno=0;
			$partidosJugadosUno=0;
			$partidosJugadosDos=0;
			$partidosPerdidosDos=0;
			$PuntosUno=0;
			$golesUno=0;
			if ($regSeleccionarEquipoUno = mysql_fetch_array($resSeleccionarEquipoUno)) {
				

					$partidosGanadosUno= $regSeleccionarEquipoUno["Partidos_Ganados"];
					$partidosJugadosUno=$regSeleccionarEquipoUno["Partidos_Jugados"];
					$PuntosUno=$regSeleccionarEquipoUno["Puntos"];
					$golesUno = $regSeleccionarEquipoUno["Goles"];
			}

			$partidosGanadosUno++;
			$partidosJugadosUno++;
			$PuntosUno = $PuntosUno + 3;
			$golesUno = $golesUno + $regPuntos["ResultadoEquipoAceptado"];
			$sqlPuntosModificarUno = "UPDATE equipo SET Partidos_Ganados=".$partidosGanadosUno.",Partidos_Jugados=".$partidosJugadosUno.",Puntos=".$PuntosUno.",Goles=".$golesUno." WHERE idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarUno,$con);

			///////////////////////////////////////////////////////////////////////

			$sqlSeleccionarEquipoDos = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resSeleccionarEquipoDos = mysql_db_query($bd,$sqlSeleccionarEquipoDos,$con);
			$partidosJugadosDos=0;
			$partidosPerdidosDos=0;
			$golesdos = 0;
		
			if ($regSeleccionarEquipoDos = mysql_fetch_array($resSeleccionarEquipoDos)) {
				

					$partidosPerdidosDos= $regSeleccionarEquipoDos["Partidos_Perdidos"];
					$partidosJugadosDos=$regSeleccionarEquipoDos["Partidos_Jugados"];
					$golesdos = $regSeleccionarEquipoDos["Goles"];
			
			}

			$partidosJugadosDos++;
			$partidosPerdidosDos++;
			$golesdos = $golesdos + $regPuntos["ResultadoEquipoRetador"];
			
			$sqlPuntosModificarDos = "UPDATE equipo SET Partidos_Jugados=".$partidosJugadosDos.",Partidos_Perdidos=".$partidosPerdidosDos.",Goles = ".$golesdos." WHERE idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarDos,$con);

		}
		//////////////////////////////////////////////////////////////////////////////////////////////////////


		if($regPuntos["ResultadoEquipoAceptado"]==$regPuntos["ResultadoEquipoRetador"])
		{
			
			$sqlSeleccionarEquipoUno = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resSeleccionarEquipoUno = mysql_db_query($bd,$sqlSeleccionarEquipoUno,$con);
			
			$partidosEmapatadosUno=0;
			
			$partidosJugadosUno=0;
			
			$PuntosUnoEmpate=0;
			
			if ($regSeleccionarEquipoUno = mysql_fetch_array($resSeleccionarEquipoUno)) {
				

					$partidosEmapatadosUno= $regSeleccionarEquipoUno["PartidosEmpatados"];
					$partidosJugadosUno=$regSeleccionarEquipoUno["Partidos_Jugados"];
					$PuntosUnoEmpate=$regSeleccionarEquipoUno["Puntos"];
			}

			$partidosEmapatadosUno++;
			$partidosJugadosUno++;
			$PuntosUnoEmpate = $PuntosUnoEmpate + 1;
			$sqlPuntosModificarUno = "UPDATE equipo SET PartidosEmpatados=".$partidosEmapatadosUno.",Partidos_Jugados=".$partidosJugadosUno.",Puntos=".$PuntosUnoEmpate." WHERE idEquipo = ".$regPuntos["idEquipo_Aceptado"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarUno,$con);


			$sqlSeleccionarEquipoDos = "select * from equipo where idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resSeleccionarEquipoDos = mysql_db_query($bd,$sqlSeleccionarEquipoDos,$con);
			$partidosJugadosDos=0;
			$partidosPerdidosDos=0;
			$partidosDosEmpate=0;
			$puntosDosEmpate=0;
			if ($regSeleccionarEquipoDos = mysql_fetch_array($resSeleccionarEquipoDos)) {
				

					$partidosDosEmpate= $regSeleccionarEquipoDos["PartidosEmpatados"];
					$partidosJugadosDos=$regSeleccionarEquipoDos["Partidos_Jugados"];
					$puntosDosEmpate = $regSeleccionarEquipoDos["Puntos"];

			
			}


			$partidosDosEmpate++;
			$partidosJugadosDos++;
			
			$puntosDosEmpate = $puntosDosEmpate +1;

			$sqlPuntosModificarDos = "UPDATE equipo SET Partidos_Jugados=".$partidosJugadosDos.",PartidosEmpatados=".$partidosDosEmpate.",Puntos=".$puntosDosEmpate." WHERE idEquipo = ".$regPuntos["idEquipo_Retador"];
			$resPuntosModificarUno = mysql_db_query($bd, $sqlPuntosModificarDos,$con);

		}
		
	}

	

}


header("Location: TablaYCalendario.php?id=".$_POST["idToneo"]);


?>