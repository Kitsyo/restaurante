<?php
include_once "../model/Producto.php";

class Entrantes extends Producto{
    public function __construct(){
    
    }

    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOPLATO;
        return $precioTotal;
    }
    public function devuelvePrecioDia(){
        return self::PRECIOPLATO;
    }

}