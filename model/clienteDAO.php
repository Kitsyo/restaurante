<?php
include_once "config/dataBase.php";
include_once "clientes.php";


class clienteDAO{
    public static function addUser($email,$password){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        
        //consulta para el producto
        $stmt = $con->prepare("INSERT INTO clientes(cliente_id, email, contrasena) VALUES ('','$email','$password')");
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
        
    }
    
    public static function logUser($email,$md5pass){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        
        //consulta para el producto
        $stmt = $con->prepare("SELECT * FROM clientes WHERE email = ? AND contrasena = ? ");
        $stmt->bind_param("ss",$email,$md5pass);
        
        //ejeccutamos consulta
        $stmt->execute();
        $result=$stmt->get_result();
        
        $con->close();
        
        return $result;
    }
    public static function getClienteId($email,$md5pass){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT cliente_id FROM clientes WHERE email = ? AND contrasena = ?");
        $stmt->bind_param("ss",$email,$md5pass);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object()->cliente_id;
        // var_dump($result);
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    public static function getCliente($email,$md5pass){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM clientes WHERE email = ? AND contrasena = ?");
        $stmt->bind_param("ss",$email,$md5pass);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object('clientes');
        // var_dump($result);
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    public static function getNombreCliente($id){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT email FROM clientes WHERE cliente_id = ?");
        $stmt->bind_param("i",$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object('clientes');
        // var_dump($result);
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    
}
