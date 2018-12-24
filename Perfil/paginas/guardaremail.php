<?php 
session_start();
include '../conexion.php';
print_r($_POST);
$id=$_SESSION["id"];
$email=$_POST['email'];
$sql ="UPDATE usuarios SET Email='$email' where idUsuario='$id'";
$res=mysql_db_query($bd,$sql,$con);
echo $sql;
header("location:Perfil.php");
?>