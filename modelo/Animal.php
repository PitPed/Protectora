<?php
include_once "Crud.php";
class Animal extends Crud
{
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $genero;
    private $color;
    private $edad;


    function __construct($id, $nombre, $especie, $raza, $genero, $color, $edad)
    {
        parent::__construct('animal', 'id');
        $this->id = $id;
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->genero = $genero;
        $this->color = $color;
        $this->edad = $edad;
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
        $sql = "INSERT INTO animal (id, nombre, especie, raza, genero, color, edad) VALUES (:id, :nombre, :especie, :raza, :genero, :color, :edad)";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":id", $this->id);
        $consulta->bindParam(":nombre", $this->nombre);
        $consulta->bindParam(":especie", $this->especie);
        $consulta->bindParam(":raza", $this->raza);
        $consulta->bindParam(":genero", $this->genero);
        $consulta->bindParam(":color", $this->color);
        $consulta->bindParam(":edad", $this->edad);

        $consulta->execute();
    }

    public function actualizar()
    {
        $sql = "UPDATE animal SET nombre = :nombre, especie = :especie, raza = :raza, genero = :genero, color = :color, edad = :edad WHERE id = :id";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":id", $this->id);
        $consulta->bindParam(":nombre", $this->nombre);
        $consulta->bindParam(":especie", $this->especie);
        $consulta->bindParam(":raza", $this->raza);
        $consulta->bindParam(":genero", $this->genero);
        $consulta->bindParam(":color", $this->color);
        $consulta->bindParam(":edad", $this->edad);

        $consulta->execute();
    }
}

?>