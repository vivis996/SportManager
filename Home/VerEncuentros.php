<?php 
    session_start();
    if (!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }
    include 'conexion.php';
    $id = $_SESSION["id"];
    $sql = "select * from usuarios where idUsuario='$id'";
    $res = mysql_db_query($bd,$sql,$con);
    while($reg = mysql_fetch_array($res)) {
        $idUsuario = $reg["idUsuario"];
        $Nombre = $reg["Nombre"];
        $Apellidos_Paterno = $reg["Apellidos_Paterno"];
        $Sexo = $reg["Sexo"];
        $Email = $reg["Email"];
        $Foto_Perfil = $reg["Foto_Perfil"];
        $Edad = $reg["Edad"]; 
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
        <title>Ecnuentros - Sport Manager</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- estilos del menu -->
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
        <link rel="stylesheet" type="js" href="js/bootstrap.min.js">
        <link href="menucss/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="menucss/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="menucss/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
        <link href="menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../img/Logo.png" alt="logo" style="top: 0px!important;" class="logo-default" width="150px">
                    </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
                
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
                            <a href="home.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
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
                        <li class="nav-item">
                            <a href="../Torneo/Torneo.php" class="nav-link nav-toggle">
                                <i class="icon-trophy"></i>
                                <span class="title"> Torneos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                               <li class="nav-item">
                                    <a href="../Torneo/Torneo.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo torneo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Torneo/torneosUsuarios.php" class="nav-link ">
                                       <i class="icon-eye"></i>
                                        <span class="title">Ver torneos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item  active open">
                            <a href="Encuentro.php" class="nav-link nav-toggle">
                                <span class="selected"></span>
                                <i class="icon-energy"></i>
                                <span class="title"> Encuentros</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="Encuentro.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo encuentro</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="VerEncuentros.php" class="nav-link ">
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
                   <!-- aqui pones tu codigo-->
                               <div id="myModal" class="modal fade" style="height:400px;">
                                    <div class="modal-header">
                                        <h3>Ver encuentros</h3>
                                    </div>
                                    <div class="modal-body" style="max-height: 400px;">
                                        <p>En esta ventana aprarecerán todos los encuentros en que uno participa y los encuentros que uno crea.</p>
                                        <p>Aparecerá con una breve descripción y el estado actual del encuentro.</p>
                                        <p><span class="badge badge-success">Activo</span> - Cuando el encuentro aún no ha pasado.</p>
                                        <p><span class="badge badge-inverse">No activo</span> - Cuando el encuentro ya pasó.</p>
                                        <p><span class="badge badge-info">Aceptado</span> - Cuando el encuentro fue aceptado por otro equipo.</p>
                                        <p><span class="badge badge-warning">No aceptado</span> - Cuando el encuentro aún no es aceptado por otro equipo.</p>
                                        <p><a href='#' class='btn btn-primary'>Ver</a></td> - Para ver una información más detallada del encuentro.</p>
                                    </div>
                                    <div class="modal-footer navbar-bottom" style="margin-top: 10px;">
                                        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
                                    </div>
                                </div>
                   <div class="row-fluid">
                       <div class="col-xs-12">
                           <div class="row-fluid">
                               <div class="col-xs-12">
                                   <div class="panel panel-primary">
                                       <div class="panel-heading" align="center">
                                           <h3 class="panel-title">Tus encuentros</h3>
                                       </div>
                                       <div class="panel-body">
                                           <div class="col-xs-12">
                                               <table class="table table-striped  table-bordered table-hover table-condensed">
                                                  <tr>
                                                    <th class="col-sm-1"><small>Nombre </small></th>
                                                    <th class="col-sm-1"><small>Deporte</small></th>
                                                    <th class="col-sm-1"><small>Fecha</small></th>
                                                    <th class="col-sm-1"><small>Lugar</small></th>                       
                                                    <th class="col-sm-1"><small>Estado</small></th>
                                                    <th class="col-sm-1"><small>Información</small></th>
                                                   </tr>
                                                   <?php
                                                    $idVar=0;
                                                    $sql="SELECT encuentro.idEncuentro, encuentro.Nombre, deporte.Nombre_Deporte, lugar.Nombre as 'Lugar', encuentro.Fecha, encuentro.HoraIni, encuentro.idEquipo_Retador, encuentro.idEquipo_Aceptado FROM encuentro, deporte, lugar where deporte.idDeporte = encuentro.idDeporte and encuentro.id_Lugar= lugar.idLugar and idTorn=0 and encuentro.idCreador='".$_SESSION["id"]."'";
                                                    $res = mysql_db_query($bd,$sql,$con);
                                                    while ($reg=mysql_fetch_array($res)) {
                                                   ?>
                                                   <tr>
                                                       <td  class="col-sm-1"><small> <?= $reg["Nombre"]?> </small></td>
                                                       <td  class="col-sm-1"><small><?= $reg["Nombre_Deporte"]?></small></td>
                                                       <td class="col-sm-1">
                                                           <small>
                                                               <?php
                                                                    $date = new DateTime($reg["HoraIni"]);
                                                                    echo $date->format('H:i')." ";
                                                                    $date = new DateTime($res["Fecha"]);
                                                                    echo $date->format('d/m/Y');
                                                               ?>
                                                           </small>
                                                       </td>
                                                       <td class="col-sm-1"><small><?=$reg["Lugar"]?></small></td>                       
                                                       <td class="col-sm-1" align="center">
                                                           <small>
                                                               <?php
                                                                   if ($reg['idEquipo_Aceptado'] != "")
                                                                       echo '<span class="badge badge-info">Aceptado</span> / ';
                                                                   else
                                                                       echo '<span class="badge badge-warning">No aceptado</span> / ';
	                                                                $fecha_actual = date("Y-m-d");
                                                                    $datetime1 = date_create($fecha_actual);
                                                                    $datetime2 = date_create($reg['Fecha']);
                                                                    $interval = date_diff($datetime1, $datetime2);
                                                                    $dias = $interval->format('%R%a');
                                                                    if (strpos($dias, '+') !== false) {
                                                                        echo '<span class="badge badge-success">Activo</span>';
                                                                    }
                                                                    else{
                                                                        echo '<span class="badge badge-inverse">No activo</span>';
                                                                    }
                                                               ?>
                                                           </small>
                                                       </td>
                                                       <?php
                                                            echo "<td class='col-sm-1' align='center'><a href='ModificarEncuentro.php?idTorneo=".$reg['idEncuentro']."'  class='btn btn-primary'>Ver</a></td>";
                                                       ?>
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
                    <div class="row-fluid">
                       <div class="col-xs-12">
                           <div class="row-fluid">
                               <div class="col-xs-12">
                                   <div class="panel panel-primary">
                                       <div class="panel-heading" align="center">
                                           <h3 class="panel-title">Encuentros aceptados</h3>
                                       </div>
                                       <div class="panel-body">
                                           <div class="col-xs-12">
                                               <table class="table table-striped  table-bordered table-hover table-condensed">
                                                  <tr>
                                                    <th class="col-sm-1"><small>Nombre </small></th>
                                                    <th class="col-sm-1"><small>Deporte</small></th>
                                                    <th class="col-sm-1"><small>Fecha</small></th>
                                                    <th class="col-sm-1"><small>Lugar</small></th>                       
                                                    <th class="col-sm-1"><small>Estado</small></th>
                                                    <th class="col-sm-1"><small>Información</small></th>
                                                   </tr>
                                                   <?php
                                                    $idVar=0;
                                                    $sqlEquipos = "SELECT idEquipo from equipo where equipo.idCreador='".$_SESSION["id"]."'";
                                                    $res1 = mysql_db_query($bd,$sqlEquipos,$con);
                                                    while ($reg1 = mysql_fetch_array($res1)){
                                                        $sql="SELECT encuentro.idEncuentro, encuentro.Nombre, deporte.Nombre_Deporte, lugar.Nombre as 'Lugar', encuentro.Fecha, encuentro.HoraIni, encuentro.idEquipo_Retador, encuentro.idEquipo_Aceptado FROM encuentro, deporte, lugar where deporte.idDeporte = encuentro.idDeporte and encuentro.id_Lugar= lugar.idLugar and idTorn=0 and idEquipo_Aceptado='".$reg1["idEquipo"]."'";
                                                        $res = mysql_db_query($bd,$sql,$con);
                                                        while ($reg=mysql_fetch_array($res)) {
                                                       ?>
                                                       <tr>
                                                           <td  class="col-sm-1"><small> <?= $reg["Nombre"]?> </small></td>
                                                           <td  class="col-sm-1"><small><?= $reg["Nombre_Deporte"]?></small></td>
                                                           <td class="col-sm-1">
                                                               <small>
                                                                   <?php
                                                                        $date = new DateTime($reg["HoraIni"]);
                                                                        echo $date->format('H:i')." ";
                                                                        $date = new DateTime($res["Fecha"]);
                                                                        echo $date->format('d/m/Y');
                                                                   ?>
                                                               </small>
                                                           </td>
                                                           <td class="col-sm-1"><small><?=$reg["Lugar"]?></small></td>                       
                                                           <td class="col-sm-1" align="center">
                                                               <small>
                                                                   <?php
                                                                       if ($reg['idEquipo_Aceptado'] != "")
                                                                           echo '<span class="badge badge-info">Aceptado</span> / ';
                                                                       else
                                                                           echo '<span class="badge badge-warning">No aceptado</span> / ';
                                                                        $fecha_actual = date("Y-m-d");
                                                                        $datetime1 = date_create($fecha_actual);
                                                                        $datetime2 = date_create($reg['Fecha']);
                                                                        $interval = date_diff($datetime1, $datetime2);
                                                                        $dias = $interval->format('%R%a');
                                                                        if (strpos($dias, '+') !== false) {
                                                                            echo '<span class="badge badge-success">Activo</span>';
                                                                        }
                                                                        else{
                                                                            echo '<span class="badge badge-inverse">No activo</span>';
                                                                        }
                                                                   ?>
                                                               </small>
                                                           </td>
                                                           <?php
                                                                echo "<td class='col-sm-1' align='center'><a href='ModificarEncuentro.php?idTorneo=".$reg['idEncuentro']."'  class='btn btn-primary'>Ver</a></td>";
                                                           ?>
                                                           </tr>
                                                    <?php
                                                        }
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