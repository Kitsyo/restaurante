<?php
include_once 'model/Producto.php';
class Pedido{

    private $producto;

    private $cantidad = 1;

    private $fecha_pedido;
    private $precio_total;


    public function __construct($producto){
        $this->producto=$producto;
    }
    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
    /**
     * Get the value of fecha_pedido
     */ 
    public function getFechaPedido()
    {
        return $this->fecha_pedido;
    }

    /**
     * Set the value of fecha_pedido
     *
     * @return  self
     */ 
    public function setFechaPedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;

        return $this;
    }
    /**
     * Get the value of precio_total
     */ 
    public function getPrecioTotal()
    {
        return $this->precio_total;
    }

    /**
     * Set the value of precio_total
     *
     * @return  self
     */ 
    public function setPrecioTotal($precio_total)
    {
        $this->precio_total = $precio_total;

        return $this;
    }
    public function devuelvePrecio(){
        return $this->producto->getPrecio()*$this->cantidad;
        
    }
    public function devuelvePrecioTotal(){
        return $this->producto->getPrecio()*$this->cantidad;

    }
    public static function calculadoraPrecioPedido($pedido){
        $precioTotal = 0;
        foreach($pedido as $pedidos){
            $precioTotal += $precioTotal;
        }
        return $precioTotal;
    }
}