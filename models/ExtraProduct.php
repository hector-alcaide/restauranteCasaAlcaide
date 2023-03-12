<?php
abstract class ExtraProduct
{
    protected $idExtra;
    protected $nombreExtra;
    protected $precio;
    protected $idCategoriaExtra;

    public function __construct($idExtra, $nombreExtra, $precio, $idCategoriaExtra)
    {
        $this->idExtra = $idExtra;
        $this->nombreExtra = $nombreExtra;
        $this->precio = $precio;
        $this->idCategoriaExtra = $idCategoriaExtra;
    }

    //Id del pedido
    public function getIdExtra()
    {
        return $this->idExtra;
    }
    /*
    * Set id comentado ya que el id de un pedido no deberia poderse cambiar ya que pueden generarse conflictos 
    * con IDs ya creados. por constructor se pasa un ID autoincremental pillando la ultima posicion de un array 
    */
    // public function setIdExtra($idExtra)
    // {
    //     $this->idExtra = $idExtra;
    // }

    //Nombre extra 
    public function getNombreExtra()
    {
        return $this->nombreExtra;
    }
    public function setNombreExtra($nombreExtra)
    {
        $this->nombreExtra = $nombreExtra;
    }

    //Precio
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    //Id Categoria
    public function getIdCategoriaExtra()
    {
        return $this->idCategoriaExtra;
    }
    /*
    * Set id comentado 
    */
    // public function setIdCategoriaExtra($idCategoriaExtra)
    // {
    //     $this->idCategoriaExtra = $idCategoriaExtra;
    // }

    /*Método que te saca el nombre de la categoria relacionando el id de la cat. 
    * con la posicion de un array que guarda el nombre de cada cat.
    */
    public function getNombreCategoria(){
        require_once('data/categoriesExtraProduct.php');
        return $categories[$this->idCategoriaExtra];
    }

    //Método abstracto
}
