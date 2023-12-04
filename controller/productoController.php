<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){

        //iniciamos y tratamos sesison
        //iniciamos la sesison       
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
        session_start();
        productoController::prueba();


        // if(isset($_POST['Add'])){
        //     //añadimos dia
        //     $pedido = $_SESSION['selecciones'][$_POST['Add']];
        //     $pedido->setCantidad($pedido->getCantidad()+1);
        // }else if(isset($_POST['Del'])){
        //     $pedido = $_SESSION['selecciones'][$_POST['Del']];
        //     if ($pedido->getCantidad()==1){
        //         unset($_SESSION['selecciones'][$_POST['Del']]);
        //         //Tenemos que re-indexar el array
        //         $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
        //     }else{
        //         $pedido->setCantidad($pedido->getCantidad()-1);
        //     }
        // }
        var_dump($_SESSION['selecciones']);

        include_once "view/cabecera_carta.php";
        //panelCarta




        $entrantes = productoDAO::getProductById(1);
        $postres = productoDAO::getProductById(2);
        $hamburguesas = productoDAO::getProductById(3);
        $veganas = productoDAO::getProductById(4);
        $sinGluten = productoDAO::getProductById(5);
        $desayunos = productoDAO::getProductById(6);
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
        session_start();
        productoController::prueba();



        // if(isset($_POST['Add'])){
        //     //añadimos dia
        //     $pedido = $_SESSION['selecciones'][$_POST['Add']];
        //     $pedido->setCantidad($pedido->getCantidad()+1);
        // }else if(isset($_POST['Del'])){
        //     $pedido = $_SESSION['selecciones'][$_POST['Del']];
        //     if ($pedido->getCantidad()==1){
        //         unset($_SESSION['selecciones'][$_POST['Del']]);
        //         //Tenemos que re-indexar el array
        //         $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
        //     }else{
        //         $pedido->setCantidad($pedido->getCantidad()-1);
        //     }
        // }
        var_dump($_SESSION['selecciones']);
        //cabezera
        include_once "view/cabecera_carrito.php";
        //Panel Pedido

        
        include_once "view/panelCarrito.php";
        

        //footer
        include_once "view/footer.php";
        
    }
    public function prueba(){
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if (isset($_POST['producto_id'])){
                $producto_id = $_POST['producto_id'];

                $pedido_existe = false;

                foreach ($_SESSION['selecciones'] as $pedido) {
                    if($pedido->getProducto()->getProducto_id() == $producto_id){
                        $pedido->setCantidad($pedido->getCantidad() + 1);
                        $pedido_existe = true;
                        break;
                    }
                }
                
                if($pedido_existe == false){
                    // $pedido = new Pedido(ProductoDAO::getProductById($producto_id));
                
                    array_push($_SESSION['selecciones'], $pedido);
                }

            //     header("Location:".url."?controller=producto&action=carta");
            // }else{
            //     header("Location:".url."?controller=producto&action=carta");
             } 
        }

    }
    public function confirmar(){
        //almacena el pedido en la base de datos (Pedido DAO que guarde el pedido en la bbdd)

        //Guardo la cookie
        setcookie('UltimoPedido',$_POST['cantidadFinal'],3600);

    }
    // public function actualizar(){
    //     $id = $_POST['id'];
    //     $nombre = $_POST['nombre'];
    //     $descripcion = $_POST['descripcion'];
    //     $precio = $_POST['precio'];
    //     $catId = $_POST['catId'];

    //     productoDAO::updateProduct($id,$nombre,$descripcion,$precio,$catId);
    //     header("Location:".url.'?controller=producto');
    // }
    // public function eliminar(){
    //     // echo 'Producto Eliminado';
    //     if(isset($_POST['id'])){
    //         $id_product = $_POST['id'];
    //         productoDAO::deleteProductById($id_product);
    //         header("Location:".url.'?controller=producto');
    //     }
    // }
}
?>