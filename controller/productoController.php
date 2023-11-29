<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){

        //iniciamos y tratamos sesison
        //iniciamos la sesison
        session_start();

        if(isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if(isset($_POST['id'])){
                if($_POST['tipo']== 'JUEGO'){
                    $pedido = new Pedido(productoDAO::getProductosById($_POST['id']));
                }
                array_push($_SESSION['selecciones'], $pedido);
            }
        }





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

        
        $entrantes = productoDAO::getProductosById(1);
        $postres = productoDAO::getProductosById(2);
        $hamburguesas = productoDAO::getProductosById(3);
        $veganas = productoDAO::getProductosById(4);
        $sinGluten = productoDAO::getProductosById(5);
        $desayunos = productoDAO::getProductosById(6);
        $nomEntrantes = productoDAO::getNomCatById(1);
        $nomPostres = productoDAO::getNomCatById(2);
        $nomHamburg = productoDAO::getNomCatById(3);
        $nomVeganas = productoDAO::getNomCatById(4);
        $nomSinGlu = productoDAO::getNomCatById(5);
        $nomDesayu = productoDAO::getNomCatById(6);
        include_once "view/panelCarta.php";
        //footer
        include_once "view/footer.php";
    }
    public function carrito(){
        //cabezera
        include_once "view/cabecera_carrito.php";
        //Panel Pedido

            
        include_once "view/panelCarrito.php";
        

        //footer
        include_once "view/footer.php";
        
    }
    public function compra(){
        session_start();
        //cabecera
        include_once "view/cabecera_carrito.php";

        //panel
        include_once "view/panelCompra.php";

        //footer
        include_once "view/footer.php";
    }
    public function eliminar(){
        // echo 'Producto Eliminado';
        if(isset($_POST['id'])){
            $id_product = $_POST['id'];
            productoDAO::deleteProductById($id_product);
            header("Location:".url.'?controller=producto');
        }
    }
    public function actualizar(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $catId = $_POST['catId'];

        productoDAO::updateProduct($id,$nombre,$descripcion,$precio,$catId);
        header("Location:".url.'?controller=producto');
    }
}
?>