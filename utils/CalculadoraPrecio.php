<?php
class CalculadoraPrecios{

    public static function calculadoraPrecioPedido(){
        $precioTotal = 0;
            foreach($_SESSION['selecciones'] as $pedido1){
            $pedido = unserialize($pedido1);
            $precioTotal += $pedido->devuelvePrecio();
            }
        return $precioTotal;
    }
}