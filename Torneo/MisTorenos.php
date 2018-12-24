<?php
session_start();
require_once("conexion.php");
$idUsuario=0;
if ($_SESSION["id"]){
	echo "si hay wey";
}


else
{
		echo "<script type='text/javascript'>

		alert('Usted no tiene cuenta');

		</script>";

		//header("location: MisTorenos.php");
	
}






?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/funciones.js"></script>

</head>
<body>

<div class="container">
<div class="panel panel-default">
  		<div class="panel-heading" align="center">
    		<h3 class="panel-title">Tabla de posiciones</h3>
  		</div>
  		<div class="panel-body">
   		 
			<table class="table table-striped table-bordered table-hover table-condensed col-sm-4">
 			<tr>
 				<th  class="col-sm-1">Torneo</th>
 				<th  class="col-sm-1">Jornada Actual</th>
 				<th  class="col-sm-1">Numero de Equipos</th>
 				<th  class="col-sm-1">Activo</th>

 			</tr>

 			</table>


 			</div>

 			</div>



</div>

</body>
</html>