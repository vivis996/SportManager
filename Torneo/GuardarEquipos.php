<?php
session_start();

require_once("conexion.php");


if(isset($_POST["mio"])){
        $tipo = $_FILES["imagen"]["type"];
    }
	if(isset($_POST["invisible"]))
		{
$tipo = $_FILES["foto"]["type"];
    }

if($tipo=="image/jpeg" or $tipo=="image/png")
{
    
            echo"<script> console.log('entro al if')</script>";
	//*************************************
	//ahora podemos subir la imagen al servidor recien

		switch ($tipo) {
			case 'image/jpeg':
				$extencion = ".jpeg";
				break;
			

			case 'image/png':
				$extencion = ".png";
				break;
		}

	
	/**************************/
	//ahora guardamos el archivo en una base de datos


		

		if(isset($_POST["invisible"]))
		{
            
            $foto = $_FILES["foto"]["name"];
            $temp= $_FILES["foto"]["tmp_name"];
            $tamani = $_FILES["foto"]["size"];
            $tipo = $_FILES["foto"]["type"];
            $nombreFoto=$_POST["nombre"];
	       $nombreFoto=str_replace(" ", "_", $nombreFoto);
	       $nombreFoto=$nombreFoto.$extencion;
	       copy($temp,"img/$nombreFoto");

			$sqlIdTorneo ="Select * from torneo order by idTorneo desc limit 1";
		      $regIdTorneo = mysql_db_query($bd, $sqlIdTorneo,$con);
		  $idTorneo2=0;
	       if ($resIdTorneo = mysql_fetch_array($regIdTorneo)) {
		  $idTorneo2=$resIdTorneo["idTorneo"];
		  }

                    $sql="INSERT INTO equipo(idEquipo, Nombre, Jugadores_Actuales, Deporte_idDeporte, Partidos_Ganados, Partidos_Jugados, Partidos_Perdidos,PartidosEmpatados, Puntos, Logo,Goles,idTorneo) VALUES (NULL,'".$_POST['nombre']."',0,1,0,0,0,0,0,'$nombreFoto',0,".$idTorneo2.")";
               echo $sql;
            $res = mysql_db_query($bd, $sql,$con);
            header("Location: Inscrip.php");


                $sqlEquiposTorneo = "select Numero_Equipos from torneo where idTorneo =".$idTorneo2;
                $resEquipoTorneo = mysql_db_query($bd,$sqlEquiposTorneo,$con);
                $NumEquipoTorneo=0;
                if($regEquipoTorneo = mysql_fetch_array($resEquipoTorneo))
                {
                    $NumEquipoTorneo = $regEquipoTorneo["Numero_Equipos"];
                }

                $NumEquipoTorneo++;

                $sqlEquiposTorneo2 = "UPDATE torneo SET Numero_Equipos=".$NumEquipoTorneo." WHERE idTorneo =".$idTorneo2;
                $resEquipoTorneo2 = mysql_db_query($bd,$sqlEquiposTorneo2,$con);



		}

       else if(isset($_POST["mio"]))
        {
            $foto = $_FILES["imagen"]["name"];
            $temp= $_FILES["imagen"]["tmp_name"];
            $tamani = $_FILES["imagen"]["size"];
            $tipo = $_FILES["imagen"]["type"];
            copy($temp,"../img/$foto");
            $sql="UPDATE usuarios SET Foto_Perfil = '$foto' WHERE idUsuario = '".$_SESSION["id"]."'";
            $res=mysql_db_query($bd,$sql,$con);
            header("Location:../Perfil/paginas/perfil.php");
		}
}
        ?>