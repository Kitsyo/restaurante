<?php
    if(isset($_GET['controller'])){
        echo "esto quieres realizar una action sobre ".$_GET['controller'];
        if(isset($_GET['action'])){
            echo "sobre".$_GET['controller']."quieres mostrar la página".$_GET['action'];
        }else{
            echo "No me has paado el controlador";
        }
    }


?>