<?php
require_once("conexion.php");


$sqlLeng = "select * from jugadores";
$regleng = mysql_db_query($bd, $sqlLeng,$con);

$i=0;
while ($res=mysql_fetch_array($regleng)) {
	$i++;
}




$sql = "INSERT INTO jugadores(idJugadores, idEquipo, Nombre, Edad, Jugadorescol, Usuarios_idUsuario, EsUsuario) VALUES ($i,".$_POST["id_equipo"].",'".$_POST["nombre"]."',".$_POST["edad"].",'null',1,0)";


$reg = mysql_db_query($bd, $sql,$con);

$jugadores = $_POST["jugadoresAc"]; 

$jugadores++;

$sql2 = "UPDATE equipo SET Jugadores_Actuales=".$jugadores." WHERE idEquipo= ".$_POST["id_equipo"];


echo $sql2;
//$reg2 = mysql_db_query($bd, $sql2,$con);
  $res2 = mysql_db_query($bd, $sql2,$con);

header("Location:Inscrip.php");

?>