function limpiar()
{
	document.form.reset();
	document.form.nombre.focus();

}

function validar()
{
	var form = document.form;
	if( form.nombre.value==0)
	{
		alert("Ingresar el nombre");
		form.nombre.value="";
		form.nombre.focus();
		return false;
	}
	if( form.LimiteEquipos.value==0)
	{
		alert("Ingresar el limite de equipos");
		form.LimiteEquipos.value="";
		form.LimiteEquipos.focus();
		return false;
	}

	if( form.EdadLimite.value==0)
	{
		alert("Ingresar el limite de edad");
		form.EdadLimite.value="";
		form.EdadLimite.focus();
		return false;
	}


	if( form.CostoInscripcion.value==0)
	{
		alert("Ingresar el costo de la inscripcion");
		form.CostoInscripcion.value="";
		form.CostoInscripcion.focus();
		return false;
	}

	if( form.CostoCredencial.value==0)
	{
		alert("Ingresar el costo de la Credencial");
		form.CostoCredencial.value="";
		form.CostoCredencial.focus();
		return false;
	}

	if( form.Recompensas.value==0)
	{
		alert("Ingresar la Recompensa del torneo");
		form.Recompensas.value="";
		form.Recompensas.focus();
		return false;
	}


	if(form.Descripcion.value==0)
	{
		alert("Ingresar una Descripcion del torneo");
		form.Descripcion.value="";
		form.Descripcion.focus();
		return false;
	}


	document.form.submit();

}


function ValidarEquip()
{


	/*var form = document.FormEquipos;
	if(form.nombre.value==0)
	{
		alert("Ingresar El nombre del equipo");
		form.nombre.value="";
		form.nombre.focus();
		return false;
	}*/
document.FormEquipos.submit();
}


function ValidarEquipos()
{
	var form = document.FormEquipos;
	if(form.nombre.value==0)
	{
		alert("Ingresar El nombre del equipo");
		form.nombre.value="";
		form.nombre.focus();
		return false;
	}
	document.form.submit();
}

function GuardarResultados()
{
	var form = document.FormEquipos;
	document.FormEquipos.submit();
}