<?php
class User
{
    protected $idUsuario;
    protected $rol;
    protected $nombre;
    protected $apellidos;
    protected $direccion;
    protected $telefono;
    protected $email;
    protected $contrasena;


    public function __construct()
    {
    }

    //Id 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    //Usuario
    public function getUsuario()
    {
        // return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        // $this->usuario = $usuario;
    }

    //Email
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    //Contrasena
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    //Nombre 
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    //Apellidos
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    //Telefono
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    //Direccion
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
