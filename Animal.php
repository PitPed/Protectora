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

    protected function crear()
    {
        $sql = "INSERT INTO animal (id, nombre, especie, raza, genero, color, edad) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->id);
        $consulta->bindParam(2, $this->nombre);
        $consulta->bindParam(3, $this->especie);
        $consulta->bindParam(4, $this->raza);
        $consulta->bindParam(5, $this->genero);
        $consulta->bindParam(6, $this->color);
        $consulta->bindParam(7, $this->edad);

        $consulta->execute();
    }

    protected function actualizar()
    {
        $sql = "UPDATE animal SET nombre = ?, especie = ?, raza = ?, genero = ?, color = ?, edad = ? WHERE id = ?";
        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(1, $this->nombre);
        $consulta->bindParam(2, $this->especie);
        $consulta->bindParam(3, $this->raza);
        $consulta->bindParam(4, $this->genero);
        $consulta->bindParam(5, $this->color);
        $consulta->bindParam(6, $this->edad);
        $consulta->bindParam(7, $this->id);

        $consulta->execute();
    }
}

?>