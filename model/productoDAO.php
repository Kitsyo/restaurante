<?php
include_once "config/dataBase.php";
include_once "Producto.php";
include_once "entrantes.php";
include_once "postres.php";
include_once "hamburguesas.php";
include_once "sinGluten.php";
include_once "veganas.php";
include_once "desayunos.php";


class productoDAO{
    public static function getAllProductos($id){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        $nomCat = productoDAO::getNomCatById($id);
        
        //consulta para el producto
        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);
        
        //ejeccutamos consulta
        $stmt->execute();
        $result=$stmt->get_result();
        
        $con->close();
        // var_dump($nomCat);
        $producto = $result->fetch_object($nomCat);
        $res[] = $producto;
        while($producto = $result->fetch_object($nomCat)){
            $res[] = $producto;
        }
        return $res;

    }
    public static function getNomCatById($nomId){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT nombre_categoria FROM categorias WHERE categoria_id = ?");
        $stmt->bind_param("i",$nomId);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object()->nombre_categoria;
        // var_dump($result);
        $con->close();
        //Alamcenamos el resultado en una lista

        return $result;
    }
    public static function getProductByIdAndCat($producto_id,$categoria_id){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        $nomCat = productoDAO::getNomCatById($categoria_id);
        
        //consulta para el producto
        $stmt = $con->prepare("SELECT * FROM producto WHERE producto_id = ? ");
        $stmt->bind_param("i",$producto_id);
        
        //ejeccutamos consulta
        $stmt->execute();
        $result=$stmt->get_result();
        
        $con->close();
        // var_dump($nomCat);
        $producto = $result->fetch_object($nomCat);
        
        return $producto;

    }
    public static function updateProduct($id,$nombre,$descripcion,$precio,$catId){
        $con = DataBase::connect(); 

        $stmt = $con->prepare("UPDATE producto SET producto_id= ?,nombre_producto= ?,descripcion= ?,precio= ?,categoria_id= ?,imagen_producto= ? WHERE categoria_id = ?");
        $stmt->bind_param("issdis",$id,$nombre,$descripcion,$precio,$catId); //preguntar si el campo imagen lo pongo i o lo dejo vacio

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
    }
    public static function deleteProductById($id){
        $con = DataBase::connect(); 

        $stmt = $con->prepare("DELETE * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
    }
    public static function addUser($email,$password){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        
        //consulta para el producto
        $stmt = $con->prepare("INSERT INTO clientes(cliente_id, email, contrasena, pedido_id) VALUES ('','$email','$password','')");
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        return $result;
        
    }
    public static function logUser($email,$password){
        $con = DataBase::connect();
        $md5pass = md5($password);

        $stmt = $con->prepare("SELECT * FROM clientes WHERE email = :user AND contrasena = :pass ");
    
        //ejecutamos la consulta
        $result=$stmt->get_result();
        $con->close();
        return $result;
    }
    // public static function logUserPass($password){
    //     $con = DataBase::connect(); 

    //     $stmt = $con->prepare("SELECT * FROM cliente WHERE contrasena = ?");
    //     $stmt->bind_param("s",$password);

    //     //ejecutamos la consulta
    //     $stmt->execute();
    //     $result=$stmt->get_result();
    //     $con->close();
    //     return $result;
    // }

}
