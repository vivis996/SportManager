<?php 
session_start();
include 'conexion.php';
$email =$_POST['email'];
$contra =$_POST['contra'];
$sql ="select idUsuario as id, Nombre as name from usuarios where email='$email' and Contra='$contra'";
$res=mysql_db_query($bd,$sql,$con);
if($reg=mysql_fetch_array($res)) {
     $_SESSION["id"]=$reg['id'];
    $_SESSION["userchat"]=$reg['name'];
    header("location:../Home/home.php");
}else{
    header("location:../login.php");
}
?> 