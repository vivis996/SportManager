<?php 
session_start();
$id=$_SESSION["id"];
print_r($_POST);
echo"<br>";
echo"<br>";
echo"<br>";
$bd="sports";
$con = mysql_connect("localhost","root","");
$clave= $_POST["clave"];
$nombre=$_POST["nombre"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$puntosequipo1=$_POST["puntuacionequipo1"];
$puntosequipo2=$_POST["puntuacionequipo2"];
echo "Estas son las puntuaciones: ".$puntosequipo1." ".$puntosequipo2;
$recompensa=$_POST["recompensa"];
$descripcion=$_POST["descripcion"];
if(isset($_POST["lugar"]))
{
		$lugar=$_POST["lugar"];
}
else $lugar="18";

if(isset($_POST["equipo1"]))$equipo1=$_POST["equipo1"];
else 
	{
		$equipo=$_POST["nuevoequipo"];
	 $sql_agregarequipo="INSERT into equipo (Nombre,Jugadores_Actuales,Deporte_idDeporte,PartidosEmpatados,Logo,idTorneo,idCreador) values ('$equipo','1','1','0',':v','0',$id);";
	 echo $sql_agregarequipo;
	 $agregarEquipo = mysql_db_query($bd,$sql_agregarequipo,$con);
	  $sql_idequipo="SELECT max(idEquipo) as 'id' from equipo;";
	 $Id_Equipo= mysql_db_query($bd,$sql_idequipo,$con);
	 $idEquipo = mysql_fetch_array($Id_Equipo);
	 $equipo1=$idEquipo["id"];
	}



if(isset($_POST["equipo2"]))
	{
		$equipo2=$_POST["equipo2"];
		if($equipo2=="------------")$equipo2=null;
	}
else 
	{
		$equipo=$_POST["nuevoequipo2"];
	 $sql_agregarequipo="INSERT into equipo (Nombre,Jugadores_Actuales,Deporte_idDeporte,PartidosEmpatados,Logo,idTorneo,idCreador) values ('$equipo','1','1','0',':v','0',$id);";
	 echo "Aqui es lo del otro equipo 2".$sql_agregarequipo;
	 $agregarEquipo = mysql_db_query($bd,$sql_agregarequipo,$con);
	  $sql_idequipo="SELECT max(idEquipo) as 'id' from equipo;";
	 $Id_Equipo= mysql_db_query($bd,$sql_idequipo,$con);
	 $idEquipo = mysql_fetch_array($Id_Equipo);
	 $equipo2=$idEquipo["id"];
	}


$deporte=$_POST["deporte"];
$check=$_POST["isChecket"];
$Id_Lugar="1";



if(isset($_POST["equipousuario"]) & $equipo2==null)
{

	echo "Este es el equipo del usuario".$_POST["equipousuario"];
	if($equipo1=="------------")
		{
			$equipo1=1;
		}
		if($check=="si")
		{
			if($lugar!=null)
			{
                $fp = fopen("encuentro_google.txt", "r");
                $lineas = "";
                while(!feof($fp)) {
                    $linea = fgets($fp);
                    $lineas = $lineas.$linea;
                }
                $lineas = str_replace("\"","", $lineas);
                $datos = explode(",", $lineas);

                echo $datos[0];
                echo "<hr>";
                echo $datos[1];
                
				 $sql_agregarlugar="INSERT into lugar (Nombre,Dirrecion,IdDireccion,Latitud,Longitud) values ('$lugar1',1,1,'$datos[0]','$datos[1]')";
				 echo $sql_agregarlugar;
				 $agregarLugar = mysql_db_query($bd,$sql_agregarlugar,$con);
				 $sql_idlugar="SELECT max(idLugar) as 'id' from lugar;";
				 $Id_Lugar= mysql_db_query($bd,$sql_idlugar,$con);
				 $idLugar = mysql_fetch_array($Id_Lugar); 
                echo "este es el id lugar".$idLugar;

				 $sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado=".$_POST["equipousuario"].", descripsion='$descripcion', Resultadoequiporetador='$puntuacionequipo1', Resultadoequipoaceptado='$puntuacionequipo2' where idEncuentro=".$clave."";
				 echo $sql_guardarcambios;

				 $res=mysql_db_query($bd, $sql_guardarcambios,$con);
				 echo "Se ha modificado el encuentro";
			}
		}
		else
		{
				$sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado=".$_POST["equipousuario"].", descripsion='$descripcion', Resultadoequiporetador='$puntosequipo1', Resultadoequipoaceptado='$puntosequipo2' where idEncuentro=".$clave."";
				echo "aqui si entro". $sql_guardarcambios;

				$res=mysql_db_query($bd, $sql_guardarcambios,$con);
				echo "Se ha modificado el encuentro";
		}

		//header("Location: ModificarEncuentro.php?idTorneo=$clave");
}
else
{

if($equipo2==null)
{
			$equipo2='null';

		if($equipo1=="------------")
		{
			$equipo1=1;
		}
		if($check=="si")
		{
			if($lugar!=null)
			{
                
                $fp = fopen("encuentro_google.txt", "r");
                $lineas = "";
                while(!feof($fp)) {
                    $linea = fgets($fp);
                    $lineas = $lineas.$linea;
                }
                $lineas = str_replace("\"","", $lineas);
                $datos = explode(",", $lineas);

                echo $datos[0];
                echo "<hr>";
                echo $datos[1];
				 $sql_agregarlugar="INSERT into lugar (Nombre,Dirrecion,IdDireccion,Latitud,Longitud) values ('$lugar1',1,1,'$datos[0]','$datos[1]')";
				 echo $sql_agregarlugar;
				 $agregarLugar = mysql_db_query($bd,$sql_agregarlugar,$con);
				 $sql_idlugar="SELECT max(idLugar) as 'id' from lugar;";
				 $Id_Lugar= mysql_db_query($bd,$sql_idlugar,$con);
				 $idLugar = mysql_fetch_array($Id_Lugar);

				 $sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado=$equipo2,  descripsion='$descripcion', Resultadoequiporetador='$puntuacionequipo1', Resultadoequipoaceptado='$puntuacionequipo2' where idEncuentro=".$clave."";
				 echo $sql_guardarcambios;


				 $res=mysql_db_query($bd, $sql_guardarcambios,$con);
				 echo "Se ha modificado el encuentro";
			}
		}
		else
		{
				$sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado=$equipo2, descripsion='$descripcion', Resultadoequiporetador='$puntosequipo1', Resultadoequipoaceptado='$puntosequipo2' where idEncuentro=".$clave."";
				echo $sql_guardarcambios;

				$res=mysql_db_query($bd, $sql_guardarcambios,$con);
				echo "Se ha modificado el encuentro";
		}
}
else
{

		if($equipo1=="------------")
		{
			$equipo1=1;
		}
		if($check=="si")
		{
			if($lugar!=null)
			{
                $fp = fopen("encuentro_google.txt", "r");
                $lineas = "";
                while(!feof($fp)) {
                    $linea = fgets($fp);
                    $lineas = $lineas.$linea;
                }
                $lineas = str_replace("\"","", $lineas);
                $datos = explode(",", $lineas);

                echo $datos[0];
                echo "<hr>";
                echo $datos[1];
				 $sql_agregarlugar="INSERT into lugar (Nombre,Dirrecion,IdDireccion,Latitud,Longitud) values ('$lugar1',1,1,'$datos[0]','$datos[1]')";
				 echo $sql_agregarlugar;
				 $agregarLugar = mysql_db_query($bd,$sql_agregarlugar,$con);
				 $sql_idlugar="SELECT max(idLugar) as 'id' from lugar;";
				 $Id_Lugar= mysql_db_query($bd,$sql_idlugar,$con);
				 $idLugar = mysql_fetch_array($Id_Lugar);

				 $sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado='$equipo2',  descripsion='$descripcion', Resultadoequiporetador='$puntuacionequipo1', Resultadoequipoaceptado='$puntuacionequipo2' where idEncuentro=".$clave."";
				 $res=mysql_db_query($bd, $sql_guardarcambios,$con);
				 echo "Se ha modificado el encuentro";
			}
		}
		else
		{
				$sql_guardarcambios = "UPDATE encuentro set nombre='$nombre', fecha='$fecha', horaini='$hora', recompensa='$recompensa', idDeporte= '$deporte', idEquipo_retador='$equipo1', idEquipo_aceptado='$equipo2',  descripsion='$descripcion', Resultadoequiporetador='$puntosequipo1', Resultadoequipoaceptado='$puntosequipo2' where idEncuentro=".$clave."";
				echo $sql_guardarcambios;
				$res=mysql_db_query($bd, $sql_guardarcambios,$con);
				echo "Se ha modificado el encuentro";
		}
}

}



	




header('Location: Home.php');



 ?>