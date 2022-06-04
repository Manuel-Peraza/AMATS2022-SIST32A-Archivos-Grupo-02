<?php
session_start();
define("URL","http://localhost/semana13/");
define("URLV","http://localhost/semana13/Admin/");
define("URLC","http://localhost/semana13/Cliente/");
define("URLE","http://localhost/semana13/Empleados/");
require_once("librerias/database.php");
require_once("clases/cls_autor.php");
require_once("clases/cls_categorias.php");
require_once("clases/cls_libro.php");
//include("reciben/login_php.php");
//error_reporting(0);
?>
<?php

$pagina="";
$url=isset($_GET["url"])? $_GET["url"]:null;
$url=rtrim($url,"/");
$url=explode('/',$url);
if(empty($url[0])){
    $pagina="vistas/principal/principal.php";
}else if($url[0]=="NuevoLibro"){
    $pagina="vistas/libros/book.php";
}else if($url[0]=="Lista_Libros"){
    $pagina="vistas/libros/lista_libros.php";
}else if($url[0]=="Insert_libro"){
    $pagina="proceso/insert_libro.php";
    header("location: ".URLE."Catalogo_Libros/");
}else if($url[0]=="Catalogo_Libros"){
    $pagina="vistas/catalogo/libros.php";   
}else if($url[0]=="insert_categoria"){
    $pagina="vistas/categorias/insert_categoria.php";
}else if($url[0]=="insert_categorias"){
    $pagina="proceso/insert_categoria.php";
    header("location: ".URLE."ListCategory/");
}
else if($url[0]=="delete_categorias"){
    $pagina="proceso/delete_categoria.php";
    header("location: ".URLE."ListCategory/");
}
else if($url[0]=="delete_autores"){
    $pagina="proceso/delete_autores.php";
    header("location: ".URLE."listprovider/");
}
else if($url[0]=="update_categorias"){
    $pagina="vistas/categorias/update_categoria.php";
}
else if($url[0]=="update_autores"){
    $pagina="vistas/autores/update_autores.php";
}
else if($url[0]=="update_autor"){
    $pagina="proceso/update_autores.php";
    header("location: ".URLE."listprovider/"); 
}
else if($url[0]=="guardar_empleados"){
    $pagina="proceso/update_categoria.php";
    header("location: ".URLE."ListCategory/");
}else if($url[0]=="searchbook"){
    $pagina="vistas/searchbook/searchbook.php";       
}else if($url[0]=="ListCategory"){
    $pagina="vistas/categorias/listcategory.php";       
}
else if($url[0]=="Insert_autores"){
    $pagina="vistas/autores/insert_autores.php";       
}
else if($url[0]=="Delete_libro"){
    $pagina="proceso/delete_libro.php"; 
    header("location: ".URLE."Lista_Libros/");      
}
else if($url[0]=="update_libro"){
    $pagina="vistas/libros/update_libro.php"; 
    //header("location: ".URL."Lista_Libros/");    
}
else if($url[0]=="update_libros"){
    $pagina="proceso/update_libro.php"; 
    header("location: ".URLE."Lista_Libros/");    
}
else if($url[0]=="insert_autor"){
    $pagina="proceso/insert_autores.php";
    header("location: ".URLE."listprovider/");       
}
else if($url[0]=="listprovider"){
    $pagina="vistas/autores/listprovider.php";       
}else{
    $pagina="vistas/error/error.php";
}
$nombre = $_SESSION["usuario"]["nombre"];

?>
<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="<?php echo URLE;?>image/x-icon" href="<?php echo URLE;?>assets/icons/book.ico" />
    <script src="../Empleados/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../Empleados/css/sweet-alert.css">
    <link rel="stylesheet" href="../Empleados/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../Empleados/css/normalize.css">
    <link rel="stylesheet" href="../Empleados/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Empleados/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../Empleados/css/style.css">
  
<script src="../Empleados/js/jqueryLL.js"></script>
    <script src="../Empleados/js/modernizr.js"></script>
    <script src="../Empleados/js/bootstrap.min.js"></script>
    <script src="../Empleados/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Empleados/js/cabeza1.js"></script>

</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile nav-lateral-scroll">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                sistema empleados
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="<?php echo URLE;?>assets/img/user01.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;"><?php echo $nombre?></p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?php echo URLE;?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo URLE;?>Insert_autores/"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Autor</a></li>
                            <li><a href="<?php echo URLE;?>insert_categoria/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo URLE;?>NuevoLibro/"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="<?php echo URLE;?>Catalogo_Libros/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                
                <li  class="tooltips-general exit-system-button" data-href="<?php echo URL;?>cerrar.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="<?php echo URLE;?>searchbook/" data-placement="bottom" title="Buscar Producto">
                    <i class="zmdi zmdi-search"></i>
                </li>

                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
                <li class="desktop-menu-button hidden-xs" style="float: left !important;">
                    <i class="zmdi zmdi-swap"></i>
                </li>
            </ul>
        </nav>
        <?php
require_once($pagina);
?>
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam quam dicta et, ipsum quo. Est saepe deserunt, adipisci eos id cum, ducimus rem, dolores enim laudantium eum repudiandae temporibus sapiente.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Desarrollador</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Carlos Alfaro <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2018 Carlos Alfaro</div>
        </footer>
    </div>
</body>
</html>