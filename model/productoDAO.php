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
    public static function getProductById($id){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT nombre_categoria FROM categorias WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);

        //ejecutamos la consulta
        $stmt->execute();
        $nomCat=$stmt->get_result()->fetch_object()->nombre_categoria;
        // var_dump($nomCat);
        //consulta para el producto
        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);
        
        //ejeccutamos consulta
        $stmt->execute();
        $result=$stmt->get_result();
        
        $con->close();

        $producto = $result->fetch_object($nomCat);
        $res[] = $producto;
        while($producto = $result->fetch_object($nomCat)){
            $res[] = $producto;
            
        }
        return $res;

    }
    public static function getNomCatById($id){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT nombre_categoria FROM categorias WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result()->fetch_object()->nombre_categoria;
        $con->close();

        //Alamcenamos el resultado en una lista

        return $result;
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
    
}
