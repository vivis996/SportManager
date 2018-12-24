<?php 
session_start();
include '../conexion.php';
if (!isset($_SESSION['id'])){
        header("Location: ../../login.php");
    }
$id=$_SESSION["id"];
    if (!isset($_SESSION['errorcontra'])){
        $errorest=0;        
    }else{
        $errorest=$_SESSION["errorcontra"];
    }

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
$ganados=0;
        $jugados=0;
        $perdidos=0;
$sql ="select equipo.Partidos_Ganados as 'ganados', equipo.Partidos_Jugados as 'jugado', equipo.Partidos_Perdidos as 'perdido' from  equipo inner join jugadores on jugadores.idEquipo=equipo.idEquipo where jugadores.Usuarios_idUsuario='$id'";
$res=mysql_db_query($bd,$sql,$con);
if($reg=mysql_fetch_array($res)) {
    try{
        $ganados=$reg["ganados"];
        $jugados=$reg["jugado"];
        $perdidos=$reg["perdido"];
    }catch(Exception $e){
    }
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
        <title>Perfil - Sport Manager</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <!-- estilos del menu -->
        <link href="../../google-font.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="js" href="js/bootstrap.min.js">
        <link href="../menucss/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../menucss/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../menucss/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="../menucss/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico" />
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="../../Home/home.php">
                        <img src="../img/Logo.png" alt="logo" style="top: 0px!important;" class="logo-default" width="150px">
                    </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
                
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="../../img/<?php echo "$Foto_Perfil" ?>" alt="">
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
                            <a href="../../Home/destruirsession.php" class="dropdown-toggle">
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
                            <a href="../../Home/home.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="selected"></span>
                                <span class="title">Home</span>
                            </a>
                        </li>
                        <li class="nav-item active open">
                            <a href="perfil.php" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="selected"></span>
                                <span class="title">Perfil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../Torneo/Torneo.php" class="nav-link nav-toggle">
                                <i class="icon-trophy"></i>
                                <span class="title"> Torneos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                               <li class="nav-item">
                                    <a href="../../Torneo/Torneo.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo torneo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../Torneo/torneosUsuarios.php" class="nav-link ">
                                       <i class="icon-eye"></i>
                                        <span class="title">Ver torneos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../../Home/Encuentro.php" class="nav-link nav-toggle">
                                <i class="icon-energy"></i>
                                <span class="title"> Encuentros</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="../../Home/Encuentro.php" class="nav-link ">
                                       <i class="icon-plus"></i>
                                        <span class="title">Nuevo encuentro</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../Home/VerEncuentros.php" class="nav-link ">
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
        
        
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h2>Perfil</h2>
                    </div>
                    <div class="modal-body">
                        <p>informacion y configuracion: se muestran 3 pestañas, la principal donde se muestran sus datos y puden actulizar su correo<br> la segunda es para cambiar la foto de perfil, selecciona una imagen y la guardas, y se reflejara los cambios.<br>En la tercera pestala es para cambiar contraseña, poniendo la contraseña actual y la nueva contraseña. </p>
                        <p>Torne: te redirecciona para poder ver los torneos</p>
                        <p>chat: en el chat pudes hablar con todos tus amigos de tu equipo para poder organisarse</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
      
                   <!-- aqui pones tu codigo-->
                   
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-sidebar">
                                <div class="portlet light profile-sidebar-portlet ">
                                    <div class="profile-userpic">
                                        <img src="../../img/<?php echo"$Foto_Perfil"?>" class="img-responsive" alt=""> </div>
                                   
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"><?php echo "$Nombre $Apellidos_Paterno" ?> </div>
                                        <div class="profile-usertitle-job"> <?php echo "$Sexo" ?> </div>
                                    </div>
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a>
                                                   <i class="icon-info"></i> Informacion 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../../Torneo/torneosUsuarios.php">
                                                    <i class="icon-trophy"></i> Torneo </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                   
                                <div class="portlet light ">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"><?php echo "$jugados" ?> </div>
                                            <div class="uppercase profile-stat-text"> Encuentros </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"> <?php echo "$ganados" ?> </div>
                                            <div class="uppercase profile-stat-text"> Ganados </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-title"><?php echo "$perdidos" ?> </div>
                                            <div class="uppercase profile-stat-text"> Perdidos </div>
                                        </div>
                                    </div>
                                  <!--  <div>
                                        <h4 class="profile-desc-title">Descripcion del algo xD</h4>
                                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
                                        
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-twitter"></i>
                                            <a href="http://www.twitter.com">twitter</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-facebook"></i>
                                            <a href="http://www.facebook.com">Facebook</a>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Informacion y configuracion</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Informacion</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Cambiar Imagen</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Cambiar contraseña</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre</label>
                                                                <input type="text" readonly placeholder="<?php echo "$Nombre"?>" name="nam" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Apellidos</label>
                                                                <input type="text" name="ape" readonly placeholder="<?php echo"$Apellidos_Paterno"?>" class="form-control" /> </div>
                                                                <div class="form-group">
                                                                <label class="control-label">Genero</label>
                                                                <input type="text" name="gene" readonly placeholder="<?php echo "$Sexo"?>" class="form-control" /> </div>
                                                                <form role="form" method="post" name="formemail" action="guardaremail.php">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="email" placeholder="<?php echo "$Email"?>" name="email" class="form-control" /> </div>
                                                            
                                                            
                                                            
                                                            
                                                            <div class="margiv-top-10">
                                                               <input type="submit" class="btn blue" value="Guardar Cambios">
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <p>En esta sección puedes cambiar tu foto de perfil</p>
                                                        <form role="form" id="form-img" action="../../Torneo/GuardarEquipos.php  " method="post" enctype="multipart/form-data" name="formimg">
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Selecciona imagen </span>
                                                                            <span class="fileinput-exists"> Cambiar </span>
                                                                            <input type="file" name="imagen"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Eliminar </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                              <input type="hidden" name="mio" value="Equipo">
                                                               <a href="javascript:;" class="btn blue" onclick="ValidarEquip();"> Guardar </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <form action="guardarcontra.php" method="post">
                                                            <div class="form-group">
                                                                <label class="control-label">Contraseña actual</label>
                                                                <input type="password" name="actual" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Contraseña nueva</label>
                                                                <input type="password" name="nuevacon" class="form-control" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Repetir contraseña</label>
                                                                <input type="password" name="nuevaconr" class="form-control" /> </div>
                                                            <div class="margin-top-10">
                                                               <input type="submit" class="btn blue" value="Cambiar contraseña">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- BEGIN PORTLET-->
                                   <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                   <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Chat</span>
                                                </div>
                                    </div>
                                <div class="portlet-body" id="chats">
                                    <div class="scroller" style="height: 200px;" data-always-visible="1" data-rail-visible1="1" >
                                        <ul class="chats" >
                                            <div id="contenidochat">
                                            
                                            </div>
                                        </ul>
                                    </div>
                                    
					                <form id="formChat" role="form">
                                        <div class="chat-form">
                                            <div class="input-cont">
                                                <input class="form-control" name="mensaje" type="text" placeholder="Escribir mensaje aqui..." /> </div>
                                            <div class="btn-cont">
                                                <span class="arrow"> </span>
                                                <a href="" class="btn blue icn-only">
                                                    <i class="fa fa-check icon-white" id="enviar"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- END PORTLET-->
                    </div>
                            
                        </div>
                       
                    <!-- aqui termina tu codigo-->
                
        <!-- script  -->
        
         
       
       
        <script src="../menujs/jquery.min.js" type="text/javascript"></script>
        <script src="../menujs/jquery.min.js" type="text/javascript"></script>
        <script src="../menujs/bootstrap.min.js" type="text/javascript"></script>
        <script src="../menujs/bootstrapparachat.min.js" type="text/javascript"></script>
        <script src="../menujs/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../menujs/app.min.js" type="text/javascript"></script>
        <script src="../menujs/layout.min.js" type="text/javascript"></script>
        <script src="../menujs/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../menujs/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../menujs/dashboard.min.js" type="text/javascript"></script>
        
        
<script>
		
			$(document).on("ready", function(){	
                
				registerMessages();
                $.ajaxSetup({"cache":false});
                setInterval("atras()",500);
			});
            function ValidarEquip()
            {
                document.formimg.submit();
            }
    function newemail(){
        document.formemail.submit();
    }
            var registerMessages = function(){
                $("#enviar").on("click",function(e){
                    e.preventDefault();
                    var frm =$("#formChat").serialize();
                    $.ajax({
                        type: "POST",
                        url:"../mensaje.php",
                        data: frm
                    }).done(function(info){
                        console.log("fernando es este"+info);
                    })
                });
            }
            var atras = function(){
                $.ajax({
                    type:"POST",
                    url:"../conversation.php"
                }).done(function(info){
                    $("#contenidochat").html(info);
                });
            }
			
		</script>
        
        <!-- fin script -->
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
    </body>

</html>