<?php
require_once('models/ExtraProduct.php');
class CookingDegree extends ExtraProduct
{
    protected $idExtra;
    protected $nombreExtra;
    protected $precio;
    protected $idCategoriaExtra;

    public function __construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra = 4)
    {
        parent::__construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra);
        $this->idCategoriaExtra = 4;
    }

    //Funciones

    //Falta método abstracto
}
