<?php

class Pedido{

    private $producto;
    private $cantidad = 1;


    public function __construct($producto){
        $this->producto=$producto;
    }

    /**
     * Get the value of producto
     */
    public function getProducto(){
        return $this->producto;
    }

    /**
     * Set value of preoducto
     * 
     * @return self
     */
    public function setProducto($producto){
        $this->producto = $producto;

        return $this;
    }
    /**
     * Get the value of canidad
     */
    public function getCantidad(){
        return $this->cantidad;
    }
}