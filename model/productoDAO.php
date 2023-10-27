<?php
include_once "../config/dataBase.php";
include_once "../model/Producto.php";

class productoDAO{
    public static function getAllProductos($tipo){
        
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id=?");
        $stmt->bind_param("i",$tipo);
        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();

        //Alamcenamos el resultado en una lista
        $res=[];

        while($productoDB = $result->fetch_object($tipo)){
            $res[] = $productoDB;
        }

        return $res;
    }
    

}
