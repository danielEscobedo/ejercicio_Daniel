<?php
session_start();
require_once("conexion.php");
if($_SESSION["usuario"])
{
	echo "<script type='text/javascript'>
	alert('Usted ya esta logueado. Cierre la sesion para cambiar de usuario');
	window.location='index.php';
	</script>";


} else
{
	?>
	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio de Sesion</title>
</head>

<body>
	<form name="form" action="logueo.php" method="post">
		<h2>Ingrese sus Datos</h2>
		<br />
		<!--Usuario:<input type="text" name="usuario">-->
		Usuario:<input type="text" name="login">
		<br />
		Contraseña: <input type="password" name="pass">
		<br>
		<br>
		<input type="submit" value="Ingresar" title="Ingresar">
		<br>
		<br>
		<a href="registrar.php">Registrar nuevo usuario</a>
	
	
	</form>
</body>
</html>
<?php
}
?>