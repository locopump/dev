<?php
include('ChangeString.php');
$cadena = $_GET['string'];
$Obj = new ChangeString();
$nueva_cadena = $Obj->build($cadena);
echo $nueva_cadena;
?>