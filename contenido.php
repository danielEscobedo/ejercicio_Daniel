<?php
session_start();

require_once("conexion.php");

if($_SESSION["usuario"])
{
	$contenido = $_POST["contenido"];
$op = $_POST["op"];

$foto = $_FILES["foto"]["name"];
$temp = $_FILES["foto"]["tmp_name"];
$tamano = $_FILES["foto"]["size"];
$tipo = $_FILES["foto"]["type"];




//echo "El id de usuario es " . $_POST["id_usuario"];
//echo "<br>";
//echo "se subira " . $_POST["op"];
//echo "<br>";
//echo "El archivo en la PC se llama " . $foto;
//echo "<br>";
//echo "el archivo en el servidor se llama " . $temp;
//echo "<br>";
//echo "El tamaño del archivo es " . $tamano;
//echo "<br>";
//echo "El tipo de archivo es " . $tipo;
	
if($op == 'Imagen')
{
	$kilobytes = $tamano/1024;

if ($kilobytes >300)
{
	?>
el archivo seleccionado supera los 300 Kb.
<br />
<input type="button" value="Volver" title="Volver" onclick="history.back()" />
<?php
} 

//Ahora validamos la extencion o el tipo de archivo
if($tipo == "image/jpeg")
{
 //*******************************************
	//Ahora podremos subir la imagen al servidor
	
	//Asignar nuevo nombre de la foto
	//$nombre_foto=$_POST["nombre"];
	$nombre_foto=str_replace(" ","_",$foto);
	//$nf=preg_split('/./',$nombre_foto);
//	//$nombre_foto=$nf[];
//	echo $nf[0];
	
	//$nombre_foto=$nombre_foto . ".jpg";
	copy($temp,"subir/$nombre_foto");
	
	$sql="insert into contenido
values
(
null,
'" . $nombre_foto . "',
'1',
" . $_SESSION["idus"] . ")";
	
	//echo($nombre_foto);
	$res = mysql_query($sql,$con);
	
	header("Location: index.php");
	/*
		?>
<!--<img src="subir/'<?php echo $nombre_foto; ?>" />-->

<?php*/
}else
{
?>
el archivo seleccionado no es de tipo jpeg.
<br />
<input type="button" value="Volver" title="Volver" onclick="history.back()" />
<?php
}
} elseif($op == 'Comentario')
{
	$tc = strlen($contenido);
	if($tc == 0)
	{
		echo "<script type='text/javascript'>
	alert('No se ingreso ningun texto.');
	window.location='index.php';
	</script>";
		
		
	}else
	{
		$sql="insert into contenido
values
(
null,
'" . $contenido . "',
'0',
" . $_SESSION["idus"] . ")";
		
		$res = mysql_query($sql,$con);
		
		header("Location: index.php");
	}
}







	
}else
{
	echo "<script type='text/javascript'>
	alert('Usted no esta logueado.');
	window.location='index.php';
	</script>";
}

?>