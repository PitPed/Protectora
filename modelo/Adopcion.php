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

    public function crear()
    {
        try {
        
            $sql = "INSERT INTO adopcion (id, idAnimal, idUsuario, fecha, razon) VALUES (:id, :idAnimal, :idUsuario, :fecha, :razon)";
            $consulta = $this->conexion->prepare($sql);

            $consulta->bindParam(":id", $this->id);
            $consulta->bindParam(":idAnimal", $this->idAnimal);
            $consulta->bindParam(":idUsuario", $this->idUsuario);
            $consulta->bindParam(":fecha", $this->fecha);
            $consulta->bindParam(":razon", $this->razon);

            $consulta->execute();
        }
        catch (PDOException $e) {
            echo "Error: Comprueba que los ID introducidos sean válidos.";
        }
        
    }

    public function actualizar()
    {
        try {
            $sql = "UPDATE adopcion SET idAnimal = :idAnimal, idUsuario = :idUsuario, fecha = :fecha, razon = :razon WHERE id = :id";
            $consulta = $this->conexion->prepare($sql);

            $consulta->bindParam(":id", $this->id);
            $consulta->bindParam(":idAnimal", $this->idAnimal);
            $consulta->bindParam(":idUsuario", $this->idUsuario);
            $consulta->bindParam(":fecha", $this->fecha);
            $consulta->bindParam(":razon", $this->razon);

            $consulta->execute();
        }
        catch (PDOException $e) {
            echo "Error: Comprueba que los ID introducidos sean válidos.";
        }
    }
}

