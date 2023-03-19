<?php
class reviews
{
    public function index()
    {
        require_once("controllers/helpers/common_helper.php");
        
        $scripts_array = [
            '<script src="../../assets/js/reviews.js"></script>'
        ];

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/reviews.php');
        require_once('views/templates/footer.php');

    }
}
