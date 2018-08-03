<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar un Nuevo Usuario</title>
</head>

<body>
	
	<form name="form2" action="registra_usuario.php" method="post">
		<h3>Ingresa los datos para registro</h3>
		<br>
		Nombre: <input type="text" name="newnom">
		<br>
		Usuario: <input type="text" name="newusu">
		<br>
		Contraseña: <input type="password" name="contra">
		<br>
		Verifica Contraseña: <input type="password" name="veripass">
		<br>
		Teléfono: <input type="text" name="newtel">
		<br>
		Correo: <input type="text" name="newcorr">
		<br>
		<hr>
		<input type="submit" title="Registrar" value="Registrar">
	</form>
	
</body>
</html>