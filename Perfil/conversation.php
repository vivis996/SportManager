<?php 

session_start();
include 'conexion.php';
$id=$_SESSION["id"];
$con=mysql_connect("localhost","root","");

$sql="select * from chat";
$res=mysql_db_query($bd,$sql,$con);

while($reg=mysql_fetch_array($res)) {
    
        $msj=$reg['mensaje'];
        $user=$reg['Usuario'];
    
    if($reg['idUsuario']==$id){
        echo'<li class="out">
            <img class="avatar" alt="" src="../../img/usuario.png"/>
            <div class="message">
                <span class="arrow"> </span>
                <a href="#" class="name"> '.$user.' </a>
                <span class="datetime"> at 20:40 </span>
                <span class="body"> '.$msj.'</span>
            </div>
        </li>';
    }else{
        echo'<li class="in">
            <img class="avatar" alt="" src="../../img/usuario.png"/>
            <div class="message">
                <span class="arrow"> </span>
                <a href="#" class="name">  '.$user.'</a>
                <span class="datetime"> at 20:40 </span>
                <span class="body"> '.$msj.'</span>
            </div>
        </li>';
    }
}
?>