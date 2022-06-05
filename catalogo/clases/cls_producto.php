<?php
class cls_producto extends Database{
    

    public function CatalogoProducto()
    {
        $sql="SELECT * FROM productos";
        $sentencia = $this->connect()->query($sql);
        $cont = $sentencia->num_rows;
        if ($cont > 0) {
            $respuesta = "";
        $respuesta .= "<div class='container'>";
        $respuesta .= "<div class='columns is-mobile is-multiline'>";
        while ($fila=$sentencia->fetch_assoc()){
            $respuesta .= "<div class='column is-half-mobile is-one-quarter-desktop'>";
            $respuesta .= "<div class='card'>";
            $respuesta .= "<span class='price'> <sup>\$".$fila['precio_normal']."</sup> ".$fila['nombre_producto']."</span>";
            $respuesta .= "<img src='../img/item-1.png' alt=''>";
            $respuesta .= "<div class='card-simple-options'>";
            $respuesta .= "<a href='' class='btn btn--mini-rounded'>
            <i class='zmdi zmdi-favorite'></i>
        </a>";
            $respuesta .= "<a href='".URLC."Detalle&codigo=".$fila['idproducto']."' class='btn btn--mini-rounded'>
            <i class='zmdi zmdi-info'></i>
        </a>";
            $respuesta .= "</div>";
            $respuesta .= "</div>";
            $respuesta .= "</div>";
            //$respuesta.="<h1>".$fila['nombre_producto']."</h1>";
        }
        $respuesta .= "</div>";
        $respuesta .= "</div><script src='../js/main.js'></script>";
        return $respuesta;
        }else{
            return 1;
        }
    }
}
?>