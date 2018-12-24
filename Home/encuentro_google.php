<?php
	require_once("conexion.php");
	$id = $_GET['id'];
    $la = $_GET['la'];
    $lo = $_GET['lo'];
	$Todo = '"';
    
    if($id != "-10"){
        $sql_lugar = "SELECT Nombre,latitud,longitud FROM `lugar` WHERE idLugar=".$id;

        $lugar = mysql_db_query($bd,$sql_lugar,$con);

        if ($res = mysql_fetch_array($lugar))
            {
                $Todo = $Todo.$res["Nombre"].",".$res["latitud"].",".$res["longitud"].";";
            }
        $Todo = $Todo.'"';
        echo $Todo;
    }
    else{
        $Todo = $Todo.$la.",".$lo.'",';
    }
	$file = fopen("encuentro_google.txt", "w");
		fwrite($file, $Todo. PHP_EOL);
		fclose($file);
?>