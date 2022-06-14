<?php
@session_start();
class cls_categoria extends Database{
    public function FiltroProducto($dato){
        $sql="SELECT * FROM productos WHERE nombre_producto LIKE '%".$dato."%'";
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
    
        
    public function DetalleProducto($dat){
        $id=array();
        $codprod=array();
        $nombre=array();
        $precioN=array();
        $precioO=array();
        $exis=array();
        $descrip=array();
        $imagen=array();
        $datos=array();
        $sql="select * from productos where idproducto = ".$dat."";
        $sentecia=$this->connect()->query($sql);
        $respuesta="";
        while($fila=$sentecia->fetch_assoc()){
            
            $nombre=$fila["nombre_producto"];
            $precioN=$fila["precio_normal"];
            $precioO=$fila["precio_oferta"];
            $exis=$fila["existencias"];
            $descrip=$fila["descripcion"];
            $imagen=$fila["imagen"];
            $codprod=$fila["codproducto"];
            $id=$fila["idproducto"];
        }
        
        $datos[]= $nombre;
        $datos[]= $precioN;
        $datos[]= $precioO;
        $datos[]= $exis;
        $datos[]= $descrip;
        $datos[]= $imagen;
        $datos[]= $codprod;
        $datos[]= $id;
        return $datos;
    
    }


    public function ConsultaGeneral()
    {
        $sql = "SELECT CONCAT(categorias.nombre_categoria) AS idcategoriaa,
        CONCAT(proveedores.nombre_proveedor) AS idproveedor,
         nombre_producto,precio_normal,ofertado,precio_oferta,existencias,descripcion,imagen
        FROM productos
        INNER JOIN categorias ON productos.idcategoria=categorias.idcategoria
        INNER JOIN proveedores ON productos.idproveedor=proveedores.idproveedor";

        $sentencia = $this->connect()->query($sql);
        while ($fila=$sentencia->fetch_assoc()) {
            
        }
    }

    public function consultaCarrito($datos){
        $sql = "select existencias from productos where idproducto = '".$datos['ids']."'";
        $sentecia = $this->connect()->query($sql);
        $respuesta = "";
        while ($fila=$sentecia->fetch_assoc()) {
            $respuesta .= $fila['existencias'];
        }
        return $respuesta;
    }

    public function categoriaproducto($dat)
    {
        $sql3 = "SELECT idcategoria from categorias where nombre_categoria = '$dat'";
        $sentecia3 = $this->connect()->query($sql3);
        $r = "";
        while ($row3 = $sentecia3->fetch_assoc()) {
            $r = $row3['idcategoria'];
        }
        $sql="SELECT * FROM productos where idcategoria = '$r'";
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
            $respuesta .= "<img src='".URLV."uploads/". $fila['imagen']."' alt=''>";
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

    public function borrarse($dato){

        foreach($_SESSION["CAR"] as $idr=>$valors){
            
            if ($dato == $idr){
        
                unset($_SESSION["CAR"][$idr]);
            }
        }
    }
}
?>