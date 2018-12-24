<?php 
session_start();
include 'conexion.php';
$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellidos'];
$Sexo=$_POST['genero'];
$Email=$_POST['email'];
$Foto_Perfil="usuario.png";
$Edad=$_POST['edad'];
$Contra=$_POST['contra'];

$sql ="insert into Usuarios (`Nombre`, `Apellidos_Paterno`, `Sexo`, `Email`, `Foto_Perfil`, `Edad`, `Contra`) values('$Nombre','$Apellido','$Sexo','$Email','$Foto_Perfil','$Edad','$Contra')";
$res=mysql_db_query($bd,$sql,$con);

$sql2="select idUsuario as id from usuarios where email='$Email'";
$res2=mysql_db_query($bd,$sql2,$con);
if($reg1=mysql_fetch_array($res2)) {
    $_SESSION["id"]=$reg1['id'];
    $_SESSION["userchat"]=$reg['Nombre'];
    header("location:../Home/home.php");
}
?> 