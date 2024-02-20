<?php
include_once "../modelo/Animal.php";
include_once "../modelo/Adopcion.php";
include_once "../modelo/Usuario.php";

session_start();

//Creación de "dummies"
$animalDummy = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'Macho', 'Naranja', '27');

$usuarioDummy = new Usuario('77', 'Paco', 'Suárez', 'Masculino', 'Calle Grande 4', '987654321');

$adopcionDummy = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

function recuperarAdopciones()
{
    global $adopcionDummy;
    try {
        return $adopcionDummy->obtieneTodos();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function crearAdopcion($id, $idAnimal, $idUsuario, $fecha, $razon)
{
    $newAdop = new Adopcion($id, $idAnimal, $idUsuario, $fecha, $razon);
    try {
        return $newAdop->crear();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function actualizarAdopcion($id, $idAnimal, $idUsuario, $fecha, $razon)
{
    $newAdop = new Adopcion($id, $idAnimal, $idUsuario, $fecha, $razon);
    try {
        return $newAdop->actualizar();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function borrarAdopcion($id)
{
    global $adopcionDummy;
    try {
        return $adopcionDummy->borrar($id);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function recuperarAnimales()
{
    global $animalDummy;
    try {
        return $animalDummy->obtieneTodos();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function crearAnimal($id, $nombre, $especie, $raza, $genero, $color, $edad)
{
    $newAnim = new Animal($id, $nombre, $especie, $raza, $genero, $color, $edad);
    try {
        return $newAnim->crear();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function actualizarAnimal($id, $nombre, $especie, $raza, $genero, $color, $edad)
{
    $newAnim = new Animal($id, $nombre, $especie, $raza, $genero, $color, $edad);
    try {
        return $newAnim->actualizar();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function borrarAnimal($id)
{
    global $animalDummy;
    try {
        return $animalDummy->borrar($id);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}


function recuperarUsuarios()
{
    global $usuarioDummy;
    try {
        return $usuarioDummy->obtieneTodos();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
function crearUsuario($id, $nombre, $apellido, $sexo, $direccion, $telefono)
{
    $newUser = new Usuario($id, $nombre, $apellido, $sexo, $direccion, $telefono);
    try {
        return $newUser->crear();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function actualizarUsuario($id, $nombre, $apellido, $sexo, $direccion, $telefono)
{
    $newUser = new Usuario($id, $nombre, $apellido, $sexo, $direccion, $telefono);
    try {
        return $newUser->actualizar();
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function borrarUsuario($id)
{
    global $usuarioDummy;
    try {
        return $usuarioDummy->borrar($id);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function isAdoptado($id)
{
    global $adopcionDummy;
    try {
        return $adopcionDummy->isAdoptado($id);
    } catch (PDOException $e) {
        return "Error: Comprueba que los ID introducidos sean válidos.";
    }
}

/* echo isAdoptado(1829); */

$options = array('uri' => 'http://localhost/Protectora/controlador/SOAP.php');

$SOAPserver = new SoapServer(null, $options);


$SOAPserver = new SoapServer(null, $options);
$SOAPserver->addFunction('recuperarAdopciones');
$SOAPserver->addFunction('crearAdopcion');
$SOAPserver->addFunction('actualizarAdopcion');
$SOAPserver->addFunction('borrarAdopcion');
$SOAPserver->addFunction('recuperarAnimales');
$SOAPserver->addFunction('crearAnimal');
$SOAPserver->addFunction('actualizarAnimal');
$SOAPserver->addFunction('borrarAnimal');
$SOAPserver->addFunction('recuperarUsuarios');
$SOAPserver->addFunction('crearUsuario');
$SOAPserver->addFunction('actualizarUsuario');
$SOAPserver->addFunction('borrarUsuario');
$SOAPserver->addFunction('isAdoptado');
$SOAPserver->handle();
?>