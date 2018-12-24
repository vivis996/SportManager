<?php
require_once("conexion.php");


                    
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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="menucss/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="menucss/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="menucss/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="menucss/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/funciones.js"></script>
        </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
      
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="home.php">
                        <img src="images/1.jpg" alt="logo" class="logo-default" width="86px" height="14px"> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="images/usuario.png" alt="">
                                <span class="username username-hide-on-mobile"> Fernando </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> Mi perfil </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
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
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Home</span>
                                
                            </a>
                        </li>
                        
                        <li class="nav-item  active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="selected"></span>
                                <span class="title">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-trophy"></i>
                                <span class="title"> Torneos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                       <i class="icon-home"></i>
                                        <span class="title">Inscripcion</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                       <i class="icon-calendar"></i>
                                        <span class="title">Tabla y Calendario</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                       <i class="icon-settings"></i>
                                        <span class="title">Configuracion</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-energy"></i>
                                <span class="title"> Encuentros</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                      <i class="icon-plus"></i>
                                        <span class="title">Crear Encuentro</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui_colors.html" class="nav-link ">
                                      <i class="icon-eye"></i>
                                        <span class="title">Ver Encuentros</span>
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


<div class="row-fluid">
      <div class="col-xs-12">
      <ul class="nav nav-tabs nav-justified">

          <li ><a href="Torneo.html">
            <span class="glyphicon glyphicon-wrench"></span>
          Configuracion</a></li>
          <li ><a href="#">
            <span class="glyphicon glyphicon-pencil">         
            </span>Inscripcion</a></li>
          <li class="active"><a href="#"><span class="glyphicon glyphicon-calendar"></span>Tabla y calendario</a></li>
    </ul>
      </div>
    </div>
    
      <p>&nbsp;</p>

      <div class="row-fluid">
      <div class="col-xs-12">

       <div class="row-fluid">

          <div class="col-xs-12">

      <div class="panel panel-default">
        <div class="panel-heading" align="center">
            <h3 class="panel-title">Tabla de posiciones</h3>
        </div>
        <div class="panel-body">
         
            <table class="table table-striped table-bordered table-hover table-condensed col-sm-8">
            <tr>
                <th  class="col-sm-1">Equipo</th>
                <th  class="col-sm-1">Partidos Jugados</th>
                <th  class="col-sm-1">Partidos Ganados</th>
                <th  class="col-sm-1">Partidos Empatados</th>
                <th  class="col-sm-1">Partidos Perdidos</th>
                <th  class="col-sm-1">Puntos</th>
            </tr>

            <?php

                $sqlTabla = "select * from equipo order by puntos DESC";
                $resTabla = mysql_db_query($bd, $sqlTabla,$con);

                while ($regTabla = mysql_fetch_array($resTabla)) {

                    ?>


                    <tr>
                        <td><img src="img/<?php echo $regTabla["Logo"]; ?>" width="50" height="50"><br><label for=""><?php echo $regTabla["Nombre"]; ?> </td>
                        <td><?php echo $regTabla["Partidos_Jugados"]; ?></td>
                        <td><?php echo $regTabla["Partidos_Ganados"]; ?></td>
                        <td><?php echo $regTabla["PartidosEmpatados"]; ?></td>
                        <td><?php echo $regTabla["Partidos_Perdidos"]; ?></td>
                        <td><?php echo $regTabla["Puntos"]; ?></td>
                    </tr>



                    <?php
                    
                }


            ?>




        </table>



        </div>
    </div>

    </div>
    </div>

    </div>

    </div>


    
    <div class="row-fluid">
      <div class="col-xs-12" align="center">
              <div class="row-fluid">

          <div class="col-xs-12">

           <div class="panel panel-default">
                <div>
                
                <div class="col-xs-12 well">

                    <h2>Jornadas</h2>
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
        
            <div class="panel panel-default">
                <div class="panel-body">
                
                <div class="col-xs-12">
                <!--vueltas-->

                <?php

                $pila = array();
 

                $sql ="select * from equipo";
                $res = mysql_db_query($bd, $sql,$con);

                while ($reg = mysql_fetch_array($res)) {
                array_push($pila,$reg["idEquipo"]);
                }


                        function Combinar()
                        {
                        global $claves;
                        global $pila;
                        $pilaEquipos = array();
                        $claves = array_keys($pila);
                        $partidos =count($pila);
                        $buffer = $pila[count($pila)-1];
    //echo "es este".$partidos;
                        for($i=$partidos-1;$i>1;$i--)
                        {
                            $pila[$claves[$i]] = $pila[$claves[$i-1]] ; // Imprime orange.
                            array_push($pilaEquipos,$pila[$claves[$i]]);

 
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


                    ?>

                        <form class="form-horizontal" role="form" name="FormEquipos" action="GuardarResultados.php" method="post">

                    <table class="table table-striped table table-bordered table table-hover">
                      <tr>
                        <th  class="col-sm-2">Equipo 1</th>
                        
                        <th class="col-sm-2">resultado</th>
                        <th class="col-sm-2">Equipo 2</th>
                        

                        </tr>

                    <?php



                    for ($i = 0, $j=$partidos-1; $i<$j; $i++, $j--) {

                        //echo $pila[$claves[$i]]."vs".$pila[$claves[$j]]."<br><br>" ;

                            $sql1 = "select idEquipo,Nombre,Logo from equipo where idEquipo=".$pila[$claves[$i]];
                            $res1 = mysql_db_query($bd, $sql1,$con);

                            if($reg1=mysql_fetch_array($res1))
                            {
                                $idEqupo1 = $reg1["idEquipo"];

                                $sqlJornada= "select idEncuentro,Jornada,ResultadoEquipoRetador,ResultadoEquipoAceptado from encuentro where idEquipo_Retador = ".$pila[$claves[$i]]." AND idEquipo_Aceptado =".$pila[$claves[$j]];
                                $resJornada = mysql_db_query($bd, $sqlJornada,$con);
                                $jornadaCajaDeTexto="";
                                $jornadaDePartido="";
                                $ResultadoEquipoRetador="";
                                $ResultadoEquipoAceptado="";
                                if($regJornada=mysql_fetch_array($resJornada))
                                {
                                    $jornadaCajaDeTexto=$regJornada["idEncuentro"];
                                    $jornadaDePartido = $regJornada["Jornada"];
                                    $ResultadoEquipoRetador = $regJornada["ResultadoEquipoRetador"];
                                    $ResultadoEquipoAceptado = $regJornada["ResultadoEquipoAceptado"];
                                }
                            

                            ?>

                    <tr >
                      <td align="center"></label><img src="img/<?php echo $reg1["Logo"] ?>" width="50" height="50"><br><label for=""><?php echo $reg1["Nombre"]; ?> </td>
                      <td align="center"><input type="text"  value="<?= $ResultadoEquipoRetador ?>" name="Resultadouno<?=$jornadaCajaDeTexto?>" size="5" >---<input type="text"  value="<?= $ResultadoEquipoAceptado?>" name="Resultadodos<?=$jornadaCajaDeTexto?>" size="5" ></td>
                            <?php

                            }


                            $sql2 = "select idEquipo,Nombre,Logo from equipo where idEquipo=".$pila[$claves[$j]];
                            $res2 = mysql_db_query($bd, $sql2,$con);

                            if($reg2=mysql_fetch_array($res2))
                            {

                                ?>

                                <td align="center"><img src="img/<?php echo $reg2["Logo"] ?>" width="50" height="50"><br><label for=""><?php echo $reg2["Nombre"]; ?></td>
                                
                                </tr>
                                <?php

                                

                            }

        
                        }

                        ?>

                        </table>

                        <?php

                        global $pilaEquipos;

                         ?>
                            
                        <div class="col-xs-4 col-md-offset-4" >
                        <input type="hidden" name="idResultado" value="<?=$jornadaDePartido?>">
                        
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar">
                    <!--<button type="button" class="btn btn-primary btn-lg btn-block" onclick="ValidarEquip();">Guardar</button>-->
                    </div>
                        </form>


                        <?php
                    }


                            //////////////////main/////////////////
                    $count=1;
                        for ($i = 1; $i < count($pila); $i++) {

                                ?>

                                <legend>Jornada <?php echo $i; ?></legend>


                                <?php


                            mostrar();
                            combinar();
                            $count++;
                        }




                ?>
                </div>
                <!-- fin de las vueltas-->


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