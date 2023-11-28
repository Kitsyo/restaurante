<?php
include_once "config/dataBase.php";
include_once "Producto.php";
include_once "entrantes.php";
include_once "postres.php";


class productoDAO{
    public static function getProductosById($id){
        //preparamos la consulta
        $con = DataBase::connect(); 

        $stmt = $con->prepare("SELECT * FROM producto WHERE categoria_id = ?");
        $stmt->bind_param("i",$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();

        //Alamcenamos el resultado en una lista
        $res=[];
        $obj = "";
        if($id = 1){
            $obj="Entrantes";
        }elseif($id = 2){
            $obj="Postres";
        }elseif($id = 3){
            $obj="Hamburguesas";
        }elseif($id = 4){
            $obj="Veganas";
        }elseif($id = 5){
            $obj="Sin gluten";
        }elseif($id = 6){
            $obj="Desayunos";
        }
        // arreglar el fetch para los resutlatos en el array
        while($productoDB = $result->fetch_object($obj)){
            $res[] = $productoDB;
            
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
