<?php
include_once 'config/dataBase.php';
include_once 'model/producto.php';
class productoDAO{
    public static function getAllProductos(){
        $con = DataBase::connect();

        if ($result = $con->query("SELECT * FROM productos")){

            while($procuto = $result->fetch_object("Producto")){
                var_dump($procuto);
                //echo $procuto['nombre'];
                echo '<p></p>';
            }
        }
    }
}