<?php 
$bd="chat";
$lo="localhost";
/*
$conexion = @mysqli_connect($lo,"root","",$bd);
if(!$conexion)  die("error de conexion".mysqli_connect_error());
$sql="select usuario,mensaje form conversation";
$result =mysqli_query($conexion,$sql);
while($data=mysql_fetch_array($result)){
    
    $usuario=$data['usuario'];
    $msj=$data['mensaje'];
    echo"<p><b>$usuario  </b> dice $msj </p>";
}*/

    $con=mysql_connect("localhost","root","");

$sql="select usuario,mensaje from conversation";
$res=mysql_db_query($bd,$sql,$con);
while($reg=mysql_fetch_array($res)) {
    $usuario=$reg['usuario'];$msj=$reg['mensaje'];
    
    
    echo"<p><b>$usuario  </b> dice $msj </p>";
}
?>