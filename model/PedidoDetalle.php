<?php

class PedidoDetalle extends Pedido{

    private $pedido_id;
    private $producto_id;
    private $precio_total;
    
    public function __construct(){
    }

    /**
     * Get the value of pedido_id
     */ 
    public function getPedido_id()
    {
        return $this->pedido_id;
    }

    /**
     * Set the value of pedido_id
     *
     * @return  self
     */ 
    public function setPedido_id($pedido_id)
    {
        $this->pedido_id = $pedido_id;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setProductoId($producto_id)
    {
        $this->$producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of precio_total
     */ 
    public function getPrecio_total()
    {
        return $this->precio_total;
    }

    /**
     * Set the value of precio_total
     *
     * @return  self
     */ 
    public function setPrecio_total($precio_total)
    {
        $this->precio_total = $precio_total;

        return $this;
    }
}