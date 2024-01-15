<?php
include_once "model/productoDAO.php";
include_once "model/clienteDAO.php";
//esto es una clase php
class productoController{
    public function index(){
        session_start();
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
        
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
        header("Location:".url."?controller=producto&action=carta");
    }
    public function inicioUser(){
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
                $clienteID = clienteDAO::getCliente($email,$md5pass);
                // var_dump($clienteID);
                
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
                                    //Reindexamos
                                    $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
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
            foreach($_SESSION['selecciones'] as $pedido2){
                $pedido = unserialize($pedido2);
                $prod_id =  $pedido->getProducto()->getProducto_id();
                $cant = $pedido->getCantidad();
                $precio_total = $pedido->devuelvePrecio();
                $fecha_pedido=date("Y-m-d H:i:s");
                productoDAO::confirmarPedido($fecha_pedido,$prod_id,$cant,$precio_total);
                
            }
            setcookie('selecciones',3600);
            $_SESSION['selecciones'] = array();
            header("Location:".url."?controller=producto&action=carrito");

        }
        
        //Guardo la cookie
        setcookie('UltimoPedido',3600);
    }
    
}
