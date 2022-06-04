


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
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
                    <img src="assets/img/user01.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;"></p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href=""><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="Insert_autores/"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Autor</a></li>
                            <li><a href="insert_categoria/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="NuevoLibro/"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="Catalogo_Libros/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                
                <li  class="tooltips-general exit-system-button" data-href="cerrar.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook/" data-placement="bottom" title="Buscar Producto">
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
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Manuel Peraza <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2022 Manuel Peraza</div>
        </footer>
    </div>
</body>
</html>