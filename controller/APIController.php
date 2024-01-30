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
 
    public function api(){
       
        if($_POST["accion"] == 'consulta_resena'){
            $allResenas = resenasDAO::getAllResenas(); //puedes hacer un select de pedidos aqui, o un insert o lo que quieras, utilizando el MODELO
            $arrayResenas = [];

            foreach($allResenas as $resenas){
                $arrayResenas[] =[
                    "cliente_id" => $resenas->getCliente_id(),
                    "pedido_id" => $resenas->getPedido_id(),
                    "valoracion" => $resenas->getValoracion(),
                    "fecha_resena" => $resenas->getFecha_resena(),
                    "comentario_resena" => $resenas->getComentario_resena(),
                ];
            }

            //$id_usuario = json_decode($_POST["id_usuario"]); se decodifican los datos JSON que se reciben desde JS
            
            // Si quieres devolverle información al JS, codificas en json un array con la información
            // y se los devuelves al JS
            echo json_encode($arrayResenas, JSON_UNESCAPED_UNICODE) ; 
            return; //return para salir de la funcion

        }
        else if($_POST["accion"] == 'add_review'){

            $id_pedido = json_decode($_POST["pedido"]); //se decodifican los datos JSON que se reciben desde JS
            $id_usuario = json_decode($_POST["id_usuario"]); //se decodifican los datos JSON que se reciben desde JS
            
            /*

                Otras operaciones

            */
            
            //si solo quieres devolver un pequeño mensaje, simplemente puedes hacer un echo de texto
            echo "Bienvenido Pedrito";
            return;
        }
    }
}