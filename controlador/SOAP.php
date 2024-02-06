<link rel="stylesheet" href="vista/style.css">
<title>Protectora Animales</title>

<body>
    <?php

    include_once "modelo/Animal.php";
    include_once "modelo/Adopcion.php";
    include_once "modelo/Usuario.php";

    session_start();



    include("vista/menu.php");

    const DEFAULT_VIEW = "usuario";

    $views = array("usuario" => "vista/usuario.php", "animal" => "vista/animal.php", "adopcion" => "vista/adopcion.php");

    //Creación de "dummies"
    $animalDummy = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'Macho', 'Naranja', '27');

    $usuarioDummy = new Usuario('77', 'Paco', 'Suárez', 'Masculino', 'Calle Grande 4', '987654321');

    $adopcionDummy = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

    function crearAdopcion($id, $idAnimal, $idUsuario, $fecha, $razon)
    {
        $newAdop = new Adopcion($id, $idAnimal, $idUsuario, $fecha, $razon);
        return $newAdop->crear();
    }

    function actualizarAdopcion($id, $idAnimal, $idUsuario, $fecha, $razon)
    {
        $newAdop = new Adopcion($id, $idAnimal, $idUsuario, $fecha, $razon);
        return $newAdop->actualizar();
    }

    function borrarAdopcion($id)
    {
        global $adopcionDummy;
        return $adopcionDummy->borrar($id);
    }

    function crearAnimal($id, $nombre, $especie, $raza, $genero, $color, $edad)
    {
        $newAnim = new Animal($id, $nombre, $especie, $raza, $genero, $color, $edad);
        return $newAnim->crear();
    }

    function actualizarAnimal($id, $nombre, $especie, $raza, $genero, $color, $edad)
    {
        $newAnim = new Animal($id, $nombre, $especie, $raza, $genero, $color, $edad);
        return $newAnim->actualizar();
    }

    function borrarAnimal($id)
    {
        global $animalDummy;
        return $animalDummy->borrar($id);
    }

    function crearUsuario($id, $nombre, $apellido, $sexo, $direccion, $telefono)
    {
        $newUser = new Usuario($id, $nombre, $apellido, $sexo, $direccion, $telefono);
        return $newUser->crear();
    }

    function actualizarUsuario($id, $nombre, $apellido, $sexo, $direccion, $telefono)
    {
        $newUser = new Usuario($id, $nombre, $apellido, $sexo, $direccion, $telefono);
        return $newUser->crear();
    }

    function borrarUsuario($id)
    {
        global $usuarioDummy;
        return $usuarioDummy->borrar($id);
    }
    ?>

</body>