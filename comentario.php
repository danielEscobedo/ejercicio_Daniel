<?php

require_once("conexion.php");

$com=$_POST["mensaje"];
$idcon = $_POST["id_contenido"];
$us = $_POST["id_usuario"];
$tar = $_POST["tipo_archivo"];

//echo "mensaje " . $com;
//echo "<br>";
//echo "id contenido " . $idcon;
//echo "<br>";
//echo "id usuario" . $us;
//echo "<br>";
//echo "tipo archivo" . $tar;


if(strlen($com) == 0)
{
	//echo "detalle.php?id_contenido='" .  $idcon .
//		"&ta=" .$tar . "'";
	
	echo "<script type='text/javascript'>
	alert('No se ingreso ningun texto.');
	window.location='detalle.php?id_contenido=" .  $idcon .
		"&ta=" .$tar . "'
	</script>";
	
	
}else
{
	
$sql="insert into comentarios
values
(
null,
'" . $com . "',
'" . $idcon . "',
'" . $us . "')";

//echo $sql;

$res = mysql_query($sql,$con);

header("Location: detalle.php?id_contenido=" .  $idcon .
		"&ta=" .$tar . " ");
	
}
?>