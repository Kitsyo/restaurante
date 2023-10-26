<?php
include_once 'config/dataBase.php';
include_once 'model/productoDAO.php';
include_once 'model/Producto.php';

//esto es una clase php
class pedidoController{
    public function index(){
        echo 'Pagína principal pedidos';
        $allEntrantes = productoDAO::getAllProductos(1);
        //cabezera
        include_once 'view/cabecera.php';
        //Panel Pedido
        include_once 'view/panelPedido.php';
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