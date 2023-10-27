<?php
include_once "../model/productoDAO.php";

//esto es una clase php
class productoController{
    public function index(){
        echo 'Hola';
        $entrantes = productoDAO::getAllProductos('Entrantes');
        //cabezera
        include_once "../view/cabecera.php";
        //Panel Pedido
        include_once "../view/panelPedido.php";
        //footer
        
    }
    public function compra(){
        echo 'pagina de compra';
    }
    public function eliminar(){
        echo 'Producto Eliminado';
    }
}
?>