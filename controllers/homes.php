<?php
class homes
{
    public function index()
    {
        //Carga archivos necesarios para utilizar en las vistas
        require_once('controllers/helpers/common_helper.php');

        $scripts_array = [
            '<script src="../../assets/js/homes.js"></script>'
        ];
        
        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/homes.php');
        require_once('views/templates/footer.php');
    }
}
