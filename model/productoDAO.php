<?php
include_once "config/dataBase.php";
include_once "Producto.php";
include_once "entrantes.php";
include_once "postres.php";


class productoDAO{
    public static function getAllProductos($tipo){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$tipo);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        //   var_dump($result);

        //Alamcenamos el resultado en una lista
        $res=[];
        $obj = "";
        if($tipo = 1){
            $obj="Entrantes";
        }elseif($tipo = 2){
            $obj="Postres";
        }
        // var_dump($obj);
        // arreglar el fetch para los resutlatos en el array
        while($productoDB = $result->fetch_object($obj)){
            $res[] = $productoDB;
            
        }
        return $res;
    }
}
