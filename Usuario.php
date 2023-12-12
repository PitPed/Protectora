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

    public function crear()
    {
        $sql = "INSERT INTO usuarios(id, nombre, apellido, sexo, direccion, telefono) VALUES( :id , :nombre , :apellido, :sexo, :direccion, :telefono)";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":id", $this->id);
        $consulta->bindParam(":nombre", $this->nombre);
        $consulta->bindParam(":apellido", $this->apellido);
        $consulta->bindParam(":sexo", $this->sexo);
        $consulta->bindParam(":direccion", $this->direccion);
        $consulta->bindParam(":telefono", $this->telefono);

        $consulta->execute();
    }

    public function actualizar()
    {
        $sql = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, sexo = :sexo, direccion = :direccion, telefono = :telefono WHERE id = :id";
        $consulta = $this->conexion->prepare($sql);
        $consulta->bindParam(":id", $this->id);
        $consulta->bindParam(":nombre", $this->nombre);
        $consulta->bindParam(":apellido", $this->apellido);
        $consulta->bindParam(":sexo", $this->sexo);
        $consulta->bindParam(":direccion", $this->direccion);
        $consulta->bindParam(":telefono", $this->telefono);


        $consulta->execute();
    }
}

