<?php
include_once "config/dataBase.php";
include_once "Producto.php";
include_once "entrantes.php";
include_once "postres.php";
include_once "hamburguesas.php";
include_once "sinGluten.php";
include_once "veganas.php";
include_once "desayunos.php";
include_once "Pedido.php";


class pedidoDAO{
    public static function getPedidoById($cliente_id){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM pedido WHERE cliente_id = ?");
        $stmt->bind_param("i",$cliente_id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $producto = $result->fetch_object('PedidoDetalle');
        $res[] = $producto;
        while($producto = $result->fetch_object('PedidoDetalle')){
            $res[] = $producto;
        }
        return $res;
    }
    
    public static function getPedidoId($pedido_id){
        //preparamos la consulta
        $con = DataBase::connect(); 
    
        $stmt = $con->prepare("SELECT * FROM pedido WHERE pedido_id = ?");
        $stmt->bind_param("i",$pedido_id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object('PedidoDetalle');
        // var_dump($result);
        $con->close();
        //Alamcenamos el resultado en una lista
    
        return $result;
    }
    
}