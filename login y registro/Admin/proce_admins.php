<?php
$objPersona=new cls_primer();

$datos=$objPersona->primerUso(0);

$cont = count($datos[0]);
var_dump($datos);
if($cont>0){
    header("location:".URL."login/");
}else{
    header("location:".URL."regisadmin/&codigo=".$cont."");
}

?>