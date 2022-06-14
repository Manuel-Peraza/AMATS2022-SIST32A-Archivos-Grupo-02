<?php
class cls_compra extends Database{

    public function login($datos){
        $sql="select * from user where nombre='$datos[0]' and clave='$datos[1]' ";
        $rs=$this->connect()->query($sql);
        if($rs->num_rows>0){
          return true;
        }else{
          return false;
        }
        return false;
    }

    public function insertarfactura($datos){

        $sql="  
        INSERT INTO pedidos (
            idcliente,fecha,total,estado
          )
          VALUES
            (
              '".$datos["idCliente"]."','".$datos["fecha"]."','".$datos["total"]."', 'Pendiente'
            );
        
        ";
        
        $this->connect()->query($sql);

        $sql1 = " SELECT MAX(idpedido) FROM pedidos"; 
        $sentencia = $this->connect()->query($sql1);
        $respuest = "";
        while($row  = $sentencia->fetch_assoc()){
          $respuest .= $row['MAX(idpedido)'];
        }
        return $respuest;
    }

    public function detallepedido($datos2){




      $sql="INSERT INTO detallepedido (idpedido,idproducto,cantidad,subtotal)
      VALUES
          (
            '".$datos2['idpedido']."','".$datos2["idproducto"]."','".$datos2["cantidad"]."','".$datos2["subtotal"]."'
          );
      
      ";

      
      
      $this->connect()->query($sql);


      return true;
  }

  public function restacantidad($datos2){
    $sql = "UPDATE productos SET existencias = '".$datos2["cantidad"]."' WHERE idproducto = '".$datos2["idproducto"]."'";
    
    if ($this->connect()->query($sql)) {
      return 1;
    }
    else {
      echo 0;
    }
  }

  public function idfactura($da){

    $sql1 = " SELECT MAX(idpedido) FROM pedidos WHERE idcliente = '".$da['dat']."'"; 
    $sentencia = $this->connect()->query($sql1);
    if ($sentencia->num_rows>0) {
      $respuest = "";
    while($row  = $sentencia->fetch_assoc()){
      $respuest .= $row['MAX(idpedido)'];
    }
    return $respuest;
    }
    else {
      return 1;
    }

  }
}

?>