<?php
include_once 'Crud.php';

class Adopcion extends Crud
{
    private $id;
    private $idAnimal;
    private $idUsuario;
    private $fecha;
    private $razon;

    function __construct($id, $idAnimal, $idUsuario, $fecha, $razon)
    {
        parent::__construct('adopcion', 'id');
        $this->id = $id;
        $this->idAnimal = $idAnimal;
        $this->idUsuario = $idUsuario;
        $this->fecha = $fecha;
        $this->razon = $razon;
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
        $sql = "INSERT INTO adopcion (id, idAnimal, idUsuario, fecha, razon) VALUES (?, ?, ?, ?, ?)";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->id);
        $consulta->bindParam(2, $this->idAnimal);
        $consulta->bindParam(3, $this->idUsuario);
        $consulta->bindParam(4, $this->fecha);
        $consulta->bindParam(5, $this->razon);

        $consulta->execute();
    }

    protected function actualizar()
    {
        $sql = "UPDATE adopcion SET idAnimal = ?, idUsuario = ?, fecha = ?, razon = ? WHERE id = ?";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->idAnimal);
        $consulta->bindParam(2, $this->idUsuario);
        $consulta->bindParam(3, $this->fecha);
        $consulta->bindParam(4, $this->razon);
        $consulta->bindParam(5, $this->id);

        $consulta->execute();
    }
}

