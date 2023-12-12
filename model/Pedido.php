<?php
include_once 'model/Producto.php';
class Pedido{

    private $producto;
    private $cantidad = 1;


    public function __construct($producto){
        $this->producto=$producto;
        // var_dump($producto);
    }

    /**
     * Get the value of producto
     */
    public function getProducto(){
        // var_dump($this->producto);
        return $this->producto;
    }
    public function getProductoId(){
        return $this->producto->producto_id;
    }
    public function getCategoriaId(){
        return $this->producto->categoria_id;
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
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;

        return $this;
    }
}