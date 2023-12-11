<?php
include_once 'Crud.php';

class Usuario extends Crud
{
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;

    function __construct($id, $nombre, $apellido, $sexo, $direccion, $telefono)
    {
        parent::__construct('usuarios', 'id');
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    protected function crear()
    {
        $sql = "INSERT INTO usuario (id, nombre, apellido, sexo, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?, )";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->id);
        $consulta->bindParam(2, $this->nombre);
        $consulta->bindParam(3, $this->apellido);
        $consulta->bindParam(4, $this->sexo);
        $consulta->bindParam(5, $this->direccion);
        $consulta->bindParam(6, $this->telefono);

        $consulta->execute();
    }

    protected function actualizar()
    {
        $sql = "UPDATE usuario SET nombre = ?, apellido = ?, sexo = ?, direccion = ?, telefono = ? WHERE id = ?";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->nombre);
        $consulta->bindParam(2, $this->especie);
        $consulta->bindParam(3, $this->raza);
        $consulta->bindParam(4, $this->genero);
        $consulta->bindParam(5, $this->color);
        $consulta->bindParam(7, $this->id);

        $consulta->execute();
    }
}

