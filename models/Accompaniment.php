<?php
require_once('models/ExtraProduct.php');
class Accompaniment extends ExtraProduct
{
    protected $idExtra;
    protected $nombreExtra;
    protected $precio;
    protected $idCategoriaExtra;

    public function __construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra = 1)
    {
        parent::__construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra);
        $this->idCategoriaExtra = 1;
    }

    //Funciones

    //Falta método abstracto
}
