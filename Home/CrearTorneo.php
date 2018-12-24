<html>
	<head>
		<title>Menu Desplegable</title>
		<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				border-style: solid
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:30px 20px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:200px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:140px;
				top:0px;
			}
			
		</style>
	</head>
	<body>

	
	

<center>
<div id="header">
	
<form  >
<!--Crear un tabla-->
<TABLE>	
<!--una fila-->
<tr>
	<td>Nombre Torneo:</td>
	<td><input type="text" name="nombreTorneo"></td>
	
	
	
</tr>
<tr>
	<td>Edad Limite:</td>
	<td><input type="text" name="EdadLimite"></td>
</tr>

<tr>
<td>Deporte:</td>
	<td>

<select>
  <option value="Futbol">Futbol</option>
  <option value="Voleibol">Voleibol</option>
  <option value="Marzo">Basquet</option>
</select>


</td>
</tr>


<tr>
	
	<td>Descripcion:</td>
	<td><textarea name="Descripcion" rows="10" cols="40">
	Escribe aquí tus comentarios
	</textarea></td>
</tr>
<tr>
	<td>Limite de equipos:</td>
	<td><input type="text" name="LimiteEquipos"></td>

</tr>

<tr>
	<td>Fecha limite:</td>
</tr>

<tr>
<td>Dia:</td>
	<td>
	
		<select name="DiaLimite">
	
			<?php
			for($i=0;$i<31;$i++)
			{
			?>
			<option value="<?php echo $i;?>">

			<?php echo "$i"; ?>
				</option>
			<?php
			}
			?>
		</select>
</td>
</tr>
<tr>
<td>Mes:</td>
	<td>

<select>
  <option value="Enero">Enero</option>
  <option value="Febrero">Febrero</option>
  <option value="Marzo">Marzo</option>
  <option value="Abril">Abril</option>
  <option value="Mayo">Mayo</option>
  <option value="Junio">Junio</option>
  <option value="Julio">Julio</option>
  <option value="Agosto">Agosto</option>
  <option value="Septiembre">Septiembre</option>
  <option value="Octubre">Octubre</option>
  <option value="Noviembre">Noviembre</option>
  <option value="Diciembre">Diciembre</option>
</select>


</td>
</tr>

<tr>
<td>Año:</td>
	<td>
	
		<select name="AnoLimite">
	
			<?php
			for($i=2016;$i>1960;$i--)
			{
			?>
			<option value="<?php echo $i;?>">

			<?php echo "$i"; ?>
				</option>
			<?php
			}
			?>
		</select>
</td>
</tr>


</TABLE>


</div>

<a href="AgregarEquipos.php">Agregar Equipos</a>

</center>


	</body>
</html>