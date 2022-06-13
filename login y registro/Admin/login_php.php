<?php
@session_start();
$objPersona=new cls_persona();
$objEncriptar_desencriptar=new cls_encriptar_desencriptar();

$datos["usuario"]=$_POST["usuario"];
$datos["clave"]=$objEncriptar_desencriptar->encriptar_desencriptar("encriptar",$_POST["Clave"]);
$rolusuario = $objPersona->login($datos);

//var_dump($rolusuario);
if($objPersona->login($datos)){
    $roles["nombre"] = $rolusuario[0];
    $roles["rol"]=$rolusuario[2]; 
    $_SESSION["usuario"]=$roles;

    $comprobacion = $_SESSION["usuario"]["rol"];
    if($comprobacion=="admin"){
        header("location:".URLV."");
    }elseif ($comprobacion=="empleado") {
        header("location:".URLE."");
    }
    //var_dump($comprobacion);
}else{
    echo "<script>alert('Nombre de universidad registrado')</script>";
    header("location:".URL."login/");
}
//unset($_SESSION["prueba"]);

/*
if ($comprobacion[2]=="admin") {
    echo "es admin";
}else {
    echo "no es admin";
}
/*
if($objPersona->login($datos)){
    $_SESSION["usuario"]=$datos[0];
    //header("location:".URLV."");
}else{
    echo "<script>alert('Nombre de universidad registrado')</script>";
    //header("location:".URL."login/");
}

*/
?>
