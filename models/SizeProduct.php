<?php
require_once('models/ExtraProduct.php');
class SizeProduct extends ExtraProduct
{
    protected $idExtra;
    protected $nombreExtra;
    protected $precio;
    protected $idCategoriaExtra;

    public function __construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra = 3)
    {
        parent::__construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra);
        $this->idCategoriaExtra = 3;
    }

    //Funciones

    //Falta método abstracto
}
