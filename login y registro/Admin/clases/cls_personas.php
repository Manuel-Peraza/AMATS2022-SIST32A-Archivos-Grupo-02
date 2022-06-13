<?php

class cls_persona extends Database{

    public function login($datos){
        $sql="select * from administracion where nombre ='".$datos["usuario"]."' AND clave= '".$datos["clave"]."' ";
        $sentencia=$this->connect()->query($sql);
        if($sentencia->num_rows>0){
          $nombre = array();
        $clave = array();
        $rol = array();
        $respuesta = array();
        while ($fila=$sentencia->fetch_assoc()) {
          $nombre=$fila["nombre"];
          $clave=$fila["clave"];
          $rol=$fila["rol"];
        }

        $respuesta[]=$nombre;
        $respuesta[]=$clave;
        $respuesta[]=$rol;
        return $respuesta;
        }else{
          return false;
        }
        
        /*
        if($rs->num_rows>0){
          return $rs;
        }else{
          return $rs;
        }*/
        
    }

    public function agregar($datos){


        $fecha=date("Y-m-d");

        $valores="'".implode("','",$datos)."','$fecha'";

        $sql="
        INSERT INTO personas (
            login,clave,nombres,apellidos,sexo,nivel_estudio,email,fecha_registro
          )
          VALUES
            (
              $valores
            );
        
        ";
        
        $this->connect()->query($sql);


        return true;
    }
}

?>