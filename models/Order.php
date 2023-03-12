<?php
class Order
{
    protected $idPedido;
    protected $producto;
    protected $newExtras = array();
    protected $cantidad;
    protected $importeTotal;
    protected $fechaPedido;
    protected $idCliente;

    public function __construct($producto, $newExtras, $cantidad, /*$importeTotal, $fechaPedido,*/ $idCliente)
    {
        $this->producto = $producto;
        $this->newExtras = $newExtras;
        $this->cantidad = $cantidad;
        $this->importeTotal = null;
        $this->fechaPedido = date('d-m-Y H:i:s');
        $this->idCliente = $idCliente;
    }

    public function getIdPedido()
    {
        return $this->idPedido;
    }
    
    //Producto
    public function getProducto()
    {
        return $this->producto;
    }

    //Extras
    public function getNewExtras()
    {
        return $this->newExtras;
    }
    public function setNewExtras($newExtras)
    {
        $this->newExtras = $newExtras;
    }

    //Cantidad
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    //Importe Total 
    public function getImporteTotal()
    {
        return $this->importeTotal;
    }
    public function setImporteTotal($importeTotal)
    {
        $this->importeTotal = $importeTotal;
    }

    //Fecha del pedido
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }
    public function setFechaPedido($fechaPedido)
    {
        $this->fechaPedido = $fechaPedido;
    }

    //IdCliente
    public function getIdCliente()
    {
        return $this->idCliente;
    }
}
