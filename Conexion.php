<?php

class Conexion
{
    private $DB_SERVER = "localhost";
    private $DB_PORT = "3333";
    private $DB_NAME = "pufosa";
    private $DB_USER = "root";
    private $DB_PASSWORD = "";
    private $DB_DSN;
    private PDO $conexion;

    public function __construct($DB_SERVER, $DB_PORT, $DB_NAME, $DB_USER, $DB_PASSWORD)
    {
        $this->DB_SERVER = $DB_SERVER;
        $this->DB_PORT = $DB_PORT;
        $this->DB_NAME = $DB_NAME;
        $this->DB_USER = $DB_USER;
        $this->DB_PASSWORD = $DB_PASSWORD;
        $this->DB_DSN = "mysql://mysql:host=" . $this->DB_SERVER . ";port=" . $this->DB_PORT . ";dbname=" . $this->DB_NAME . ";charset=utf8mb4";
        $this->conexion = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
    }

    public function getConnection(): PDO
    {
        return $this->conexion;
    }
}
?>