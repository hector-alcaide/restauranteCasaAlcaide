<?php
class Product
{
    protected $idProducto;
    protected $nombre;
    protected $definicion;
    protected $precio;
    protected $activo;
    protected $idCategoria;
    
    public function __construct()
    {
    }

    //Id 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    //Nombre 
    public function getNombre()
    {
        return $this->nombre;
    }

    //Definicion
    public function getDefinicion()
    {
        return $this->definicion;
    }

    //Precio
    public function getPrecio()
    {
        return $this->precio;
    }

    //Id categoria del producto
    public function getIdCategoriaProducto()
    {
        return $this->idCategoria;
    }

    //Método que te devuelve el objeto completo en un json
    // public function toJson(){
    //     $productJson = array(
    //         'idProducto' => $this->idProducto,
    //         'nombre' => $this->nombre,
    //         'definicion' => $this->definicion,
    //         'precio' => $this->precio,
    //         'imagen' => $this->imagen,
    //         'idCategoriaProducto' => $this->idCategoriaProducto,
    //     );
    //     return json_encode($productJson);
    // }

    //Metodo parche json, devuelve string con los datos del producto para trabajarlo
    public function __toString()
    {
        $productString = 
        $this->idProducto . ';' .
        $this->nombre . ';' .
        $this->definicion . ';' .
        $this->precio . ';' .
        $this->idCategoria;

        return $productString;
    }
}
