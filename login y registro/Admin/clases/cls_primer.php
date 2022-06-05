<?php
class cls_primer extends Database{

    public function primerUso($datos){
      /*
        $sql="select * from administracion where rol='".$datos."' ";
        $rs=$this->connect()->query($sql);
        if($rs->num_rows>0){
            header("location:".URL."login/");
          return true;
        }else{
          header("location:".URL."loginadmin/");
          return false;
        }
        //return false;
*/
        $dat=array();
        $pro=array();
        $pre=array();
        $pri=array();
        $pru=array();
        $sql="select * from administracion where rol='".$datos["ad"]."' ";
        $rs=$this->connect()->query($sql);

        


        while($fila=$rs->fetch_array()){
            $pro[]= $fila[0];
            $pre[]=$fila[1];
            $pri[]= $fila[2];
            $pru[]=$fila[3];
        }
        $dat[]=$pro;
        $dat[]=$pre;
        $dat[]=$pri;
        $dat[]=$pru;
        return $dat;
    }

    public function agregaradmin($datos){

      $sql="
      INSERT INTO administracion (
          nombre,clave,rol
        )
        VALUES
          (
            '".$datos["nombre"]."','".$datos["clave"]."','admin'
          );
      
      ";
      
      $this->connect()->query($sql);


      return true;
  }
}
?>