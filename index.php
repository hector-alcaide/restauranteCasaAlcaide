<?php
require_once 'config/parameters.php';
require_once 'models/UserDAO.php';

//consigue, si existe, el nombre del controlador
$controller_name = isset($_GET["controllers"]) ? $_GET["controllers"] : '';

//si hay get de controlador genera una ruta para incluirlo, sino redirecciona a la home
if (isset($controller_name) && $controller_name) {
    //ruta del controlador para incluirlo
    $controller_path = 'controllers/' . $controller_name . '.php';
    include_once $controller_path;

    //si existe su clase lo carga, sino redirecciona a la home
    if (class_exists($controller_name)) {
        //instancia del controlador
        $controller = new $controller_name();

        //si no hay get de accion o no existe el metodo, te carga la por defecto(index)
        if (!isset($_GET["action"]) || !method_exists($controller, $_GET["action"])) {
            $action = DEFAULT_ACTION;
        } else {
            $action = $_GET["action"];
        }

        //inicia la session y carga la accion del controller
        $controller->$action();
    } else {
        include_once('controllers/homes.php');
        $home = new homes();
        $home->index();
    }
} else {
    include_once('controllers/homes.php');
    $home = new homes();
    $home->index();
}
