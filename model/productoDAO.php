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
        $nomCat = productoDAO::getNomCatById(1);
        
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
        // var_dump($result);
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
    public static function getProductByIdAndCat($producto_id, $categoria_id){
        //Preparamos la consulta para saber la categoria
        $con = DataBase::connect(); 
        
        // var_dump($nomCat);
        //consulta para el producto
        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$producto_id);
        
        //ejeccutamos consulta
        $stmt->execute();
        $result=$stmt->get_result();
        
        $conCategoria = $con->prepare("SELECT nombre_categoria FROM categorias WHERE categoria_id = ?");
        $conCategoria->bind_param("i",$categoria_id); 

        $conCategoria->execute();
        //recogemos el nombre de la categoria
        $categoria = $conCategoria->get_result()->fetch_object()->nombre_categoria;
        // var_dump($categoria);
        //indicamos que el resultado de la consulta es un object de nuestra categoria extrauida en la anterior consulta
        $result = $result->fetch_object($categoria);

        $con->close();

        return $result;

    }
    
}
