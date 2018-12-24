
<?php
    session_start();
    if (!isset($_SESSION['id'])){
        header("Location: ../login.php");
    }
    $file = fopen("home_recarga.txt", "w");
    fwrite($file, "----". PHP_EOL);
    fclose($file);
    $id=$_SESSION["id"];
    
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
//$id=1;
 ?>



<!DOCTYPE html>
<html lang="en">

    <head>
       <meta charset="utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
    
       	<title>Ver Encuentro - Sport Manager</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
        <script src="menujs/jquery.min.js" type="text/javascript"></script>
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
            <div id="myModal" class="modal fade" style="height:500px;left:50%;">
                <div class="modal-header">
                    <h3>Encuentros</h3>
                </div>
                <div class="modal-body" style="max-height: 440px;">
                    <ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Modificar encuentro</a></li>
						<li><a data-toggle="tab" href="#about">Ver Encuentro</a></li>
						<li><a data-toggle="tab" href="#contact">Aceptar encuentro</a></li>
					</ul>
					<div class="tab-content">
						<div id="home" class="tab-pane active">
							<h1>Modificar encuentro</h1>
							<p>En esta pagina puedes modificar todos los datos del encuentro que haz creado, solo cambia el texto de los campos y pulsa el boton "Guardar cambios".</p>
						</div>
						<div id="about" class="tab-pane">
							<h1>Ver Encuentro</h1>
							<p>Esta ventana solo es para ver los datos del encuentro.</p>
						</div>
						<div id="contact" class="tab-pane">
							<h1>Aceptar encuentro</h1>
							<p>Si quieres aceptar el encuentro en el campo "Equipo a retar" se encuentra una lista con tus equipos, selecciona el que se vaya a presentar al encuentro, si el equipo que aceptara es otro puedes agregarlo dando click en el campo de "Nuevo equipo" se desplegara un cuadro de texto en el que podras agregar el nuevo equipo.</p>
							<p>Una vez seleccionado el equipo que participara en el encuentro pulsa el boton "Aceptar encuentro" para continuar.</p>
						</div>
					</div>
                </div>
                <div class="modal-footer navbar-bottom" style="margin-top: 35px;">
                    <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                </div>
            </div>
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
                   
                   
                   <!-- aqui pones tu codigo////////////////////////////////////////////////////////////////////////////////////-->
                   

                <?php
                        $bd="sports";
                        $con = mysql_connect("localhost","root","");
                    $sql_Deportes = "SELECT idDeporte,Nombre_Deporte FROM deporte";
                    $deportes = mysql_db_query($bd, $sql_Deportes, $con);
                    $sql_equipos ="SELECT idEquipo,Nombre from equipo"; 
                    $sql_equipos ="SELECT idEquipo,Nombre from equipo where idCreador=".$id;
                    $sql_equipos1 ="SELECT idEquipo,Nombre from equipo where idCreador=".$id;
				    $equipos = mysql_db_query($bd,$sql_equipos,$con);
				    $equipos2 = mysql_db_query($bd,$sql_equipos1,$con);
                    $Clave_encuentro = $_GET["idTorneo"];
                    $sql_encuentros = "SELECT * FROM ver_encuentro where `Clave Encuentro` =".$Clave_encuentro.";";
                    $verencuentro = mysql_db_query($bd,$sql_encuentros,$con);
                    $sql_Lugar = "SELECT idLugar,Nombre FROM lugar";
                    $lugar=mysql_db_query($bd, $sql_Lugar, $con);
                    $check="no";
                    $encuentro=mysql_fetch_array($verencuentro);
                    $sql_idcreador="SELECT idCreador,ResultadoEquipoRetador as R1, ResultadoEquipoAceptado as R2 from encuentro where idEncuentro =".$Clave_encuentro.";";
                    $idCreadorEncuentro=mysql_db_query($bd,$sql_idcreador,$con);
                    $idCreador=mysql_fetch_array($idCreadorEncuentro);
                    $readonly="";
                    $EquipodelUsuario= mysql_db_query($bd,"SELECT * from equipo where idCreador=$id", $con);
                    $equipoUsuario=mysql_fetch_array($EquipodelUsuario);


                ?>



                <div class="panel panel-default ">
                <div class="panel-heading">Ver Encuentro</div>
                <div class="panel-body">
                
                <form method="POST" action="guardarencuentroModificado.php" >

                    <?php 
                        //$id==$idCreador["idCreador"]
                    if($id==$idCreador["idCreador"])
                    {
                        
                        ?>

                        
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
                          <?php 

                            echo "<input type='text' name='nombre' value=\"" .$encuentro["Nombre del encuentro"]."\" required=''".$readonly.">";
                            echo "<br>";
                            echo "<br>";
                            echo "<label for='deporte'>Deporte:</label>";
                            echo "<select name='deporte' required ".$readonly.">";
                            echo "<option value=".$encuentro["idDeporte"]." ".$readonly.">".$encuentro["Deporte"]."</option>";
                                  while ($res = mysql_fetch_array($deportes))
                                {
                            
                                     echo "<option value=\"".$res["idDeporte"]."\">".$res["Nombre_Deporte"]."</option>"; 
                        
                                }
                                
                                
                            echo "</select>";
                             ?> 
                          </div>
                        </div>
                    </div>
                        <div class="span4 offset1">
                    <div class="panel panel-primary ">
                         <div class="panel-heading">Equipos</div>
                          <div class="panel-body">
                          <?php 
                          echo "<label for='equipo1'>Equipo retador:</label>";
                            echo "  <select name='equipo1' id='equipo1' required ".$readonly.">";
                            echo "<option value=".$encuentro["Clave equipo retador"]." ".$readonly.">".$encuentro["Equipo retador"]."</option>";

                            echo "<option value='------------''".$readonly.">-------------------</option>";

                            while ($res = mysql_fetch_array($equipos))
                          {
                            ?>
                            <?php echo "<option value=\"".$res["idEquipo"]."\">".$res["Nombre"]."</option>"; ?>
                              <?php
                            }
                            echo "</select>";
                        ?>
                        <br/>
                           <input onClick="clicequipo(this.checked)" type='checkbox' name='check'><label for='check'>Otro equipo</label>
                            <br/>
						<div id="otroequipo" style="display: none;">
                               <br>
                                <label for='agregarlugar'>Nuevo equipo</label>
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
                           <?php
                            echo "<label for='equipo2'>Equipo a retar:</label>";
                            echo "  <select name='equipo2'  ".$readonly.">";
                            echo "<option value=".$encuentro["Clave equipo retado"]." ".$readonly.">".$encuentro["Equipo retado"]."</option>";
                           echo "<option value='------------''".$readonly.">-------------------</option>";

                                while ($res = mysql_fetch_array($equipos2))
                        {
                            ?>
                            <?php echo "<option value=\"".$res["idEquipo"]."\">".$res["Nombre"]."</option>"; ?>
                        <?php
                            }

                            echo "</select>";


                           ?>
                          </div>
                        
                    </div>
                        </div>
                            <div class="span4 offset1">
                    <div class="panel panel-primary ">
                     <div class="panel-heading">Lugar y Fecha</div>
                          <div class="panel-body" >
                          <?php 

                            echo "<label for='fecha'>Fecha del encuentro:</label>";
                            echo "<input type='date' name='fecha'value=\"" .$encuentro["Fecha del encuentro"]."\"  required=''".$readonly.">";
                            echo "<label for='hora'>Hora del encuentro:</label>";
                            echo "<input type='time' name='hora' value=\"" .$encuentro["Hora del encuentro"]."\" required='' ".$readonly.">";
                            echo "<label for='lugar'>Lugar del encuentro:</label>";
                             echo "<select onchange=\"changeLugar(this.value)\" name='lugar' id='select' required ".$readonly.">";
                            echo "<option value=".$encuentro["idLugar"]." ".$readonly.">".$encuentro["Lugar"]."</option>";
                               while ($res = mysql_fetch_array($lugar))
                                {
                            
                                     echo "<option value=\"".$res["idLugar"]."\">".$res["Nombre"]."</option>"; 
                                                      
                                }
                                
                            echo "</select>";
                            echo "<br>";
                            echo "<br>";

                             ?>
                            <br/>
                            <br/>
                            <input onClick="cliceven(this.checked)" type='checkbox' name='check'><label for='check'>Otro lugar</label>

                            <div id="otrolugar" style="display: none;">
                          <?php 
                                echo "<br>";
                            echo "<br>";


                           ?>
                                <label for='agregarlugar'>Nuevo Lugar</label>
                                <input type="text" name="lugar1">
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
                    </div>
                    </div>  
                    <div class="row">
                        
                            <div class="span4 offset1">
                            <div class="panel panel-primary ">
                                 <div class="panel-heading">Otros</div>
                                <div class="panel-body">

                                <?php 
                                    echo "<label for='recompensa'>Recompensa para el ganador:</label>";
                                    echo "<input type='text' name='recompensa' value=\"" .$encuentro["Recompensa"]."\"".$readonly.">";

                                    echo "<label for='descripcion'>Descripción:</label>";
                                    echo "<input type='text' name='descripcion' value=\"" .$encuentro["Descripcion"]."\" ".$readonly."> ";

                                 ?> 
                                  </div>
                            </div>
                            </div>
                                <div class="span4 offset1" id="googleMap" style="width:300px; height: 200px; ">
                            </div>
                            <div class="span4 offset1">
                             <div class="panel panel-primary ">
                                 <div class="panel-heading">Resultados del encuentro</div>
                                    <div class="panel-body">

                                    <?php 
                                    echo " <label>".$encuentro['Equipo retador'].": </label><input type='text' style='width:50px; display:inline;' name='puntuacionequipo1' value='".$idCreador["R1"]."' ".$readonly.">";
                                    echo "<label style='display:block'>".$encuentro['Equipo retado'].": <input type='text' style='width:50px; display:inline;' name='puntuacionequipo2' value='".$idCreador["R2"]."'' ".$readonly.">";

                                    ?>


                                    </div>
                                </div>
                            </div>
                                
                            </div>    
                            <div class="row">
                                <div class="span4 offset12">
                                 <br>
                                <br>
                                 <br>
                                    <input  type="hidden" name="isChecket">
                                      <input  type="hidden" name="clave" <?php echo "value= $Clave_encuentro" ?>>
                                     <button type="submit" class="btn btn-primary">Guardar Cambios</button> 
                                    <button type="button" class="btn">Cancelar</button>
                             </div>                
                         </div>
                        <?php
                    }
                    else //////////////////////////////////////////////////////////Else de que si es solo para mostrar infrmacion /////////////////////
                    {
                       ?>
                        <?php

                        if($encuentro["Equipo retado"]==null)/////////////////////////////////////////////////////////////////////////////
                        {
                             $readonly="readonly";
                        ?>
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
                          <?php 

                            echo "<input type='text' name='nombre' value=\"" .$encuentro["Nombre del encuentro"]."\" required=''".$readonly.">";
                            echo "<br>";
                            echo "<br>";
                            echo "<label for='deporte'>Deporte:</label>";
                            echo "<select name='deporte' required readonly>";
                            echo "<option value=".$encuentro["idDeporte"]." ".$readonly.">".$encuentro["Deporte"]."</option>";
                                  while ($res = mysql_fetch_array($deportes))
                                {
                            
                                     echo "<option value=\"".$res["idDeporte"]."\">".$res["Nombre_Deporte"]."</option>"; 
                        
                                }
                                
                                
                            echo "</select>";
                             ?> 
                          </div>
                        </div>
                    </div>
                        <div class="span4 offset1">
                    <div class="panel panel-primary ">
                         <div class="panel-heading">Equipos</div>
                          <div class="panel-body">
                          <?php 
                          echo "<label for='equipo1'>Equipo retador:</label>";
                            echo "  <select name='equipo1' required readonly>";
                              echo "<option value=".$encuentro["Clave equipo retador"]." ".$readonly.">".$encuentro["Equipo retador"]."</option>";
                            echo "</select>";
                            ?>
                            <br/>   
                           <label for="equipo2">Equipo retador:</label>
                        <select id="equipo1" name="equipo2" required="">
                        <?php
                        echo "<option value='------------'>-------------------</option>";

                        $res2=$equipos;
                        while ($res = mysql_fetch_array($equipos2))
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
                                <input type="text" name="nuevoequipo2">
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
                          </div>
                        
                    </div>
                        </div>
                            <div class="span4 offset1">
                    <div class="panel panel-primary ">
                     <div class="panel-heading">Lugar y Fecha</div>
                          <div class="panel-body" >
                          <?php 

                            echo "<label for='fecha'>Fecha del encuentro:</label>";
                            echo "<input type='date' name='fecha'value=\"" .$encuentro["Fecha del encuentro"]."\"  required=''".$readonly.">";
                            echo "<label for='hora'>Hora del encuentro:</label>";
                            echo "<input type='time' name='hora' value=\"" .$encuentro["Hora del encuentro"]."\" required='' ".$readonly.">";
                            echo "<label for='lugar'>Lugar del encuentro:</label>";
                             echo "<select onchange=\"changeLugar(this.value)\" name='lugar' id='select' required disabled>";
                            echo "<option value=".$encuentro["idLugar"]." ".$readonly.">".$encuentro["Lugar"]."</option>";
                               while ($res = mysql_fetch_array($lugar))
                                {
                            
                                     echo "<option value=\"".$res["idLugar"]."\">".$res["Nombre"]."</option>"; 
                                                      
                                }
                                
                            echo "</select>";
                            echo "<br>";
                            echo "<br>";

                             ?>
                    </div>
                    </div>
                    </div>  
                    <div class="row">
                        
                    </div>
                    <div class="row">
                          <div class="span4 offset1">
                                <div class="panel panel-primary ">
                                 <div class="panel-heading">Otros</div>
                                <div class="panel-body">

                                <?php 
                                    echo "<label for='recompensa'>Recompensa para el ganador:</label>";
                                    echo "<input type='text' name='recompensa' value=\"" .$encuentro["Recompensa"]."\"".$readonly.">";

                                    echo "<label for='descripcion'>Descripción:</label>";
                                    echo "<input type='text' name='descripcion' value=\"" .$encuentro["Descripcion"]."\" ".$readonly."> ";

                                 ?> 
                                  </div>
                            </div>
                            </div>

                                <div class="span4 offset1" id="googleMap" style="width:300px; height: 200px; ">
                            </div>
                            <div class="span4 offset1">
                             <div class="panel panel-primary ">
                                 <div class="panel-heading">Resultados del encuentro</div>
                                    <div class="panel-body">

                                    <?php 
                                   echo " <label>".$encuentro['Equipo retador'].": </label><input type='text' style='width:50px; display:inline;' name='puntuacionequipo1' value='".$idCreador["R1"]."' ".$readonly.">";
                                    echo "<label style='display:block'>No hay segundo equipo: <input type='text' style='width:50px; display:inline;' name='puntuacionequipo2' value='".$idCreador["R2"]."'' ".$readonly.">";
                                    ?>
                                    </div>
                                </div>
                           
                        
                    </div>
                                
                            </div>    
                            <div class="row">
                                <div class="span4 offset12">
                                 <br>
                                <br>
                                 <br>
                                    <input  type="hidden" name="isChecket">
                                      <input  type="hidden" name="clave" <?php echo "value= $Clave_encuentro" ?>>
                                      <input type="hidden" name="equipousuario" <?php echo "value=".$equipoUsuario["idEquipo"].""?>> 
                                     <button type="submit" class="btn btn-warning">Aceptar encuentro</button> 
                                    <button type="button" class="btn">Cancelar</button>
                             </div>                
                         </div>
                        <?php
                        }
                        else///////////////////////////////////////////////////////////////////////////////////////////////7/
                        {
                        $readonly="readonly";
                        ?>

                        
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
                          <?php 

                            echo "<input type='text' name='nombre' value=\"" .$encuentro["Nombre del encuentro"]."\" required=''".$readonly.">";
                            echo "<br>";
                            echo "<br>";
                            echo "<label for='deporte'>Deporte:</label>";
                            echo "<select name='deporte' required ".$readonly.">";
                            echo "<option value=".$encuentro["idDeporte"]." ".$readonly.">".$encuentro["Deporte"]."</option>";
                                  while ($res = mysql_fetch_array($deportes))
                                {
                            
                                     echo "<option value=\"".$res["idDeporte"]."\">".$res["Nombre_Deporte"]."</option>"; 
                        
                                }
                                
                                
                            echo "</select>";
                             ?> 
                          </div>
                        </div>
                    </div>
                        <div class="span4 offset1">
                    <div class="panel panel-primary ">
                         <div class="panel-heading">Equipos</div>
                          <div class="panel-body">
                          <?php 
                          echo "<label for='equipo1'>Equipo retador:</label>";
                            echo "  <select name='equipo1' required ".$readonly.">";
                           echo "<option value=".$encuentro["Clave equipo retador"]." ".$readonly.">".$encuentro["Equipo retador"]."</option>";
                            
                            echo "</select>";
                            ?>
                            <br/>
                             <br/>
					       <?php
                            echo "<label for='equipo2'>Equipo a retar:</label>";
                            echo "  <select name='equipo2'  ".$readonly.">";
                            echo "<option value=".$encuentro["Clave equipo retado"]." ".$readonly.">".$encuentro["Equipo retado"]."</option>";
                           echo "<option value='------------''>-------------------</option>";

                                while ($res = mysql_fetch_array($equipos2))
                        {
                            ?>
                            <?php echo "<option value=\"".$res["idEquipo"]."\">".$res["Nombre"]."</option>"; ?>
                        <?php
                            }

                            echo "</select>";


                           ?>
                          </div>
                        
                    </div>
                        </div>
                            <div class="span4 offset1">
                    <div class="panel panel-primary ">
                     <div class="panel-heading">Lugar y Fecha</div>
                          <div class="panel-body" >
                          <?php 

                            echo "<label for='fecha'>Fecha del encuentro:</label>";
                            echo "<input type='date' name='fecha'value=\"" .$encuentro["Fecha del encuentro"]."\"  required=''".$readonly.">";
                            echo "<label for='hora'>Hora del encuentro:</label>";
                            echo "<input type='time' name='hora' value=\"" .$encuentro["Hora del encuentro"]."\" required='' ".$readonly.">";
                            echo "<label for='lugar'>Lugar del encuentro:</label>";
                             echo "<select onchange=\"changeLugar(this.value)\" name='lugar' id='select' required ".$readonly.">";
                            echo "<option value=".$encuentro["idLugar"]." ".$readonly.">".$encuentro["Lugar"]."</option>";
                               while ($res = mysql_fetch_array($lugar))
                                {
                            
                                     echo "<option value=\"".$res["idLugar"]."\">".$res["Nombre"]."</option>"; 
                                                      
                                }
                                
                            echo "</select>";
                            echo "<br>";
                            echo "<br>";

                             ?>
                        </div>
                        </div>
                    </div>
                    </div>  
                    <div class="row">
                        
                            <div class="span4 offset1">
                            <div class="panel panel-primary ">
                                 <div class="panel-heading">Otros</div>
                                <div class="panel-body">

                                <?php 
                                    echo "<label for='recompensa'>Recompensa para el ganador:</label>";
                                    echo "<input type='text' name='recompensa' value=\"" .$encuentro["Recompensa"]."\"".$readonly.">";

                                    echo "<label for='descripcion'>Descripción:</label>";
                                    echo "<input type='text' name='descripcion' value=\"" .$encuentro["Descripcion"]."\" ".$readonly."> ";

                                 ?> 
                                  </div>
                            </div>
                            </div>
                                <div class="span4 offset1" id="googleMap" style="width:300px; height: 200px; ">
                            </div>
                            <div class="span4 offset1">
                             <div class="panel panel-primary ">
                                 <div class="panel-heading">Resultados del encuentro</div>
                                    <div class="panel-body">

                                    <?php 
                                 echo " <label>".$encuentro['Equipo retador'].": </label><input type='text' style='width:50px; display:inline;' name='puntuacionequipo1' value='".$idCreador["R1"]."' ".$readonly.">";
                                    echo "<label style='display:block'>".$encuentro['Equipo retado'].": <input type='text' style='width:50px; display:inline;' name='puntuacionequipo2' value='".$idCreador["R2"]."'' ".$readonly.">";

                                    ?>


                                    </div>
                                </div>
                            </div>
                                
                            </div>    
                           

                        <?php
                        }
                        ?>
                    <?php
                    }
                     ?>
                      </div>
                    </div>
                        </div>
                    </div>
                </form>
                
                
						
    
                    <!-- aqui termina tu codigo//////////////////////////////////////////////////////////////////////////////////////////////////////-->
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
        <script src="js/Concurrent.Thread.js"></script>
        <script src="menujs/bootstrap.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="menujs/app.min.js" type="text/javascript"></script>
        <script src="menujs/layout.min.js" type="text/javascript"></script>
        <script src="menujs/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="menujs/bootstrap-fileinput.js" type="text/javascript"></script>

        
        <!-- fin script -->
    </body>

</html>