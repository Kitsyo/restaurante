<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        //cabezera
        include_once "view/cabecera.php";
        //Panel Pedido
        $entrantes = productoDAO::getAllProductos(1);
        $postres = productoDAO::getAllProductos(2);

        include_once "view/panelPedido.php";
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