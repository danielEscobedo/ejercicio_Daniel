<?php
session_start();

if ($_SESSION["usuario"])
{
require_once("conexion.php");

$idcon = $_GET["id_contenido"];
	$ta =$_GET["ta"];

	$sql = "select contenido
from contenido
where idcontenido='" . $idcon . "'";
	
	
	$res=mysql_query($sql,$con);
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detalles</title>
</head>

<body>
	<?php
	if($reg=mysql_fetch_array($res))
	{
	?>
	<table width="500" align="center">
		<tr>
		<td width="500" align="center" valign="top">
		<h3>Contenido Posteado</h3>
		</td>
		</tr>
		
		<tr>
		<td width="500" align="justify" valign="top">
		<?php  
		if ($ta == 0)
		{
			echo $reg["contenido"];
		}elseif($ta == 1)
		{
			?>
			<a href="subir/<?php echo $reg["contenido"]; ?>" target="_blank">
	<?php echo $reg["contenido"]; ?>
</a>
			<?php
		}
		 ?>
		</td>
		</tr>
		
		<tr>
		<td width="500" align="center" valign="top">
		<hr />
			<form name="form" action="comentario.php" method="post">
				
				Mensaje: <textarea name="mensaje" cols="40" rows="10"></textarea>
				<br />
				<hr />
				<input type="hidden" name="id_contenido" value="<?php echo $idcon; ?>" />
				<input type="hidden" name="id_usuario" value="<?php echo $_SESSION["idus"]; ?>" />
				<input type="hidden" name="tipo_archivo" value="<?php echo $ta; ?>" />
				
				<input type="submit" value="Publicar" title="Publicar">
			</form>
		</td>
		</tr>
		
		<tr>
			<td>
			<?php 
	 		$consulta = "select concat(U.usnombre,' ',U.usapellido) as Nombre,
C.comentario
from comentarios as C inner join usuarios as U
on C.idusuario = u.idusuario
where C.idcontenido=" . $idcon . " ";
	 		
				
		$result = mysql_query($consulta,$con);
	 ?>
				<ul>
		<?php
	 	while ($rows=mysql_fetch_array($result))
		{
		?>
			<li>
			Nombre: <strong><?php echo $rows["Nombre"];?></strong>		
				<br />
			Mensaje: <div align="justify"><b> <?=$rows["comentario"];?> </b></div>
			<hr />
			</li>	
		<?php
		}
	 	?>
			</ul>
			</td>
		</tr>
		
	</table>
<?php
	}
?>
</body>
</html>

<?php
}else
{
	echo "<script type='text/javascript'>
	alert('Usted no esta logueado');
	window.location='index.php';
	</script>";
}
?>

