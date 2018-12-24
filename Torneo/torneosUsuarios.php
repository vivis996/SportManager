<?php
session_start();
require_once("conexion.php");
$id=$_SESSION["id"];
$sql ="select * from usuarios where idUsuario='$id'";
$res=mysql_db_query($bd,$sql,$con);
while($reg=mysql_fetch_array($res)) {
    
    $idUsuario=$reg["idUsuario"];
    $Nombre=$reg["Nombre"];
    $Apellidos_Paterno=$reg["Apellidos_Paterno"];
    $Sexo=$reg["Sexo"];
    $Email=$reg["Email"];
    $Foto_Perfil=$reg["Foto_Perfil"];
    $Edad=$reg["Edad"]; 
    
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
       <title>Sport Manager</title>
        <!-- estilos del menu -->
        <link href="../google-font.css" rel="stylesheet" type="text/css" />
        <link href="menucss/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="menucss/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="menucss/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
      
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../img/Logo.png" alt="logo" style="top: 0px!important;" class="logo-default" width="150px"></a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                
                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="../img/<?php echo "$Foto_Perfil" ?>" alt="">
                                <span class="username username-hide-on-mobile"> <?php echo "$Nombre" ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="../Perfil/paginas/perfil.php">
                                        <i class="icon-user"></i> Mi perfil </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="ajax.html" data-target="#myModal" data-toggle="modal">
                                <i class="icon-question"></i>
                            </a>
                        </li>
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="destruirsession.php" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Termina parte de arriba -->
        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
            
                <div class="page-sidebar navbar-collapse collapse">
                   
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 0px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li>
                        <!-- aqui empiesa el menu -->
                        <li class="nav-item">
                            <a href="../Home/home.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="selected"></span>
                                <span class="title">Home</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="../Perfil/paginas/perfil.php" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="selected"></span>
                                <span class="title">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item active open">
                            <a href="Torneo.php" class="nav-link nav-toggle">
                                <i class="icon-trophy"></i>
                                <span class="title"> Torneos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                               <li class="nav-item">
                                    <a href="Torneo.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo torneo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="torneosUsuarios.php" class="nav-link ">
                                       <i class="icon-eye"></i>
                                        <span class="title">Ver torneos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../Home/Encuentro.php" class="nav-link nav-toggle">
                                <i class="icon-energy"></i>
                                <span class="title"> Encuentros</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="../Home/Encuentro.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo encuentro</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Home/VerEncuentros.php" class="nav-link ">
                                       <i class="icon-eye"></i>
                                        <span class="title">Ver encuentros</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- aqui termina el menu -->
                    </ul>
                </div>
            </div>
            
            <div class="page-content-wrapper">
                <div class="page-content">
                <div id="myModal" class="modal fade" >
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header" >
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h2>Ver torneos</h2>
                            </div>
                            <div class="modal-body">
                                <p>Ve todo los torneos que tienes creados, administralos o eliminalos,
                                pudes ingresar para ver toda la informacion en el boton de ver, o eliminarlos en el boton 
                                eliminar</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                   
                   
                   <!-- aqui pones tu codigo-->


        <div class="container">

    <div class="row-fluid">
      <div class="col-xs-12">
      
        <div class="row-fluid">

          <div class="col-xs-12">
        
            <div class="panel panel-primary">
            <div class="panel-heading" align="center">
                    <h3 class="panel-title">Tus Torneos</h3>
            </div>
                <div class="panel-body">
                
                <div class="col-xs-12">
                        <table class="table table-striped  table-bordered table-hover table-condensed">
                      <tr>
                        <th  class="col-sm-1"><small> Nombre </small></th>
                        <th  class="col-sm-1"><small>Deporte</small></th>
                        <th  class="col-sm-1"><small>Equipos Participando</small></th>                       
                        <th class="col-sm-1"><small>Recompensa</small></th>
                        <th class="col-sm-1"><small>Descripcion</small></th>                      
                        <th class="col-sm-1"><small>Estado del torneo</small></th>
                        <th class="col-sm-1"><small>Informacion</small></th>
                        <th class="col-sm-1"><small>Eliminar</small></th>
                        </tr>
                    <!--inicia php1-->
                        <?php

                        $idVar=0;

                        $sql="select * from torneo where idOrganizador = ".$_SESSION["id"];
                        $res = mysql_db_query($bd,$sql,$con);

                        while ($reg=mysql_fetch_array($res)) {

                            ?>

                            <tr>
                            <td  class="col-sm-1"><small> <?= $reg["Nombre"]?> </small></td>

                                <?php

                                    $sqlDeporte ="select * from deporte where idDeporte = ".$reg["idDeporte"];
                                    
                                    $resDeporte = mysql_db_query($bd,$sqlDeporte,$con);
                                    $TipoDeporte ="";
                                    if($regDeporte = mysql_fetch_array($resDeporte))
                                    {
                                        $TipoDeporte = $regDeporte["Nombre_Deporte"];
                                    }

                                ?>
                                    
                                    

                            <td  class="col-sm-1"><small><?= $TipoDeporte?></small></td>

                            <?php

                                    $sqlNumEquipos ="select * from equipo where idTorneo =".$reg["idTorneo"];
                                    
                                    $resNumEquipos = mysql_db_query($bd,$sqlNumEquipos,$con);
                                    $Numequipos =0;
                                    while($regNumEquipos = mysql_fetch_array($resNumEquipos))
                                    {
                                        $Numequipos++;
                                    }

                            ?>



                            <td  class="col-sm-1"><small><?=$Numequipos?></small></td>                       
                            <td class="col-sm-1"><small><?= $reg["Recompensa"]?></small></td>
                            <td class="col-sm-1"><small><?= $reg["Descripcion"]?></small></td> 

                            <?php
                                    //veo si el torneo existe
                                    $sqlActivo ="select * from encuentro where idTorn =".$reg["idTorneo"];
                                    
                                    $resActivo = mysql_db_query($bd,$sqlActivo,$con);
                                    $TorneoActivo ="Inactivo";
                                    //si hay un encuentro con el id del torneo es porque si existe
                                    
                                    if($regActivo = mysql_fetch_array($resActivo))
                                    {

                                        $TorneoActivo="Finalizado";

                                            //verifico si el torneo ya finalizo o sigue activo
                                            $sqlFinalizado ="select * from encuentro where idTorn =".$reg["idTorneo"];                          
                                            $resFinalizado = mysql_db_query($bd,$sqlFinalizado,$con);

                                            while ($regFinalizado = mysql_fetch_array($resFinalizado)) {
                                                
                                                if($regFinalizado["Jugado"]==0)
                                                {
                                                    $TorneoActivo="En curso";
                                                }

                                            }


                                    }

                           if($TorneoActivo=="En curso")
                                            		{
                                            			echo "<td class='col-sm-1' align='center'><span class='badge badge-success'>$TorneoActivo</span></td>";
                               
                               ?>
                                                    
                                                     <td class="col-sm-1" align="center"><a href="TablaYCalendario.php?id=<?= $reg["idTorneo"] ?>"  class="btn btn-primary">Ver</a></td>
                           
                                                    
                                                    <?php
                                                    
                           
                                            		}
                                     else if($TorneoActivo=="Finalizado")
                                            		{
                                            			echo "<td class='col-sm-1' align='center'><span class='badge badge-danger'>$TorneoActivo</span></td>";
                                         ?>
                                                    
                                                     <td class="col-sm-1" align="center"><a href="TablaYCalendario.php?id=<?= $reg["idTorneo"] ?>"  class="btn btn-primary">Ver</a></td>
                           
                                                    
                                                    <?php
                                                    
                                            		}
                                            		else
                                            		{
                                            				echo "<td class='col-sm-1' align='center'><span class='badge muted'>$TorneoActivo</span></td>";
                                                    ?>
                                                    
                                                     <td class="col-sm-1" align="center"><a href="Inscrip.php?id=<?= $reg["idTorneo"] ?>"  class="btn btn-primary">Ver</a></td>
                           
                                                    
                                                    <?php
                                                    
                                            		
                                            		}

                            ?>

                            
                           
                            
                            <form class="form-horizontal" role="form" name="FormEquipos" action="EliminarEquipos.php" method="post" enctype="multipart/form-data">
									
									<input type="hidden" name="idTorneo" value="<?= $reg["idTorneo"] ?>">
                            		<td class="col-sm-1" align="center"><input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar"></td>

                            </form>
                            
                            
                            </tr>


                            <?php
                            
                        }



                        ?>
                        <!--Fini php-->

                        </table>
                        
                </div>

                </div>

                </div>

                </div>

                </div>

       </div>

    </div>
</div>
         
                   
                       
                    <!-- aqui termina tu codigo-->
                </div>
            </div>
        </div>
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; Sport Manager.
                <a href="http://www.facebook.com" title="Creacion de torneos de deportes" target="_blank">Sport Manager!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- script  -->
        <script src="menujs/jquery.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="menujs/app.min.js" type="text/javascript"></script>
        <script src="menujs/layout.min.js" type="text/javascript"></script>
        <script src="menujs/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap-fileinput.js" type="text/javascript"></script>

        
        <!-- fin script -->
    </body>

</html>