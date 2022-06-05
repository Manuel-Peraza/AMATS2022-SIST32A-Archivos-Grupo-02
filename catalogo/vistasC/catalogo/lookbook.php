<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bulma.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <!-- Barra de navegación -->
    <header>
        
        
    </header>
    <!-- Banner -->
    <div class="banner banner-second">
        <div class="banner-container ">
            <h1>La marca</h1>
            <h2>Slogan de la compañia</h2>
        </div>
    </div>

    <div class="container">
        <nav class="nav">
            <a class="nav-item --active" href="#">Lo último</a>
            <a class="nav-item" href="#">Más Gustado</a>
            <a class="nav-item" href="#">Más vendidos</a>
            <a class="nav-item" href="#">Más baratos</a>
            <a class="nav-item" href="#">Más caro</a>
        </nav>
    </div>
    <?php
$ObjProducto = new cls_producto(); 

 $com = $ObjProducto->CatalogoProducto();
if ($com != 1) {
    echo  $ObjProducto->CatalogoProducto();
}else {


?>
<center>
<br><br><br>
        <h3 class="text-center all-tittles">No hay productos para mostrar</h3>
        <h2 class="text-center"><i class="zmdi zmdi-mood-bad zmdi-hc-5x"></i><br><br>Lo sentimos, no hemos encontrado ningún producto <strong>ingresado</strong> en el sistema</h2>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        </center>
        <?php
        }
        ?>
    
    <script src="js/main.js"></script>


</body>

</html>