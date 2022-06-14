<?php
@session_start();
define("URLC","http://localhost/semana13/Cliente/");
define("URL","http://localhost/semana13/");
define("URLV","http://localhost/semana13/Admin/");
require_once("librerias/cls_encriptar_desencriptar.php");
require_once("librerias/database.php");
require_once("librerias/config.php");
require_once("clases/cls_personas.php");
require_once("clases/cls_producto.php");
require_once("clases/cls_compra.php");
require_once("clases/cls_categoria.php");

$url=isset($_GET["url"])? $_GET["url"]:null;
    

    $pagina="";
    $url=isset($_GET["url"])? $_GET["url"]:null;
    $url=rtrim($url,"/");
    $url=explode('/',$url);
    if(empty($url[0])){
        $pagina="vistasC/principal/pricipal.php";
    }else if($url[0]=="producto"){
        $pagina="vistasC/producto/producto.php";
    }else if($url[0]=="lookbook"){
        $pagina="vistasC/catalogo/lookbook.php";
    }else if($url[0]=="login"){
        $pagina="vistasC/login/login.php";
    }else if($url[0]=="carrito"){
        $pagina="vistasC/carrito/carrito.php";
    }else if($url[0]=="registro"){
        $pagina="vistasC/registro/registro.php";
    }else if($url[0]=="registroCliente"){
        $pagina="procesar/registro_cliente.php";       
        $ff = header("location: http://localhost/semana13/Cliente/login/");
    }else if($url[0]=="buscador"){
        $pagina="vistasC/buscador/buscador.php";
    }
    else if($url[0]=="VerCarrito"){
        $pagina="vistasC/carrito/cart.php";
    }
    else if($url[0]=="AggCarrito"){
        $pagina="vistasC/carrito/php/addtocart.php";
    }
    else if($url[0]=="BorrarCart"){
        $pagina="vistasC/carrito/php/delfromcart.php";
    }else if($url[0]=="Detalle"){
        $pagina="vistasC/producto/producto.php";
    }
    else if($url[0]=="Factura"){
        $pagina="./factura/index.php";
    }else if($url[0]=="cerrarsesion"){
        $pagina="./cerrarsesion.php";
        header("location: http://localhost/semana13/Cliente/");
    }
    else if($url[0]=="LoginCliente"){
        $pagina="procesar/login_cliente.php";
        header("location: http://localhost/semana13/Cliente/");
    }
    else if($url[0]=="Categoria"){
        $pagina="vistasC/categorias/categorias.php";

    }

    else if($url[0]=="Acercade"){
        $pagina="vistasC/acercade/acercade.php";

    }else if($url[0]=="Contactos"){
        $pagina="vistasC/acercade/contactos.php";

    }
    else{
        $pagina="vistasC/error/error.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="<?php echo URLC;?>image/x-icon" href="<?php echo URLC;?>assets/icons/book.ico" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
      <script src="<?php echo URLC;?>js/main2.js"></script>

    <script type="text/javascript" src="<?php echo URLC;?>js/carrito.js"></script>

    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo URLC;?>js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?php echo URLC;?>js/modernizr.js"></script>
    <script src="<?php echo URLC;?>js/bootstrap.min.js"></script>
    <script src="<?php echo URLC;?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="http://localhost/semana13/Cliente/js/carrito.js"></script>
    <script src="http://localhost/semana13/Cliente/js/procesarcompra.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLC;?>css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo URLC;?>css/material-design-iconic-font.css">
    <link rel="stylesheet" href="<?php echo URLC;?>css/styles.css">

    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="<?php echo URLC;?>registro/" class="navbar-top-links">Registro</a>
                </li>
                <li class="navbar-top-item">
                    <a href="<?php echo URLC;?>login/" class="navbar-top-links">Iniciar sesión</a>
                </li>
                <li class="navbar-top-item">
                    <a href="<?php echo URLC;?>carrito/" class="navbar-top-links">
                        <i class="zmdi zmdi-shopping-cart"></i> Carrito
                        
                    </a>
                </li>
                <li class="navbar-top-item" id="borrarsesion">
                    <a href="<?php echo URLC;?>cerrarsesion/" class="navbar-top-links">Cerrar Sesión</a>
                </li>
                <li class="navbar-top-item" id="borrarsesion">
                    <a href="<?php echo URLC;?>Acercade/" class="navbar-top-links">Acerca de Nosotros</a>
                </li>
                <li class="navbar-top-item" id="borrarsesion">
                    <a href="<?php echo URLC;?>Contactos/" class="navbar-top-links">Contactos</a>
                </li>
            </ul>
            
        </nav>
        <nav class="navbar">
            <header class="nabvar-mobile is-size-5-mobile">
                <a class="navbar-mobile-link has-text-white" href="#" id="btn-mobile"><i class="zmdi zmdi-menu"></i></a>
                <a class="navbar-mobile-link has-text-white" href="">Chaba's</a>
                <a class="navbar-mobile-link has-text-white" href="index.html"><i class="zmdi zmdi-shopping-cart"></i> Vacio</a>
            </header>
            <nav   class="nav-menu" id="mySidenav">

                

              <!-- SEARCH -->
              

                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="<?php echo URLC;?>">Chaba's</a>
                <ul class="nav-menu-ul">
                    <li class="nav-menu-item" id="men">
                        <a class="nav-menu-link link-submenu" href="#">Categorias <i
                                class="zmdi zmdi-chevron-down"></i></a>
                        <div class="container-sub-menu">
                            <ul class="sub-menu-ul">
                                <li class="nav-menu-item ">
                                    <ul class="sub-menu-ul">
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="<?php echo URLC;?>Categoria&categoria=Hombre">Hombre</a></li>
                                        <li class="nav-menu-item"><a class="nav-menu-link" href="<?php echo URLC;?>Categoria&categoria=Mujer">Mujer</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        
                        </div>
                    </li>

                    <li class="nav-menu-item" >
                        <a href="#" class="nav-menu-link link-submenu">Carrito <i class="zmdi zmdi-chevron-down"></i> </a>
                        <div class="container-sub-menu">
                    <form >
                        <table class="mostrarcarro">
                            <thead>
                            <th>Producto</th>
                            <th>cantidad</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Precio</th>
                            <th>&nbsp;&nbsp;&nbsp;Total Producto</th>
                            </thead>
                            
                            <tbody  id="indexcarrito" >
                                
                            </tbody>
                            <table class="mostrarcarro">
                                <thead>
                                    <br><p id="carritovacio">Carrito Vacio</p>
                                    <th>Total a Pagar</th>
                                </thead>
                                <tbody id="totalproductos">

                                </tbody>
                                
                            </table>
                            
                        </table>

                    </form>
                        </div>

                       
                    </li>
                    
                    <li class="nav-menu-item"><a href="<?php echo URLC;?>lookbook/" class="nav-menu-link">Todo los Productos</a></li>
                    <li class="nav-menu-item"><a href="<?php echo URLC;?>registro/" class="nav-menu-link active">Registro</a></li>
                    <li class="nav-menu-item"><a href="<?php echo URLC;?>login/" class="nav-menu-link">Iniciar Sesión</a></li>

                </ul> 

                            <form class="form-group " >
                            <span class="form-group-icon"><i class="zmdi zmdi-search"></i></span>
                            <input type="search" id="buscador" class="form-group-input" >
                            
                            </form>
                        </div>
                        

            </nav>
            
        </nav>
        
        <br>
        <br>
        <br>
        <br>

    </header>
    <div id="resultado">
                            
                                <div class="card my-4" class="card-body">
                                <!-- SEARCH -->
                                <ul id="contenedor1"></ul>
                                </div>
                            
                        </div>
<?php
require_once($pagina);
?>
<footer class="footer">
        <div class="container">
            <div class="columns is-multiline">
                
                <div class="column">

                    <ul class="footer-ul">
                        <li class="footer-item">
                            <h3 class="has-text-weight-bold">Datos de contacto</h3>
                        </li>
                        <li class="footer-item"><a class="footer-link" href="<?php echo URL;?>regisadmin/">Administrar</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Catálogo para mujeres</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Ver tu Catalogo </a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Privacidad y cookies</a></li>
                        <li class="footer-item"><a class="footer-link" href="#">Borrar tu catalogo</a></li>
                    </ul>
                </div>
                <div class="column is-full">
                    <div class="footer-socials">
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-facebook"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-twitter"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-instagram"></i></a>
                        <a class="footer-solcials-link" href="#"><i class="zmdi zmdi-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar-top">
            <div class="container">
                <a class="footer-bar-top-links" href="#">2019 Avenue Fashion</a>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>


</body>

</html>
