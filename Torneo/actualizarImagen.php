<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>JSP Page</title><script type="text/javascript" language="JavaScript">
function check() {
document.getElementById("paramfile").value = document.filea.nomarchivo.value;

var ext = document.filea.nomarchivo.value;
ext = ext.substring(ext.length-3,ext.length);
ext = ext.toLowerCase();

if(ext != 'jpg') {
alert('You selected a .'+ext+
' file; please select a .jpg file instead!');
return false; }
else
return true; }

</script>
</head>
<body>
<h1>Hello World!</h1>
<form method="get" name="filea" action="../LeerArchivo" enctype="multipart/form-data" onsubmit="return check();">
Archivo: <input type="file" name="nomarchivo" size="70" accept="text/plain;image/jpeg">
<br /><br />

<input type="hidden" id="paramfile" name="paramfile">
<input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>