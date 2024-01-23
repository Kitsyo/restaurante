<?php
include_once "model/productoDAO.php";
include_once "model/clienteDAO.php";
include_once "model/pedidoDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        session_start();
        $_SESSION['selecciones'] = array();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = array();
            include_once "view/cabecera/cabecera.php";

        
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
        }else{

        }
        //si el usuario a iniciado session, añade la cebecera del login con su nombre 
        //y el panel con el enlaze al panel de info usuario.
        include_once "view/cabecera/cabecera_login.php";

        
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
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        include_once "view/cabecera/cabecera_carta.php";
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
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])) {
            header('location: login.php');
        }
            
        //cabezera
        include_once "view/cabecera/cabecera_carrito.php";
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        //Panel Pedido

        
        include_once "view/panelCarrito.php";
        

        //footer
        include_once "view/footer.php";
        
    }
    public function carritoDetalle(){
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "model/clientes.php";
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
        header("Location:".url."?controller=producto&action=carta");
    }
    public function inicioUser(){
        session_start();
        include_once "model/clientes.php";
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if(isset($_POST['ini_log'])){
            $email = $_POST['verif_email'];
            $md5pass = $_POST['verif_pass'];

            $password = password_verify($_POST['verif_pass'], $md5pass);
            $result = clienteDAO::logUser($email,$md5pass);

            if ($result->num_rows == 1){
                
                $_SESSION['usuario'] = clienteDAO::getCliente($email,$md5pass);
                
                
                header("Location:".url."?controller=producto&action=carrito");
            }else{
                header("Location:".url."?controller=producto&action=inicioUser");
            }
            
        }
        
        include_once "view/cabecera/cabecera.php";
        //Panel
        include_once "view/panelInicioSesion.php";
        //footer
        include_once "view/footer.php"; 
    }
    public function registroUser(){
        session_start();
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if(isset($_POST['registro'])){
            if(empty($_POST['correo']) or empty($_POST['contraseña'])){
                echo "no va";
            }else{
                $email = $_POST['correo'];
                // $password = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); // Hashear la contraseña antes de almacenarla en la base de datos
                $password = $_POST["contraseña"];
                // Preparar la consulta SQL para insertar un nuevo usuario
                clienteDAO::addUser($email,$password);  
            }
        }

        include_once "view/cabecera/cabecera.php";
        
        //Panel
        include_once "view/panelRegistro.php";
        
        //footer
        include_once "view/footer.php";
    }
    public function añadirCant(){
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        else{
            if (isset($_POST['Add'])){
            // $_SESSION['selecciones'] = array();
                $producto_id = $_POST['Add'];
                $pedido_existe = false;
                $i = 0;
                    foreach($_SESSION['selecciones'] as $pedido2){
                        $pedido = unserialize($pedido2);
                        if($pedido->getProducto()->getProducto_id() == $producto_id){{
                            $pedido->setCantidad($pedido->getCantidad() + 1);
                            $pedido_existe = true;
                            $_SESSION['selecciones'][$i] = serialize($pedido);
                            break;
                                }
                            }
                            $i++;
                        }
                header("Location:".url."?controller=producto&action=carrito");
            }else if (isset($_POST['Del'])){
                // $_SESSION['selecciones'] = array();
                    $producto_id = $_POST['Del'];
                    $pedido_existe = false;
                    $i = 0;
                        foreach($_SESSION['selecciones'] as $pedido2){
                            $pedido = unserialize($pedido2);
                            
                            if($pedido->getProducto()->getProducto_id() == $producto_id){{
                                if($pedido->getCantidad()==1){
                                    unset($_SESSION['selecciones'][$_POST['Del']]);
                                    // array_splice($_SESSION['selecciones'],$_POST['Del'],1);
                                    //Reindexamos
                                    // array_values($_SESSION['selecciones']);
                                }else{
                                    $pedido->setCantidad($pedido->getCantidad() - 1);
                                    $pedido_existe = true;
                                    $_SESSION['selecciones'][$i] = serialize($pedido);
                                    break;
                                        }
                                    }
                                }
                                $i++;
                            }
                        header("Location:".url."?controller=producto&action=carrito");
                }
        }
    }
    public function confirmar(){
        //almacena el pedido en la base de datos (Pedido DAO que guarde el pedido en la bbdd)
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "model/clientes.php";

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = array();
        }
        if(isset($_POST['confirmar'])){
            foreach($_SESSION['selecciones'] as $prueba){

                setcookie('selecciones',$prueba, time() + 3600, "/");
            }
            foreach($_SESSION['selecciones'] as $pedido2){
                $pedido = unserialize($pedido2);
                if($pedido->getProducto()->getProducto_id() == $producto_id){
                    $pedido->setCantidad($pedido->getCantidad() + 1);
                }
                $cliente_id = $_SESSION['usuario']->getCliente_id();
                $prod_id =  $pedido->getProducto()->getProducto_id();
                $cant = $pedido->getCantidad();
                $precio_total = $pedido->devuelvePrecio();
                $fecha_pedido=date("Y-m-d H:i:s");
                productoDAO::confirmarPedido($cliente_id,$fecha_pedido,$prod_id,$cant,$precio_total);
                
            }
            //serializo el pedido
            $_SESSION['selecciones'] = serialize($pedido);
            //Guardo la cookie
            $_SESSION['selecciones'] = array();
            header("Location:".url."?controller=producto&action=carrito");

        }
        
    }
    public function panelUsuario(){
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "model/clientes.php";
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = array();
        }
        

        include_once "view/cabecera/cabecera_login.php";
        
        //Panel
        include_once "view/panelUsuario.php";
        
        //footer
        include_once "view/footer.php";
    }

    public function panelResena(){
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "model/clientes.php";
        include_once "model/Resenas.php";
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = array();
        }

        $cliente_id = $_SESSION['usuario']->getCliente_id();
        $pruebas = pedidoDAO::getPedidoById($cliente_id);
        // $clienteid=$pruebas['cliente_id'];
        include_once "view/cabecera/cabecera_carta.php";
        
        //Panel
        include_once "view/panelResena.php";
        
        //footer
        include_once "view/footer.php";
    }
    public function detallesResena(){
        session_start();
        include_once "model/Producto.php";
        include_once "model/Pedido.php";
        include_once "model/PedidoDetalle.php";
        include_once "model/clientes.php";
        include_once "model/Resenas.php";
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        if (!isset($_SESSION['usuario'])){
            $_SESSION['usuario'] = array();
        }
        if(isset($_POST['pedido_id'])){
            $pedido_id = $_POST['pedido_id'];
            header("Location:".url."?controller=producto&action=panelResena");
        }
        header("Location:".url."?controller=producto&action=panelResena");
        
    }
    
}
