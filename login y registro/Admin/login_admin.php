<?php
$objPersona=new cls_primer();

$datos="admin";

if($objPersona->primerUso($datos)){  
    header("location:".URL."proceadmin/");
}else{
    //echo "<script>alert('Nombre de universidad registrado')</script>";
    header("location:".URL."proceadmin/");
}
?>
