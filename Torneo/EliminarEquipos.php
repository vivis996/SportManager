<?php
require_once("conexion.php");

$sql="DELETE FROM `torneo` WHERE idTorneo =".$_POST["idTorneo"];
mysql_db_query($bd, $sql,$con);
header("Location: torneosUsuarios.php");

?>