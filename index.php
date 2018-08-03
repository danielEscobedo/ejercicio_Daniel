<?php
session_start();

require_once("conexion.php");
//$sql = "select * from contenido";
$sql = "select concat(U.usnombre,' ',U.usapellido) as Nombre,
C.contenido,U.idusuario,C.idcontenido,C.archivo
from contenido as C inner join usuarios as U
on C.idusuario = u.idusuario";
$res = mysql_query($sql,$con);
//$reg = mysql_fetch_array($res);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>	Blog de Prueba</title>
</head>

<body >
	<div align="center">
		<h3>Blog de Prueba de Daniel Escobedo</h3>
	</div>
	
	<table align="center" width="600">
		<tr>
			<td align="center" width="600" colspan="3">
				Comentarios del Blog
			</td>
			
		</tr>
		<tr style="background-color: aqua; color: darkred; font-weight: bold">
			<td align="center" width="200">
				Public&oacute;
			</td>
			<td align="center" width="300">
				Contenidos
			</td>
			<td align="center" width="100">
				Ver comentarios
			</td>
		</tr>
		
		<?php
		while ($reg = mysql_fetch_array($res))
		{
		?>
		<tr>
			<td align="center">
				<?php echo $reg["Nombre"]; ?>
			</td>
			<td>
				<?php echo $reg["contenido"]; ?>
			</td>
			<td align="center">
				<a href="detalle.php?id_contenido=<?php echo $reg["idcontenido"]; ?>&ta=<?php echo $reg["archivo"]; ?>" >Ver</a>
			</td>
		</tr>
		<?php
		}
		?>
		
	</table>
	<hr />
	<div align="center">
		<?php
		if($_SESSION["usuario"])
		{
		?>
		<a href="salir.php" >Cerrar Sesion</a>
		
		<form name="form" action="contenido.php" method="post" enctype="multipart/form-data" >
	<h3>Publicar</h3>
		<?php
		echo "usuario " . $_SESSION["idus"];
		?>
		<div align="center">
		<br>
		Imagen: <input type="file" name="foto">
		<br>
		Contenido: <textarea name="contenido" cols="40" rows="10"></textarea>
				<br />
		Comentario<input type="radio" name="op" value="Comentario" checked="cheked">
		Imagen<input type="radio" name="op" value="Imagen">
		<br />
				<hr />
				<input type="hidden" name="id_usuario" value="<?php echo $_SESSION["idus"]; ?>" />
		
		<input type="submit" value="Subir" title="Subir">
			</div>
	</form>
		
		<?php
		} else{
		?>
		<a href="login.php" >Iniciar Sesion</a>
		<?php
		}
		?>
		
	</div>
	
	
			
</body>
</html>