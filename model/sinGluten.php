<?php
include_once "Producto.php";

class SinGluten extends Producto{
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