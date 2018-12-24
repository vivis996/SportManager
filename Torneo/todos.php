<?php
require_once("conexion.php");
/* $pila = array();
 

$sql ="select * from equipo";
$res = mysql_db_query($bd, $sql,$con);

while ($reg = mysql_fetch_array($res)) {
	array_push($pila,$reg["idEquipo"]);
}

//for($i=0;$i<12;$i++)
//{

//array_push($pila,$i);

//}

function Combinar()
{
	global $claves;
	global $pila;
	$claves = array_keys($pila);
	$partidos =count($pila);
	$buffer = $pila[count($pila)-1];
	//echo "es este".$partidos;
	for($i=$partidos-1;$i>1;$i--)
	{
	$pila[$claves[$i]] = $pila[$claves[$i-1]] ; // Imprime orange. 
	}

		$pila[$claves[1]] = $buffer;


}

function mostrar()
{
	global $partidos;
	global $pila;
	$partidos = count($pila);
	 $claves = array_keys($pila);



	for ($i = 0, $j=$partidos-1; $i<$j; $i++, $j--) {

		echo $pila[$claves[$i]]."vs".$pila[$claves[$j]]."<br><br>" ;
        
        }
}

//////////////////main/////////////////
 for ($i = 0; $i < 11; $i++) {
            mostrar();
            combinar();
}*/

$sqlIdTorneo ="Select * from torneo order by idTorneo desc limit 1";
		$regIdTorneo = mysql_db_query($bd, $sqlIdTorneo,$con);
		$idTorneo2=0;
	if ($resIdTorneo = mysql_fetch_array($regIdTorneo)) {
		$idTorneo2=$resIdTorneo["idTorneo"];
		}


$pila = array();
 

				$sql ="select * from equipo where idTorneo =".$idTorneo2;
                
				$res = mysql_db_query($bd, $sql,$con);

				while ($reg = mysql_fetch_array($res)) {
				array_push($pila,$reg["idEquipo"]);
				}


						function Combinar()
						{
						global $claves;
						global $pila;
						$claves = array_keys($pila);
						$partidos =count($pila);
						$buffer = $pila[count($pila)-1];
	//echo "es este".$partidos;
						for($i=$partidos-1;$i>1;$i--)
						{
							$pila[$claves[$i]] = $pila[$claves[$i-1]] ; // Imprime orange. 
						}

					$pila[$claves[1]] = $buffer;


					}

					function mostrar()
					{
					global $partidos;
					global $pila;
					global $bd;
					global $con;
					global $count;
					$idEqupo1="";
					$partidos = count($pila);
	 				$claves = array_keys($pila);


					for ($i = 0, $j=$partidos-1; $i<$j; $i++, $j--) {

						//echo $pila[$claves[$i]]."vs".$pila[$claves[$j]]."<br><br>" ;

							$sql1 = "select idEquipo,Nombre,Logo from equipo where idEquipo=".$pila[$claves[$i]];
							$res1 = mysql_db_query($bd, $sql1,$con);

							if($reg1=mysql_fetch_array($res1))
							{
								$idEqupo1 = $reg1["idEquipo"];
							

                    
                     /*<td align="center"></label><img src="img/<?php echo $reg1["Logo"] ?>" width="50" height="50"><br><label for=""><?php echo $reg1["Nombre"]; ?> </td>*/
                      

							

							}


							$sql2 = "select idEquipo,Nombre,Logo from equipo where idEquipo=".$pila[$claves[$j]];
							$res2 = mysql_db_query($bd, $sql2,$con);

							if($reg2=mysql_fetch_array($res2))
							{

								$sqlIdTorneo ="Select * from torneo order by idTorneo desc limit 1";
									$regIdTorneo = mysql_db_query($bd, $sqlIdTorneo,$con);
									$idTorneo2=0;
								if ($resIdTorneo = mysql_fetch_array($regIdTorneo)) {
									$idTorneo2=$resIdTorneo["idTorneo"];
										}
								

								$sqlInsert="INSERT INTO encuentro(idEncuentro, Fecha, HoraIni, Recompensa, idDeporte, idEquipo_Retador, idEquipo_Aceptado, id_Lugar, Descripsion, ResultadoEquipoRetador, ResultadoEquipoAceptado, Jornada,Jugado, idTorn) VALUES (null,'01/01/1999','02:02','Torneo',1,".$idEqupo1.",".$reg2["idEquipo"].",18,'Descripsion',0,0,'".$count."',0,".$idTorneo2.")";
								$resInsert = mysql_db_query($bd, $sqlInsert,$con);
                                

							}

        
        				}

        				



        				
					}


							//////////////////main/////////////////
					$count=1;
 						for ($i = 1; $i < count($pila); $i++) {

 								

 								/*<legend>Jornada <?php echo $i; ?></legend>*/


 								


            				mostrar();
            				combinar();
            				$count++;
						}

header("Location: TablaYCalendario.php");

?>