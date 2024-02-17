<?php
//Esto es un NUEVO CONTROLADOR
//hacer todas las configuraciones necesarias para que funcione como controlador

/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD
include_once "model/productoDAO.php";
include_once "model/clienteDAO.php";
include_once "model/pedidoDAO.php";
include_once "config/parameters.php";
include_once "model/resenasDAO.php";

/** IMPORTANTE**/
//Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.


class APIController{    
    public function recogerResenas(){
        
        // Recoger el contenido JSON enviado por la solicitud POST
        $json = file_get_contents('php://input');
        // var_dump($json);
        // Decodificar el JSON en un array asociativo de PHP
        $datos = json_decode($json, TRUE);
        
        // Verifica si los datos son válidos
        if (isset($datos['usuario']) && isset($datos['comentario_resena']) && isset($datos['pedido_id']) && isset($datos['fechaPedido']) && isset($datos['cliente_id']) && isset($datos['valoracion'])) {
            // Procesa los datos aquí, por ejemplo, guardarlos en una base de datos
            $email = $datos['usuario'];
            $cliente_id = $datos['cliente_id'];
            $comentario_resena = $datos['comentario_resena'];
            $pedido_id = $datos['pedido_id'];
            $fecha_resena = $datos['fechaPedido'];
            $valoracion = $datos['valoracion'];
            resenasDAO::setResena($cliente_id, $pedido_id, $email, $valoracion, $fecha_resena, $comentario_resena);
            // Envía una respuesta JSON exitosa
            echo json_encode(['success' => true]);
            
            

        }
        header("Location:".url."?controller=API&action=mostrarResenasUsuario");
    }
    public function mostrarAllResenas(){
        session_start();
        include_once "model/resenasDAO.php";
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
        $allResenas = resenasDAO::getAllResenas();
        

        include_once "view/cabecera/cabecera_login.php";
        
        //Panel
        include_once "view/panelResenasProductos.php";
        
        //footer
        include_once "view/footer.php";
    }
    public function mostrarResenasUsuario(){
        session_start();
        include_once "model/resenasDAO.php";
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
        $id = $_SESSION['usuario']->getCliente_id();
        $email = $_SESSION['usuario']->getEmail();
        
        $allResenas = resenasDAO::getAllResenasById($id);
        

        include_once "view/cabecera/cabecera_login.php";
        
        //Panel
        include_once "view/panelResenasUsuario.php";
        
        //footer
        include_once "view/footer.php";
    }
    
}