<?php

class Clientes{
    
    protected $cliente_id;
    protected $email;
    protected $contrasena;
    protected $pedido_id;

    public function __construct(){
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
    public function setCleinte_id($cliente_id){
        $this->cliente_id = $cliente_id;
        return $this;
    }
    /**
     * Get the value of email
     */ 
    public function getEmail(){
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of contrasena
     */ 
    public function getContrasena(){
        return $this->contrasena;
    }
    /**
     * Set the value of contrasena
     *
     * @return  self
     */ 
    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
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
    

}