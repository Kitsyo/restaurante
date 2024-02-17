<?php
include_once 'model/Producto.php';
include_once 'model/Pedido.php';
include_once 'model/clientes.php';
class Resenas{

    private $resena_id;
    private $cliente_id;
    private $pedido_id;
    private $usuario;
    private $valoracion;
    private $fecha_resena;
    private $comentario_resena;
    
    public function __construct(){
    }

    /**
     * Get the value of resena_id
     */ 
    public function getResena_id(){
        return $this->resena_id;
    }
    /**
     * Set the value of resena_id
     *
     * @return  self
     */ 
    public function setResena_id($resena_id){
        $this->resena_id = $resena_id;
        return $this;
    }
        
    /**
     * Get the value of cliente_id
     */ 
    public function getCliente_id(){
        return $this->cliente_id;
    }
    /**
     * Set the value of cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($cliente_id){
        $this->cliente_id = $cliente_id;
        return $this;
    }
    
    /**
     * Get the value of pedido_id
     */ 
    public function getPedido_id(){
        return $this->pedido_id;
    }
    /**
     * Set the value of pedido_id
     *
     * @return  self
     */ 
    public function setPedido_id($pedido_id){
        $this->pedido_id = $pedido_id;
        return $this;
    }
        
    /**
     * Get the value of valoracion
     */ 
    public function getValoracion(){
        return $this->valoracion;
    }
    /**
     * Set the value of valoracion
     *
     * @return  self
     */ 
    public function setValoracion($valoracion){
        $this->valoracion = $valoracion;
        return $this;
    }
            
    /**
     * Get the value of fecha_resena
     */ 
    public function getFecha_resena(){
        return $this->fecha_resena;
    }
    /**
     * Set the value of fecha_resena
     *
     * @return  self
     */ 
    public function setFecha_resena($fecha_resena){
        $this->fecha_resena = $fecha_resena;
        return $this;
    }
                
    /**
     * Get the value of comentario_resena
     */ 
    public function getComentario_resena(){
        return $this->comentario_resena;
    }
    /**
     * Set the value of comentario_resena
     *
     * @return  self
     */ 
    public function setComentario_resena($comentario_resena){
        $this->comentario_resena = $comentario_resena;
        return $this;
    }/**
     * Get the value of usuario
     */ 
    public function getUsuario(){
        return $this->usuario;
    }
    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
    }
   
}