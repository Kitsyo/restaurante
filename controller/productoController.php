<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        //cabezera
        include_once "view/cabecera.php";
        //Panel Pedido
        $entrantes = productoDAO::getProductosById(1);
        $postres = productoDAO::getProductosById(2);
        $hamburguesas = productoDAO::getProductosById(3);
        $veganas = productoDAO::getProductosById(4);
        $sinGluten = productoDAO::getProductosById(5);


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