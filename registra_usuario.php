<?php
require_once("conexion.php");
$nom = $_POST["newnom"];
$usu = $_POST["newusu"];
$contra = $_POST["contra"];
//$npas = $_POST["npass"];
$vpas = $_POST["veripass"];
$tel = $_POST["newtel"];
$correo = $_POST["newcorr"];

if($contra == $vpas)
{
	$consulta = "insert into usuarios
values
(
null,
'" . $nom . "',
'" . $usu . "',
'" . $contra . "',
'" . $tel . "',
'" . $correo . "')";
	
	$res = mysql_query($consulta,$con);
	echo "<script type='text/javascript'>
	alert('El usuario se registro correctamente.');
	</script>";
	
	header("Location: logueo.php");
	
}else{
	echo "<script type='text/javascript'>
	alert('Las contrase&ntilde;as no coinciden.');
	window.location='registrar.php';
	</script>";
}

?>