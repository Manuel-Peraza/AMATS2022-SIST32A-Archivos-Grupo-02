<?php
$objPersona=new cls_primer();
$objEncriptar_desencriptar=new cls_encriptar_desencriptar();

$datos["nombre"]=$_POST["nombre"];
$datos["clave"]=$objEncriptar_desencriptar->encriptar_desencriptar("encriptar",$_POST["clave"]);

$objPersona->agregaradmin($datos);

header("location:".URL."login/");


?>