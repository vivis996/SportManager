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
        <title>Home - Sport Manager</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- estilos del menu -->
        <link href="../google-font.css" rel="stylesheet" type="text/css" />
        
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
                            <a href="#" data-target="#myModal" data-toggle="modal">
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
                <div class="page-sidebar navbar-collapse collapse"  style="position:fixed;">
                   
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 0px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li>
                        <!-- aqui empiesa el menu -->
                        <li class="nav-item active open">
                            <a href="home.php" class="nav-link nav-toggle">
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
                        
                        <li class="nav-item">
                            <a href="Encuentro.php" class="nav-link nav-toggle">
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
                   <?php
                        require_once("conexion.php");
                        $sql_Deportes = "SELECT Nombre_Deporte FROM deporte";
                        $deportes = mysql_db_query($bd, $sql_Deportes, $con);
                        $file = fopen("home_recarga.txt", "w");
                        fwrite($file, "----". PHP_EOL);
                        fclose($file);
                    ?>
                    <html>
                        <head>
                            <title>Home</title>
                        </head>
                        <body>
                            <div class="container">
                               <div id="myModal" class="modal fade" style="height:570px;">
                                    <div class="modal-header">
                                        <h3>Como buscar un encuentro o torneo</h3>
                                    </div>
                                    <div class="modal-body" style="max-height: 440px;">
                                        <p>Cuando uno ingresa al "home" la página le pedirá que le de acceso a su ubicación para que pueda ubicarlo en el mapa.</p>
                                        <p>Una vez ubicado en el mapa automáticamente se mostrarán los encuentros que se encuentran alrededor de su ubicación. Para buscar otros encuentros en otra <span class="label label-warning">ubicación</span>, muevase por el mapa hasta que encuentre el lugar que desea, y de clic en "Buscar" y se mostrarán en la página y en el mapa todos los encuentros en esa zona; para ver con detalle la <span class="label label-warning">ubicación</span> del encuentro, seleccione el pin con su nombre en el mapa.</p>
                                        <p>Los <span class="label label-info">torneos</span> se mostrarán sin importar su ubicación.</p>
                                        <h4>Filtrar</h4>
                                        <p>Por <span class="label label-inverse">deporte</span>, se seleccionan los deportes de la lista que desea ver; para quitarlos clic en la esquina superior derecha.</p>
                                        <p>Por <span class="label label-inverse">tipo</span>, se seleccciona si desean verse encuentros, torneos o encuentros y torneos.</p>
                                        <p>Por <span class="label label-inverse">fecha</span>, se selecciona en la lista de estado, si se desean ver los que falta por jugar, los que ya se jugaron o todos.</p>
                                    </div>
                                    <div class="modal-footer navbar-bottom" style="margin-top: 35px;">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                                    </div>
                                </div>
                                <!-- a href="#myModal" -->
                                
                                <div class="span12" style="">
                                    <div class="span9" style="margin-left:0px;">
                                        <div class="span8">
                                            
                                            <div class="span6">
                                                <div class="page-header">
                                                    <h2>Eventos y torneos</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <ul id="alldeportes" class="thumbnails"></ul>
                                    </div>
                                    <div class="span3" style="margin-left:15px;">
                                        <div class="clearfix">
                                            <div class="page-header">
                                                <h2>Filtrado</h2>
                                            </div>
                                            
                                            <div id="googleMap" style="width:250px;height:350px;"></div>
                                            <form name="filtraform" action="filtrado">
                                                <label>Tipo</label>
                                                <select onchange="changeEncTor(this.value)">
                                                    <option value="Enc\Tor">Encuentros\Torneos</option>
                                                    <option value="Encuentros">Encuentros</option>
                                                    <option value="Torneos">Torneos</option>
                                                </select>
                                                <label>Deporte</label>
                                                <select name="deportes" onchange="changeSport(this.value)">
                                                    <option value="--------">--------</option>
                                                    <?php
                                                        while ($res = mysql_fetch_array($deportes))
                                                        {
                                                            echo "<option value=\"".$res["Nombre_Deporte"]."\">".$res["Nombre_Deporte"]."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <label title="Los encuentros y los torneos futuros o pasados.">Estado</label>
                                                <select name="tiempo" onchange="changeTiempo(this.value)" title="Los encuentros y los torneos futuros o pasados.">
                                                    <option value="Por jugar">Por jugar</option>
                                                    <option value="Pasados">Pasados</option>
                                                    <option value="Todos">Todos</option>

                                                </select>
                                                <div class="span2 btn" Onclick="changeSport('')" title="Busca todos los encuentros y torneos">Buscar</div>
                                            </form>
                                            <br>
                                            <br>
                                            <div class="span3" id="selectdeportes"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="lalo"></div>
                            <div class="span12">&nbsp;</div>
                            <script src="js/jquery.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="home_google.js"></script>
                            <script src="http://maps.googleapis.com/maps/api/js"></script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoFb5L_04-60bVlMOtuR-Dewd6x-ly2Ao&callback=initMap"></script>
                            <script src="home_recarga.js"></script>
                            <script src="js/Concurrent.Thread.js"></script>
                        </body>
                    </html>
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