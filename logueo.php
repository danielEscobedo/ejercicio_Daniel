<?php
session_start();
require_once("conexion.php");

$sql ="select * from usuarios
where ususername ='" . $_POST["login"] . "'";

$res = mysql_query($sql,$con);

if (mysql_num_rows($res) == 0)
{
	echo "<script type='text/javascript'>
	alert('El usuario " . $_POST["login"] . " no existe en la base de datos');
	window.location='index.php';
	</script>";
} else
{
	$sql1 = "select idusuario,ususername,uspass
from usuarios
where ususername = '" . $_POST["login"] . "' and uspass = '" . $_POST["pass"] . "'";
	
	$res1 = mysql_query($sql1,$con);
	if(mysql_num_rows($res1) == 0)
	{
		echo "<script type='text/javascript'>
	alert('El usuario y su contraseña no coinciden.');
	window.location='index.php';
	</script>";
	} else
	{
		//El usuario se logueo correctamente, podemos darle acceso a los usuarios
		//creamos una variable de sesion
		$reg1 = mysql_fetch_array($res1);
		global $id_usuario;
		$id_usuario = $reg1["idusuario"];
		$_SESSION["usuario"] = $_POST["login"];
		$_SESSION["idus"] = $id_usuario;
		
		echo "id de usuario " . $id_usuario;
//		echo "nombre de usuario " . $reg1["ususername"];
//		echo "contra de usuario " . $reg1["uspass"];
		//header("Location: index.php?id=" . $id_usuario );
		header("Location: index.php");
	}
}



?>