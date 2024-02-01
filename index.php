    <?php
    include_once "config/parameters.php";
    include_once "controller/productoController.php";
    include_once "controller/APIController.php";

    if(!isset($_GET['controller'])){
        //si no se pasa nada se muestra la página pricnipal
        header("Location:".url."?controller=producto");
    
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
        

        // }elseif ($_GET['controller'] == 'api'){

        }else{
            header("Location:".url."?controller=producto");
        }
    }
?>
