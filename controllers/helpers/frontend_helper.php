<?php
//clase utilizada para mostrar vistas
class frontend_helper
{
    //Funcion que te monta una vista pasandole el nombre
    public static function template_index($content)
    {
        require_once("views/templates/header.php");
        require_once 'view/'.$controller->view.'.php';$content;
        require_once("views/templates/footer.php");
    }
}
