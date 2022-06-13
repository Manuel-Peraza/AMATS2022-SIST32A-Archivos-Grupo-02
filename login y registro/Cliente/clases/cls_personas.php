<?php
class cls_users extends Database{

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