<?php
error_reporting(E_ALL^E_DEPRECATED^E_NOTICE);
$con=mysql_connect("localhost","root","");
$bd = mysql_select_db("prueba_doem",$con);



global $id_usuario;
$id_usuario = "";

?>