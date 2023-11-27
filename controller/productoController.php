<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        //cabezera
        include_once "view/cabecera.php";
        //Panel Pedido
            $nomEntrantes = productoDAO::getNomCatById(1);
            $nomPostres = productoDAO::getNomCatById(2);
            $nomHamburg = productoDAO::getNomCatById(3);
            $nomVeganas = productoDAO::getNomCatById(4);
            $nomSinGlu = productoDAO::getNomCatById(5);
            $nomDesayu = productoDAO::getNomCatById(6);
        include_once "view/panelPedido.php";
        

        //footer
        include_once "view/footer.php";
        
    }
    public function carta(){
        include_once "view/cabecera_carta.php";
        //panelCarta

        //mostrar nombre categorias (botones home)
        include_once "view/panelCarta.php";
        $entrantes = productoDAO::getProductosById(1);
        $postres = productoDAO::getProductosById(2);
        $hamburguesas = productoDAO::getProductosById(3);
        $veganas = productoDAO::getProductosById(4);
        $sinGluten = productoDAO::getProductosById(5);

        //footer
        include_once "view/footer.php";
    }
    public function compra(){
        echo 'pagina de compra';
    }
    public function eliminar(){
        echo 'Producto Eliminado';
    }
}
?>