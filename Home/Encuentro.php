<?php 
    session_start();
    if (!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }
    include 'conexion.php';
    $file = fopen("home_recarga.txt", "w");
    fwrite($file, "----". PHP_EOL);
    fclose($file);
    $id=$_SESSION["id"];
    $sql ="select * from usuarios where idUsuario='$id'";
    $res=mysql_db_query($bd,$sql,$con);
    while($reg=mysql_fetch_array($res)) {
        
        $Nombre_Usario_actual=$reg["Nombre"];
        $Foto_Perfil_Usario_actual=$reg["Foto_Perfil"];   
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
    
       	<title>Agregar Encuentro - Sport Manager</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico"/>
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
        </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
      <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../img/Logo.png" alt="logo" style="top: 0px!important;" class="logo-default" width="150px"> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img src="../img/<?php echo "$Foto_Perfil_Usario_actual" ?>" alt="">
                                <span class="username username-hide-on-mobile"> <?php echo "$Nombre_Usario_actual" ?> </span>
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
                        <li class="nav-item">
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
                        
                        <li class="nav-item active open">
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
                   <div id="myModal" class="modal fade" style="height:660px;left:50%;top:3%;">
                                    <div class="modal-header">
                                        <h3>Crear encuentro</h3>
                                    </div>
                                    <div class="modal-body" style="max-height: 500px;">
                                        <p>Esta pagina es para crear un nuevo encuentro publico, debes llenar todos los campos excepto los de recompensa y descripción que son opcionales, en el campo de quipo retador se debe seleccionar un equipo de los que el usuario de la sesión sea miembro.</p>
                                        <p>Si se quiere agregar un nuevo equipo presione el recuadro con el texto "otro equipo" cuando se seleccione aparecera el campo de nuevo equipo en el se ingresa el nombre del nuevo equipo.</p>
                                        <p>La fecha del encuentro se selecciona tanto dandole click a la pequeña flecha al extremo derecho del campo que despliega un calendario en el que podemos seleccionar el dia o ingresando la fecha manualmente en el formato de Dia/Mes/Año(dd/mm/aaaa).</p>
                                        <p>La hora del encuentro se ingresa de forma manual en el formato de Horas:Minutos periodo del dia (hh:mm am/pm).</p>
                                        <p>En el campo de lugar se muestran los lugares que estan guardados en la base de datos, en caso de querer agregar un nuevo campo se selecciona el campo "Nuevo lugar" que despliega un campo de texto en el que debe ingresarse el nombre del nuevo lugar y dar click sobre el lugar dentro del mapa posicionado más abajo.</p>
                                        <p>Los campos de recompensa y descripcion no son obligatorios para guardar el encuentro.</p>
                                        <p>Se necesita dar click en el boton de guardar para que el evento se publique.</p>
                                    </div>
                                    <div class="modal-footer navbar-bottom" style="margin-top: 30px;">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                                    </div>
                                </div>
                   
                   <!-- aqui pones tu codigo-->
               <?php
				$bd="sports";
				$con = mysql_connect("localhost","root","");
				$sql_Deportes = "SELECT idDeporte,Nombre_Deporte FROM deporte";
				$deportes = mysql_db_query($bd, $sql_Deportes, $con);
				$sql_equipos ="SELECT idEquipo,Nombre from equipo where idCreador=".$id;
                $sql_equipos1 ="SELECT idEquipo,Nombre from equipo";

				$equipos = mysql_db_query($bd,$sql_equipos,$con);
				$equipos2 = mysql_db_query($bd,$sql_equipos1,$con);
                   $sql_Lugar = "SELECT idLugar,Nombre FROM lugar";
                    $lugar=mysql_db_query($bd, $sql_Lugar, $con);
                    $check="no";
				?>
				<div class="panel panel-default ">
				<div class="panel-heading">Nuevo Encuentro</div>
				<div class="panel-body">
				<form method="POST" action="GuardarEncuentros.php">
				<br>
				<br>
				<br>
				<div class="container-fluid">
					<div class="row">
					<div class="span4 offset1">
						<div class="panel panel-primary ">
						 <div class="panel-heading">Encuentro</div>
						  <div class="panel-body">
						<label for="nombre">Nombre del encuentro:</label>
						<input type="text"  name="nombre" required="">
							<br>
							<br>
						<label for="deporte">Deporte:</label>
							<select name="deporte" required="">
			       				<?php
			       				while ($res = mysql_fetch_array($deportes))
								{
							
									 echo "<option value=\"".$res["idDeporte"]."\">".$res["Nombre_Deporte"]."</option>"; 
						
								}
								?>
							</select>

						  </div>
						</div>
					</div>
						<div class="span4 offset1">
					<div class="panel panel-primary ">
						 <div class="panel-heading">Equipos</div>
						  <div class="panel-body">
						  <label for="equipo1">Equipo retador:</label>
						<select id="equipo1" name="equipo1" required="">
			       		<?php
                        echo "<option value='------------'>-------------------</option>";

			       		$res2=$equipos;
			       		while ($res = mysql_fetch_array($equipos))
						{
							?>
							<?php echo "<option value=\"".$res["idEquipo"]."\">".$res["Nombre"]."</option>"; ?>
						<?php
							}
						?>
						</select>
						<br>
						<input onClick="clicequipo(this.checked)" type='checkbox' name='check'><label for='check'>Otro equipo</label>
						<div id="otroequipo" style="display: none;">
                               <br>
                                <label>Nuevo equipo</label>
                                <input type="text" name="nuevoequipo">
                        </div>
                        <script>
                            function clicequipo(hola) {
                             var x3 = "no";
                            if(!hola){
                                document.getElementById('otroequipo').style.display = 'none';
                                document.getElementById('equipo1').disabled=false;
                            } 
                            else{
                                document.getElementById('otroequipo').style.display = 'block';
                                document.getElementById('equipo1').disabled=true;
                            }       
                            $("input[name=isChecket]").val(x3);                   
                         }                  
                              
                        </script>
						<br>
						<label for="equipo2">Equipo a retar:</label>
						<select name="equipo2">

			       		<?php
                        echo "<option value='------------''".$readonly.">-------------------</option>";

			       		$res2=$equipos;
			       		while ($res = mysql_fetch_array($equipos2))
						{
							?>
							<?php echo "<option value=\"".$res["idEquipo"]."\">".$res["Nombre"]."</option>"; ?>
						<?php
							}
						?>
					</select>
						  </div>
						
					</div>
						</div>
							<div class="span4 offset1">
					<div class="panel panel-primary ">
					 <div class="panel-heading">Lugar y Fecha</div>
						  <div class="panel-body">
						    <label for="fecha">Fecha del encuentro:</label><input type="date" name="fecha" required="">
						    <br>
							<label for="hora">Hora del encuentro:</label><input type="time" name="hora" required="">
							<br>
                       <label for="hora">Lugar:</label>
                        <br>
                        <select  onchange="changeLugar(this.value)" name="lugar" id="select">
                        <?php
                        while ($res = mysql_fetch_array($lugar))
                        {
                             
                             echo "<option value=\"".$res["idLugar"]."\">".$res["Nombre"]."</option>"; 
                         
                        }
                        ?>
                        </select>

                        <br>
                        <br>



                            <input onClick="cliceven(this.checked)" type='checkbox' name='check'><label for='check'>Otro lugar</label>

                            <div id="otrolugar" style="display: none;">
                               <br>
                                <label for='agregarlugar'>Nuevo Lugar</label>
                                <input type="text" name="lugar1">
                            </div>
						  </div>
						</div>


						
					</div>
					</div>	
                        <script type="text/javascript">
                         function cliceven(hola) {
                             var x3 = "no";
                            if(!hola){
                                document.getElementById('otrolugar').style.display = 'none';
                                document.getElementById('select').disabled=false;
                                 x3 = "no";
                                 mapaActivado = false;
                                deleteMarkers();
                                Lugar();
                            } 
                            else{
                                document.getElementById('otrolugar').style.display = 'block';
                                document.getElementById('select').disabled=true;
                              x3 = "si";
                                mapaActivado = true;
                                deleteMarkers();
                            }       
                            $("input[name=isChecket]").val(x3);                   
                         }                  
                        </script>
					<div class="row">
						
							<div class="span4 offset1">
							<div class="panel panel-primary ">
								 <div class="panel-heading">Otros</div>
						  		<div class="panel-body">
						  			<label for="recompensa">Recompensa para el ganador:</label>
									<input type="text" name="recompensa">
						
									<label for="descripcion">Descripcion:</label>
									<input type="text" name="descripcion">	
								  </div>
							</div>

							</div>

                            <div class="span4 offset1" id="googleMap" style="width:300px; height: 200px; ">
                                
                            </div>
					
							<div class="span4 offset2">
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
                            <input type="hidden" name="idCreador" <?php echo "value= $id" ?>>
                                <input  type="hidden" name="isChecket">
								 <button type="submit" class="btn btn-primary">Guardar</button> 
							</div>
					</div>
                    </div>
				</form>

					
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
        <script src="encuentro_google.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoFb5L_04-60bVlMOtuR-Dewd6x-ly2Ao&callback=initMap"></script>
                            
        <!-- script  -->
        <script src="menujs/jquery.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/Concurrent.Thread.js"></script>
        <script src="menujs/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="menujs/app.min.js" type="text/javascript"></script>
        <script src="menujs/layout.min.js" type="text/javascript"></script>
        <script src="menujs/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap-fileinput.js" type="text/javascript"></script>

        
        <!-- fin script -->
    </body>

</html>