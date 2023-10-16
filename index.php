    <?php
    include_once 'controlador/pedidoControl.php';
    include_once 'config/parameters.php';

    if(!isset($_GET['controller'])){
        //si no se pasa nada se muestra la página pricnipal
        header("Location:".url."?controller=pedido");
    
    }else{
        $nombre_controller=$_GET['controller'].'Controller';
        if(class_exists($nombre_controller)){
            //miramos si nos pasa una action
            //en caso contrario mostramos action por defecto

            $controller = new $nombre_controller;

            if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
                $action = $_GET['action'];
            }else{
                $action = action_default;
            }

            $controller->$action();
            

        }else{
            header("Location:".action_default."?controller=pedido");
        }
    }

    ?>
