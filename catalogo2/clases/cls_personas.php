<?php
class cls_users extends Database{

    public function login($datos){
        $sql="select * from user where email='".$datos['user']."' and clave='".$datos['clave']."' ";
        $rs=$this->connect()->query($sql);
        if($rs->num_rows>0){
          $nombre = array();
        $id = array();
        $respuesta = array();
        while ($fila=$rs->fetch_assoc()) {
          $nombre=$fila["nombre"];
          $id=$fila["idUser"];
        }

        $respuesta[]=$nombre;
        $respuesta[]=$id;
        return $respuesta;
        }else{
          return false;
        }
        //return false;
    }

    public function agregar($datos){


        

        $sql="
        
        INSERT INTO user (
            nombre,email,clave
          )
          VALUES
            (
              '".$datos["nombre"]."','".$datos["email"]."','".$datos["clave"]."'
            );
        
        ";
        
        $this->connect()->query($sql);


        return true;
    }
}

?>