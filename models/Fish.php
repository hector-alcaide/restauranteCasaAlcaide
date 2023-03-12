<?php
require_once('models/Product.php');
class Fish extends Product
{
    //array extras con los diferentes tipos de extras que existen, el nombre del subarray de extras es la idCategoria del extra
    private $extras = array(
        '7' => array(),
        '8' => array()
    );

    public function __construct()
    {
    }

    public function getExtras()
    {
        return $this->extras;
    }
}
