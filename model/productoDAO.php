<?php
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
        $obj="";

        if($tipo = 1){
            $obj = "entrantes";
        }elseif($tipo = 2){
            $obj = "postres";
        }
        while($productoDB = $result->fetch_object($obj)){
            $res[] = $productoDB;
        }

        return $res;
    }
    

    // public static function getAllEntrantes(){
    //     $con = DataBase::connect();
    //     if ($result = $con->query('SELECT * FROM productos WHERE categoria_id=1')) {
    //         while($producto = $result->fetch_object('entrantes')){
                

    //         }
    //     }
    // }
}