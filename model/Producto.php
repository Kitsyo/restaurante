<?php

abstract class Producto{

    const PRECIOPLATO = 3;
    const PRECIODESAYUNO = 2;

    protected $producto_id;
    protected $nombre_producto;
    protected $categoria_id;
    protected $precio;

    public function __construct(){
    }

/*
    public function __construct($producto_id, $nombre_producto, $categoria_id , $precio){
        $this->producto_id = $producto_id;
        $this->nombre_producto = $nombre_producto;
        $this->categoria_id = $categoria_id;
        $this->precio = $precio;
    }
*/

    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of nombre_producto
     */ 
    public function getNombre_producto()
    {
        return $this->nombre_producto;
    }

    /**
     * Set the value of nombre_producto
     *
     * @return  self
     */ 
    public function setNombre_producto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }
    
    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
    
    public abstract function calculaPrecioTotal($numDias);
    public abstract function devuelvePrecioDia();

}