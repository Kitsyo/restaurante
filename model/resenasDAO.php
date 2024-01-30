<?php
include_once "config/dataBase.php";
include_once "Resenas.php";
include_once "Pedido.php";
include_once "Producto.php";



class resenasDAO{
    public static function getAllResenas(){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM resenas;");

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object('Resenas');
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    public static function setResena($cliente_id, $pedido_id, $valoracion, $fecha_resena, $comentario_resena){
        $con = DataBase::connect(); 
    
        $stmt = $con->prepare("INSERT INTO resenas(resena_id, cliente_id, pedido_id, valoracion, fecha_resena, comentario_resena) VALUES ('','$cliente_id','$pedido_id','$valoracion','$fecha_resena','$comentario_resena')");
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
    }
}