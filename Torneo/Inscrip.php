<?php
    session_start();
require_once("conexion.php");

$sqlIdTorneo ="Select * from torneo order by idTorneo desc limit 1";
        $regIdTorneo = mysql_db_query($bd, $sqlIdTorneo,$con);
        $idTorneo2=0;
    if ($resIdTorneo = mysql_fetch_array($regIdTorneo)) {
        $idTorneo2=$resIdTorneo["idTorneo"];
        }
    
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
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
       <title>Inscipción - Sport Manager</title>
         <link href="../google-font.css" rel="stylesheet" type="text/css" />
        <link href="menucss/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="menucss/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="menucss/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="typeahead.css" rel="stylesheet" type="text/css" />
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

        <!-- estilos del menu -->
        
    <div class="container">
        
        <div id="myModal" class="modal fade" >
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header" >
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h2>Inscripciones</h2>
                    </div>
                    <div class="modal-body">
                        <p>Agregar los equipos participantes en el torneo, asi como los jugadores de cada equipo
                        los partidos se van a generar de manera automatica. </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        

<!--///////////////////////////////////////////////////////////////////////////////////-->


<?PHP
    $sql = "select * from jugadores";
    $res= mysql_db_query($bd,$sql,$con);

    while($reg=mysql_fetch_array($res))
    {
        $idEquipo = $reg["idEquipo"];
        $nombreJugador = $reg["Nombre"];
        $Edad = $reg["Edad"];

?>


<div class="row-fluid">
    
        

      <!-------------------  <div id="<?php echo $idEquipo; ?>" class="modal  fade" align="center">

            <div class="modal-header" >
                <button class="close" data-dismiss="modal">&times;</button>
            <h2>Jugadores</h2>
            </div>


            <div class="modal-body">
                

                <table class="table table-striped table table-bordered table table-hover table-condensed">
    <tr>
    
        <th>Nombre</th>
        <th>edad</th>
        <th class="col-sm-2">Correo</th>
        
                                            
    </tr>


    <?PHP

    $sql1 = "select * from jugadores where idEquipo=".$idEquipo;
    $res1= mysql_db_query($bd,$sql1,$con);

    while($reg1=mysql_fetch_array($res1))
    {
        
        $nombreJugador = $reg1["Nombre"];
        $Edad = $reg1["Edad"];
        $correo = $reg1["Jugadorescol"];

?>

<tr>
        <td align="center"> <?php echo $nombreJugador; ?> </td>

        <td align="center"><?php echo $Edad; ?></td>
        <td align="center"><?php echo $correo; ?></td>
    </tr>




<?php

}
?>

    
    

</table>


            </div>

    
<div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
        </div>




    </div>
    
    -------------------------------------->
    
                 <div id="<?php echo $idEquipo; ?>" class="modal  fade" align="center">
                           
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Jugadores</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                
                                                <!-- aqui el contenido del modal-->
                                                
                                                
                                     <table class="table table-striped table table-bordered table table-hover table-condensed">
    <tr>
    
        <th>Nombre</th>
        <th>edad</th>
        <th class="col-sm-2">Correo</th>
        
                                            
    </tr>


    <?PHP

    $sql1 = "select * from jugadores where idEquipo=".$idEquipo;
    $res1= mysql_db_query($bd,$sql1,$con);

    while($reg1=mysql_fetch_array($res1))
    {
        
        $nombreJugador = $reg1["Nombre"];
        $Edad = $reg1["Edad"];
        $correo = $reg1["Jugadorescol"];

?>

<tr>
        <td align="center"> <?php echo $nombreJugador; ?> </td>

        <td align="center"><?php echo $Edad; ?></td>
        <td align="center"><?php echo $correo; ?></td>
    </tr>




<?php

}
?>

    
    

</table>
                                                 
                                                   </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

        


</div>





<?php

}

?>



<!--/////////////////////////////////////////////////////////////////////////////////////-->


<div class="row-fluid">
    <div class="span12">
       
       
       
         <div class="modal fade" id="mymodal" tabindex="-1" role="basic" aria-hidden="true" >
                                       
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" align="center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" >Agregar equipo</h4>
                                                </div>
                                                <div class="modal-body"> 
                                                
                                                <!-- aqui el contenido del modal-->
                                                
                                                <form class="form-horizontal" role="form" name="FormEquipos" action="GuardarEquipos.php" method="post" enctype="multipart/form-data" align="center">

                                                    <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Selecciona imagen </span>
                                                                            <span class="fileinput-exists"> Cambiar </span>
                                                                            <input type="file" name="foto"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Eliminar </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="input-prepend"><input type="text" name="nombre" place-holder="nombre"><span class="add-on"><i class="icon-trophy"></i></span></div>
                        
                                                            <div class="margin-top-10">
                                                              <input type="hidden" name="mio" value="Equipo">
                                                               <input type="hidden" name="invisible" value="Equipo">
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="ValidarEquip();">Guardar</button>

                                                                
                                                            </div>
                                                        </form>
 
                                                 
                                                   </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn blue" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

        

    <!--<div id="mymodal" class="modal  fade" align="center">
        <div class="modal-header" >
            <button class="close" data-dismiss="modal">&times;</button>
            <h2>Agregar equipo</h2>
        </div>

        
        <form class="form-horizontal" role="form" name="FormEquipos" action="GuardarEquipos.php" method="post" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Selecciona imagen </span>
                                                                            <span class="fileinput-exists"> Cambiar </span>
                                                                            <input type="file" name="foto"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Eliminar </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="input-prepend"><input type="text" name="nombre" place-holder="nombre"><span class="add-on"><i class="icon-trophy"></i></span></div>
                        
                                                            <div class="margin-top-10">
                                                              <input type="hidden" name="mio" value="Equipo">
                                                               <input type="hidden" name="invisible" value="Equipo">
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="ValidarEquip();">Guardar</button>

                                                                <a href="javascript:;" class="btn default"> Cancelar </a>
                                                            </div>
                                                        </form>


        <div class="modal-body">
    


        </div>
        <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
        </div>
    </div>-->


        <div id="jugadores" class="modal  fade" align="center">
            <div class="modal-header" >
                <button class="close" data-dismiss="modal">&times;</button>
                <h2>Agregar Jugador</h2>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="ejemplo_email_3"
                     placeholder="Nombre">                              
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ejemplo_password_3" class="col-lg-2 control-label">Edad</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="ejemplo_password_3" 
                     placeholder="Edad">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ejemplo_password_3" class="col-lg-2 control-label">Correo</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="ejemplo_password_3" 
                     placeholder="email">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-default">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
            </div>
        </div>




    </div>
</div>

<div class="row-fluid">
            <div class="span12">
            <ul class="nav nav-tabs nav-justified">

                <li ><a href="#">
                    <span class="glyphicon glyphicon-wrench"></span>
                Configuracion</a></li>
                <li class="active"><a href="#">
                    <span class="icon-pencil">                  
                    </span>Inscripcion</a></li>
 
                <li><a href="#"><span class="glyphicon glyphicon-calendar"></span>Tabla y calendario</a></li>

        </ul>
            </div>
        </div>
        
            <p>&nbsp;</p>
    
        <div class="row-fluid">
            <div class="span12">
            
                <div class="row-fluid">

                    <div class="span12">
                
                        <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="span12">

                                    <table class="table table-striped table table-bordered table table-hover">
                                        <tr>
                                            <th>Num.</th>
                                            <th>Logo</th>
                                            <th>Nombre</th>
                                            <th class="col-sm-1">Jugadores Actuales</th>
                                            <th align="center">Agregar</th>
                                            
                                        </tr>

                                        

                                                

                                                <?PHP

                                                global $idTorneo2;
                                                                    $sql = "select * from equipo where idTorneo= ".$idTorneo2." order by puntos DESC";
                                                                        $res= mysql_db_query($bd,$sql,$con);
                                                                    $i=1;
                                                                    while($reg=mysql_fetch_array($res))
                                                                        {
                                                                        $file = $reg["Logo"];
                                                                        $nombre= $reg["Nombre"];
                                                                        $jugadoresActuales = $reg["Jugadores_Actuales"];
                                                                        $idEquipo = $reg["idEquipo"];
                                                                        $jugadoresActuales = $reg["Jugadores_Actuales"];

                                                                                    ?>
                                                                                <tr>
                                                                                <td><?php echo $i; ?></td>
                                                                            <td align="center"><img width="50" height="50" src="img/<?php echo $file; ?>" ></td>                                            <td><?php echo $nombre; ?></td>
                                            <td align="center"><?php echo $jugadoresActuales; ?>
                                            <br>
                                            <a href="#<?php echo $idEquipo; ?>" data-toggle="modal" class="btn btn-primary"style="float: right;">Ver</a></td>
                                            <td class="col-sm-1" align="center"><a  href="#<?php echo $nombre; ?>" data-toggle="modal" class="btn btn-primary">Agregar Jugador</a>
                                            </td>
                                            </tr>

                                    
                                                
                                                
                                    <div id="<?php echo $nombre; ?>" class="modal fade" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Jugadores</h4>
                                                </div>
                                                <form  class="form-horizontal" role="form" action="GuardarJugador.php" method="POST">
                                                <div class="modal-body">
                                                    
                                                        <br>
                                                        <div class="form-group" style="border:3px!important;">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-font"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Nombre" data-tabindex="1" name="nombre"> </div>
                                            </div>
                                                        
                                                        <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Correo" data-tabindex="1" name="correo"> </div>
                                            </div>
                                                        
                                                        <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Edad" name="edad"> </div>
                                                    <input type="hidden" name="id_equipo" value="<?=$idEquipo ?>" >
                                                    <input type="hidden" name="jugadoresAc" value="<?=$jugadoresActuales ?>" >
                                                    <input type="hidden" name="id_equipo" value="<?=$idEquipo ?>" >
                                            </div>
                                    <div class="modal-footer">
                                                  
                                                   <input type="submit" class="btn blue " value="Agregar jugador">
                                                    <button type="button" class="btn blue" data-dismiss="modal">Cerrar</button>
                                                </div>
                                                </div>
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                                                                <?php
                                                                                $i++;
                                                                            }

                                                                            ?>


                                    </table>


                                    <div class="row-fluid btn-group btn-group-justified">
            <div class="span12">
                

               <!-- <input type="text" class="btn btn-primary col-xs-1" style="float: right;" value="Continuar">-->
                <a href="todos.php"  class="btn btn-primary" style="float: right;">Continuar</a>
                

                <?php

                $sqlLimiteDeEquipos = "select Numero_Equipos,LimiteEquipo from torneo where idTorneo= ".$idTorneo2. "";
                $resLimiteDeEquipos = mysql_db_query($bd,$sqlLimiteDeEquipos,$con);
                
                if($regLimiteDeEquipos = mysql_fetch_array($resLimiteDeEquipos)) {
                    
                        if($regLimiteDeEquipos["Numero_Equipos"]!=$regLimiteDeEquipos["LimiteEquipo"])
                        {
                            echo "<a href='#mymodal' data-toggle='modal' class='btn btn-primary'>Agregar Equipo</a>";
                        }
                }

                

                 ?>
                
                    


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
    

        
        <!-- fin script -->
    </body>

</html>