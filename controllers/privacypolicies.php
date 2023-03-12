<?php
class privacypolicies
{
    public function index()
    {
        //Carga archivos necesarios para utilizar en las vistas
        require_once("controllers/helpers/common_helper.php");
        
        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/privacypolicies.php');
        require_once('views/templates/footer.php'); 
    }
}
