<?php
    session_start();
    if (isset($_SESSION['id'])){
        header("Location: Home/home.php");
    }
?>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login - Sport Manager</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        
        <link href="google-font.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="Perfil/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="Perfil/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="Perfil/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="Perfil/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="Perfil/assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES --> 
        </head>
    <!-- END HEAD -->

    <body class=" login" style="padding-top: 1%!important">
        <!-- BEGIN LOGIN -->
         <div class="logo">
         <a href="login.php">
            <img src="img/logo.png"  style="height:3.5em;"/>
             </a>
        </div>
        <div class="content" style="border-radius:10%!important">
          
            <!-- BEGIN LOGIN FORM -->
            
            <form class="login-form" action="Perfil/logear.php" method="post">   
                         
           <br>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> No ingreso ningun dato </span>
                </div>
                <div class="form-group">
                   
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="contra" /> </div>
                </div>
                <div class="form-actions">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1" /> Recordar </label>
                    <button type="submit" class="btn green pull-right"> Entrar </button>
                </div>
                <div class="create-account">
                    <p> No te has registrado aun?&nbsp;
                        <a href="javascript:;" id="register-btn" style="color:blue;"> Crea una cuenta </a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="Perfil/registrar.php" method="post">
                <h3>Registro</h3><br>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nombre</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre" name="Nombre" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Apellidos</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Apellidos" name="Apellidos" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" /> </div>
                </div>
                    <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Edad</label>
                    <div class="input-icon">
                        <i class="fa fa-sort-numeric-asc"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Edad" name="edad" /> </div>
                </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Genero</label>
                        <div class="input-icon">
                           <i class="fa fa-transgender"></i>
                            <select class="bs-select form-control" data-show-subtext="true" name="genero">
                                <option data-icon="fa-glass icon-success" value="Masculino">Masculino</option>
                                <i class="fa fa-transgender"></i>
                                <option data-icon="fa-heart icon-info" value="Femenino">Femenino</option>
                            </select>
                        </div>
                    </div>
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="contra" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Repetir contraseña</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repetir contraseña" name="rcontra" /> </div>
                    </div>
                </div>
                <br>
                <div class="form-actions">
                    <button id="register-back-btn" type="button" class="btn red btn-outline"> Regresar </button>
                    <button type="submit" id="register-submit-btn" class="btn green pull-right"> Crear Cuenta! </button>
                </div>
            </form>
            <li class="dropdown dropdown-quick-sidebar-toggler" style="list-style-type: none;">
                <a href="#" data-target="#myModal" data-toggle="modal" style="color:blue;" Onclick="Play()">
                    <i class="icon-question"></i>
                    Ayuda
                </a>
            </li>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header" >
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h2>Ayuda</h2>
                        </div>
                        <div class="modal-body">
                            <div id="div-video2" align="center">
                                <video id="video12" width="550" controls>
                                    <source src="video/Promocional.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button Onclick="Pause()" type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            var myVideo =  document.getElementById("video12");
            function Pause(){
                myVideo.pause();
            }
            function Play(){
                myVideo.play();
            }
        </script>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2016 &copy; Sport Manager </div>
        <!-- END COPYRIGHT -->
        
        <!-- BEGIN CORE PLUGINS -->
        <script src="login/jquery.min.js" type="text/javascript"></script>
        <script src="login/bootstrap.min.js" type="text/javascript"></script>
        <script src="login/js.cookie.min.js" type="text/javascript"></script>
        <script src="login/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="login/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="login/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="login/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="login/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="login/jquery.validate.min.js" type="text/javascript"></script>
        <script src="login/additional-methods.min.js" type="text/javascript"></script>
        <script src="login/select2.full.min.js" type="text/javascript"></script>
        <script src="login/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="login/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="login/login-4.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>