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
        $result = $stmt->get_result();
        $resenas = array();
    
        while ($row = $result->fetch_object('Resenas')) {
            $resenas[] = $row;
        }
    
        $con->close();
    
        //Alamcenamos el resultado en una lista
        return $resenas;
    }
    public static function getResenasByValoracion($valoracion){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM resenas WHERE valoracion = ?;");
        $stmt->bind_param("i",$valoracion);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object('Resenas');
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    public static function setResena($cliente_id, $pedido_id, $usuario, $valoracion, $fecha_resena, $comentario_resena){
        $con = DataBase::connect(); 
    
        $stmt = $con->prepare("INSERT INTO resenas(resena_id, cliente_id, pedido_id, usuario, valoracion, fecha_resena, comentario_resena) VALUES ('','$cliente_id','$pedido_id','$usuario','$valoracion','$fecha_resena','$comentario_resena')");
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
    }
    public static function getAllResenasById($cliente_id){
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM resenas WHERE cliente_id = ?;");
        $stmt->bind_param("i",$cliente_id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $resenas = array();
    
        while ($row = $result->fetch_object('Resenas')) {
            $resenas[] = $row;
        }
    
        $con->close();
    
        //Alamcenamos el resultado en una lista
        return $resenas;
    }
}