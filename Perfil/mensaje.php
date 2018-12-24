<?php   

session_start();
include 'conexion.php';
$id=$_SESSION["id"];
$mensaje=$_POST["mensaje"];
$usuarionombre=$_SESSION["userchat"];
//$id=$_SESSION["id"];
//$sql ="select * from usuarios where idUsuario='$id'";
//$res=mysql_db_query($bd,$sql,$con);
//while($reg=mysql_fetch_array($res)) {
    
//    $Nombre=$reg["Nombre"]; 
    
//}

    $con=mysql_connect("localhost","root","");

$sql="insert into chat(idUsuario,idDeporte,Usuario,mensaje) values('$id','1','$usuarionombre','$mensaje')";
 
$res=mysql_db_query($bd,$sql,$con);
     
    
?>
