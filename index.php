<?php
session_start();
define("URL","http://localhost/semana13/");
define("URLV","http://localhost/semana13/Admin/");
define("URLC","http://localhost/semana13/Cliente/");
define("URLE","http://localhost/semana13/empleados/");

require_once("librerias/cls_encriptar_desencriptar.php");
require_once("librerias/database.php");
require_once("librerias/config.php");

require_once("clases/cls_personas.php");
require_once("clases/cls_primer.php");
require_once("clases/cls_empleados.php");
//include("reciben/login_php.php");
//error_reporting(0);
?>
<?php

if(!(isset($_SESSION["usuario"]))){
    $url=isset($_GET["url"])? $_GET["url"]:null;
    $url=rtrim($url,"/");
    $url=explode('/',$url);

    if(empty($url[0])){
        header("location: http://localhost/semana13/Cliente/");
        //require_once("login.php");
    }else{
        if($url[0]=="registro"){
            require_once("vistas/login/registro.php");
        }else if($url[0]=="registro_login"){
            require_once("reciben/registro_login.php");
        }else if($url[0]=="login"){
            require_once("page-login.php");
            //require_once("reciben/proce_admin.php");
        }else if($url[0]=="login_php"){
            require_once("reciben/login_php.php");
        }else if($url[0]=="loginadmin"){
            require_once("reciben/login_admin.php");
        }else if($url[0]=="regisadmin"){
            require_once("registro_admin.php");
        }else if($url[0]=="registroadmin"){
            require_once("reciben/regis_admin.php");
        }else if($url[0]=="regisempleado"){
            require_once("registro_empleados.php");
        }else if($url[0]=="registroempleado"){
            require_once("reciben/regis_empleados.php");
        }
        else if($url[0]=="proceadmin"){
            require_once("reciben/proce_admin.php");
        }else{
            require_once("vistas/error/error.php");
            //header("http://localhost/semana13/Cliente/");
        }
    }

    
}else{
    $pagina="";
    $url=isset($_GET["url"])? $_GET["url"]:null;
    $url=rtrim($url,"/");
    $url=explode('/',$url);
    if(empty($url[0])){
        header("location: http://localhost/semana13/Cliente/");
    }else{
        $pagina="vistas/error/error.php";
    }

}
?>