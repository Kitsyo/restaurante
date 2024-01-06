<?php
include_once "model/productoDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        session_start();

        //cabecera
        

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
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

        include_once "view/cabecera_carta.php";
        //panelCarta


        $entrantes = productoDAO::getAllProductos(1);
        $postres = productoDAO::getAllProductos(2);
        $hamburguesas = productoDAO::getAllProductos(3);
        $veganas = productoDAO::getAllProductos(4);
        $sinGluten = productoDAO::getAllProductos(5);
        $desayunos = productoDAO::getAllProductos(6);
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

        // if (!isset($_SESSION['selecciones'])){
        //     $_SESSION['selecciones'] = array();
        // }

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

        //cabezera
        include_once "view/cabecera_carrito.php";
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        //Panel Pedido

        
        include_once "view/panelCarrito.php";
        

        //footer
        include_once "view/footer.php";
        
    }
    public function carritoDetalle(){
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "utils/CalculadoraPrecio.php";
        
        session_start();
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if (isset($_POST['producto_id'])){
            // $_SESSION['selecciones'] = array();
                $producto_id = $_POST['producto_id'];
                $categoria_id = $_POST['categoria_id'];
                $pedido_existe = false;
                $i = 0;
                    foreach($_SESSION['selecciones'] as $pedido2){
                        $pedido = unserialize($pedido2);
                        if($pedido->getProducto()->getProducto_id() == $producto_id){
                            $pedido->setCantidad($pedido->getCantidad() + 1);
                            $pedido_existe = true;
                            //possible unset del array "selecciones" unset($_SESSION['selecciones'][$i])
                            $_SESSION['selecciones'][$i] = serialize($pedido);
                            break;
                        }
                        $i++;
                    }

                    if($pedido_existe == false){
                    $pedido = new Pedido(ProductoDAO::getProductByIdAndCat($producto_id,$categoria_id));
                    array_push($_SESSION['selecciones'],serialize($pedido));
                    }

                
                header("Location:".url."?controller=producto&action=carta");
            }else{
                header("Location:".url."?controller=producto&action=carta");
             } 
        }
        
    }
    public function registro(){
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        include_once "view/cabecera.php";

        
        //Panel registro
        include_once "view/panelRegistro.php";
        
        //footer
        include_once "view/footer.php";
    }

    public function confirmar(){
        //almacena el pedido en la base de datos (Pedido DAO que guarde el pedido en la bbdd)

        //Guardo la cookie
        setcookie('UltimoPedido',$_POST['cantidadFinal'],3600);

    }
}
?>