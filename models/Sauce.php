<?php
require_once('models/ExtraProduct.php');
class Sauce extends ExtraProduct
{
    protected $idExtra;
    protected $nombreExtra;
    protected $precio;
    protected $idCategoriaExtra;

    public function __construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra = 2)
    {
        parent::__construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra);
        $this->idCategoriaExtra = 2;
    }

    //Funciones

    //Falta método abstracto
}
