<?php
include_once 'Pedido.php';
include_once 'Producto.php';

class PedidoDetalle extends Pedido{
    
    private $pedido_id;
    private $producto_id;
    private $precio_total;
    private $cantidad;
    private $cliente_id;
    private $fecha_pedido;
    
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
     * Get the value of cliente_id
     */ 
    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    /**
     * Set the value of cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }
    /**
     * Get the value of fecha_pedido
     */ 
    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }

    /**
     * Set the value of fecha_pedido
     *
     * @return  self
     */ 
    public function setFecha_pedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;

        return $this;
    }
}
