<?php

abstract class Producto{

    const PRECIOPLATO = 3;
    const PRECIODESAYUNO = 2;

    protected $producto_id;
    protected $nombre_producto;
    protected $categoria_id;
    protected $precio;
    protected $descripcion;
    protected $ingrediente_id;

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


	/**
	 * @return mixed
	 */
	public function getDescripcion() {
		return $this->descripcion;
	}
	
	/**
	 * @param mixed $descripcion 
	 * @return self
	 */
	public function setDescripcion($descripcion): self {
		$this->descripcion = $descripcion;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIngrediente_id() {
		return $this->ingrediente_id;
	}
	
	/**
	 * @param mixed $ingrediente_id 
	 * @return self
	 */
	public function setIngrediente_id($ingrediente_id): self {
		$this->ingrediente_id = $ingrediente_id;
		return $this;
	}
}