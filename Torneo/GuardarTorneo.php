<?php
session_start();
require_once("conexion.php");
$sqlLeng = "select * from torneo";
$reg = mysql_db_query($bd, $sqlLeng,$con);

$i=1;
while ($res=mysql_fetch_array($reg)) {
	$i++;
}

$sqlIdDeporte = "select idDeporte from deporte where Nombre_Deporte ='".$_POST["Deporte"]."'";
echo "$sqlIdDeporte";
$residDeporte=mysql_db_query($bd, $sqlIdDeporte,$con);
$idDeporte=0;
if($regIdDeporte = mysql_fetch_array($residDeporte))
{
$idDeporte = $regIdDeporte["idDeporte"];
}



$sql=" INSERT INTO torneo(idTorneo,Nombre,Recompensa,Inscripcion,Credencial,idOrganizador,idDeporte,Edad_limite,Descripcion,Numero_Equipos,LimiteEquipo,FechaLimiteEquipo,FechaInicio,FechaFin) VALUES ('".$i."','".$_POST['nombre']."','".$_POST['Recompensas']."',".$_POST['CostoInscripcion'].",".$_POST['CostoCredencial'].",".$_SESSION["id"].",".$idDeporte.",".$_POST['EdadLimite'].",'".$_POST['Descripcion']."',0,".$_POST['LimiteEquipos'].",'".$_POST['FechaLimite']."','".$_POST['FechaInicio']."','01/01/1999')";
echo "$sql";
$reg2 = mysql_db_query($bd, $sql,$con);
$res2=mysql_fetch_array($sql);

header("Location:Inscrip.php");



?>