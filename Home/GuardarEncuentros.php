<?php 
print_r($_POST);
session_start();
$id=$_SESSION["id"];
$bd="sports";
	$con = mysql_connect("localhost","root","");

$nombre=$_POST["nombre"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$recompensa=$_POST["recompensa"];
$descripcion=$_POST["descripcion"];
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
if(isset($_POST["lugar"]))
{
	$lugar=$_POST["lugar"];
}
else $lugar="1";
$lugar1=$_POST["lugar1"];

$equipo2=$_POST["equipo2"];
if ($equipo2=="------------") $equipo2=null;
$check=$_POST["isChecket"];
$id=$_SESSION["id"];
echo "Este es el id vato:".$id;
$deporte=$_POST["deporte"];
if(isset($_POST))
if($equipo2==null)
{
	$equipo2='null';
	if($equipo1=="------------")
    {
	$equipo1=1;
    }

if($check=="si")
{

	if($lugar1!=null)
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
	 $sql_guardar = "INSERT into encuentro(Nombre,idCreador,Fecha,Horaini,Recompensa,idDeporte,idEquipo_retador,idEquipo_Aceptado,id_Lugar,Descripsion) values(
'$nombre','$id','$fecha','$hora','$recompensa','$deporte','$equipo1',$equipo2,".$idLugar["id"].",'$descripcion')";
        echo $sql_guardar;


$res=mysql_db_query($bd, $sql_guardar,$con);
echo "Se ha guardado el encuentro 1";

	}
}
else
	{
			 $sql_guardar = "INSERT into encuentro(Nombre, idCreador, Fecha,Horaini,Recompensa,idDeporte,idEquipo_retador,idEquipo_Aceptado,id_Lugar,Descripsion) values(
'$nombre','$id','$fecha','$hora','$recompensa','$deporte','$equipo1',$equipo2,'$lugar','$descripcion')";


$res=mysql_db_query($bd, $sql_guardar,$con);
echo "Se ha guardado el encuentro 2";
    echo $sql_guardar;
	}
}
else
{

	if($equipo1=="------------")
{
	$equipo1=1;
}
echo"Si hay un equipo 2";
echo $check;
if($check=="si")
{
	echo "Entro al check";
	if($lugar1!=null)
	{
		echo "entro al lugar";
        
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
	 $sql_guardar = "INSERT into encuentro(Nombre, idCreador, Fecha,Horaini,Recompensa,idDeporte,idEquipo_retador,idEquipo_Aceptado,id_Lugar,Descripsion) values(
'$nombre','$id','$fecha','$hora','$recompensa','$deporte','$equipo1','$equipo2',".$idLugar["id"].",'$descripcion')";
echo $sql_guardar;

$res=mysql_db_query($bd, $sql_guardar,$con);
echo "Se ha guardado el encuentro 3";

	}
}
else
	{
		echo "entro al else del lugar";
			 $sql_guardar = "INSERT into encuentro(Nombre,idCreador,Fecha,Horaini,Recompensa,idDeporte,idEquipo_retador,idEquipo_Aceptado,id_Lugar,Descripsion) values(
'$nombre','$id','$fecha','$hora','$recompensa','$deporte','$equipo1','$equipo2','$lugar','$descripcion')";


$res=mysql_db_query($bd, $sql_guardar,$con);
echo "hihuahudhasudh $sql_guardar";
	}

}




header('Location:Home.php');

 ?>

