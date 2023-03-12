<?php
class Review
{
    protected $idValoracion;
    protected $valoracion;
    protected $titulo;
    protected $descripcion;
    protected $fechaAltaValoracion;
    protected $idPedido;
    protected $idUsuario;

    public function __construct()
    {
    }

    public function getIdValoracion()
    {
        return $this->idValoracion;
    }
    
}
