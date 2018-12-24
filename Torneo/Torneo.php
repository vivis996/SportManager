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
    if (!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }
require_once("conexion.php");

$sql = "select Nombre_Deporte from deporte";
$res = mysql_db_query($bd,$sql,$con);

//$i=0;


?>

<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
       <title>Nuevo Torneo - Sport Manager</title>
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

    <script type="text/javascript" src="js/funciones.js"></script>
        </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
      
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../img/Logo.png" alt="logo" style="top: 0px!important;" class="logo-default" width="150px"> </a>
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
                            <a href="../Home/destruirsession.php" class="dropdown-toggle">
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
                   
                   
                   <!-- aqui pones tu codigo-->


        <div class="container">
        
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header" >
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h2>Crear torneo</h2>
                    </div>
                    <div class="modal-body">
                        Ingresa la informacion general del torneo(nombre,costos,fechas)
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="col-xs-12">
            <ul class="nav nav-tabs nav-justified">

                <li class="active"><a href="#">
                    <span class="glyphicon glyphicon-wrench"></span>
                Configuracion</a></li>
                <li class="disabled"><a href="#">
                    <span class="glyphicon glyphicon-pencil">                   
                    </span>Inscripcion</a>

                    </li>
                <li  class="disabled"><a href="#"><span class="glyphicon glyphicon-calendar"></span>Tabla y calendario</a></li>
        
        </ul>
            </div>
        </div>
        <p>&nbsp;</p>

    
        
        <div class="row-fluid">

            <div class="col-xs-12">
                
                <div class="panel panel-default">
                <div class="panel-body">
                
                <form class="form-horizontal" role="form" name="form" action="GuardarTorneo.php" method="post">
                    <legend>Datos Torneo</legend>
                    <div class="col-xs-12">
                    <div class="col-xs-4">
                    <label>Nombre</label><input  name="nombre" type="text" class="form-control" placeholder="Ingresar nombre del torneo">
                    </div>

                    <div class="col-xs-3">
                    
                        <label>Deporte</label>
                        
                        <select class="form-control" name="Deporte">
                            
                                <?php

                                while ($reg=mysql_fetch_array($res)) {
    
                                        ?>

                                    <option value= "<?php echo$reg['Nombre_Deporte']?>";><?php echo$reg['Nombre_Deporte']?></option>

                                        <?php
                                    }
                                ?>
                        </select>

                    </div>

                    <div class="col-xs-3">
                    
                        <label>Limite de equipos</label>
                        <input type="text" class="form-control " name="LimiteEquipos">

                    </div>
                    <div class="col-xs-2">
                    
                        <label>Edad Limite</label>
                        <input type="text" class="form-control" name="EdadLimite">

                    </div>

                    </div>


                    <p>&nbsp;</p>
                    <legend>Costos</legend> 
                            <!--Declaracion de los formularios recompensa y descripcion-->
                    <div class="col-xs-12">

                            <div class="col-xs-4">
                    
                                <label>Costo Inscripcion</label>
                                <input type="text" class="form-control" name="CostoInscripcion">
                            </div>

                            <div class="col-xs-4">
                    
                                <label>Costo Credenciales</label>
                                <input type="text" class="form-control" name="CostoCredencial">

                            </div>

                    </div>

                    <p>&nbsp;</p>
                    <legend>Fechas</legend> 

                        <div class="col-xs-6">
                            <label>Fecha limite Incripcion</label>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-6 text-center" >
                    
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="FechaLimite">
                                        
                                    </div>
                                    
                                    <div class="col-xs-4">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label>Fecha inicio del torneo</label>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-xs-3">
                                    </div>
                                    <div class="col-xs-6 text-center" >
                    
                                        
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="FechaInicio">
                                        

                                    </div>
                                    

                                    <div class="col-xs-4">
                                    </div>

                                </div>
                            </div>
                        </div>
                                    
                    <p>&nbsp;</p>
                    <legend>Informacion</legend>    
                    <!--Declaracion de los formularios recompensa y descripcion-->
                    <div class="col-xs-12">

                            <div class="col-xs-6">
                    
                                <label>Recompensas</label>
                                <textarea class="form-control" rows="6" name="Recompensas"></textarea>

                            </div>

                            <div class="col-xs-6">
                    
                                <label>Descripcion</label>
                                <textarea class="form-control" rows="6" name="Descripcion"></textarea>

                            </div>

                    </div>
                    <p>&nbsp;</p>
                    <legend></legend>
                    <div class="col-xs-4 col-md-offset-4" >
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="validar();">Guardar</button>
                    </div>
                </form>
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