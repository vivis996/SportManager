<?php 
session_start();
include '../conexion.php';
$id=$_SESSION["id"];
print_r($_POST);
$contraactual=$_POST["actual"];
    
    
    
    
    
$sql ="select contra as 'cont' from usuarios where idUsuario='$id'";
$res=mysql_db_query($bd,$sql,$con);
while($reg=mysql_fetch_array($res)) {
    $contrabase=$reg["cont"];
}
    if ($contrabase != $contraactual) {
        $_SESSION["errorcontra"]=1;
        //header("location:Perfil.php");
        
    }else{
        $nueva=$_POST["nuevacon"];
        $nuevar=$_POST["nuevaconr"];
        if ($nueva !=$nuevar) {
            $_SESSION["errorcontra"]=2;
            header("location:Perfil.php");
            
        }else{
            $sql ="UPDATE usuarios SET Contra='$nueva' where idUsuario='$id'";
            $res=mysql_db_query($bd,$sql,$con);
            $_SESSION["errorcontra"]=3;
            header("location:Perfil.php");
            
        }
    }