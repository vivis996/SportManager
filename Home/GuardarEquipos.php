<?php
require_once("conexion.php");
$foto = $_FILES["foto"]["name"];
$temp= $_FILES["foto"]["tmp_name"];
$tamani = $_FILES["foto"]["size"];
$tipo = $_FILES["foto"]["type"];



if($tipo=="image/jpeg" or $tipo=="image/png")
{
	//*************************************
	//ahora podemos subir la imagen al servidor recien

		switch ($tipo) {
			case 'image/jpeg':
				$extencion = ".jpeg";
				break;
			

			case 'image/png':
				$extencion = ".png";
				break;
		}

	$nombreFoto=$_POST["nombre"];
	$nombreFoto=str_replace(" ", "_", $nombreFoto);
	$nombreFoto=$nombreFoto.$extencion;
	copy($temp,"img/$nombreFoto");
	/**************************/
	//ahora guardamos el archivo en una base de datos

		$sqlIdTorneo ="Select * from torneo order by idTorneo desc limit 1";
		$regIdTorneo = mysql_db_query($bd, $sqlIdTorneo,$con);
		$idTorneo2=0;
	if ($resIdTorneo = mysql_fetch_array($regIdTorneo)) {
		$idTorneo2=$resIdTorneo["idTorneo"];
		}



	$sql="INSERT INTO equipo(idEquipo, Nombre, Jugadores_Actuales, Deporte_idDeporte, Partidos_Ganados, Partidos_Jugados, Partidos_Perdidos,PartidosEmpatados, Puntos, Logo,Goles,idTorneo) VALUES (NULL,'".$_POST['nombre']."',0,1,0,0,0,0,0,'$nombreFoto',0,".$idTorneo2.")";
	echo $sql;
	$res = mysql_db_query($bd, $sql,$con);
	header("Location: Inscrip.php");

	
}

else
{
	echo "el archivo solo imagen";
}



?>