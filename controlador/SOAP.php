<link rel="stylesheet" href="vista/style.css">
<title>Protectora Animales</title>

<body>
    <?php

    include_once "modelo/Animal.php";
    include_once "modelo/Adopcion.php";
    include_once "modelo/Usuario.php";

    session_start();

    //Creación de "dummies"
    $animalDummy = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'Macho', 'Naranja', '27');

    $usuarioDummy = new Usuario('77', 'Paco', 'Suárez', 'Masculino', 'Calle Grande 4', '987654321');

    $adopcionDummy = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

    function recuperarAdopciones()
    {
        global $adopcionDummy;
        return $adopcionDummy->obtieneTodos();
    }

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

    function recuperarAnimales()
    {
        global $animalDummy;
        return $animalDummy->obtieneTodos();
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


    function recuperarUsuarios()
    {
        global $usuarioDummy;
        return $usuarioDummy->obtieneTodos();
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

    $options = array('uri' => 'http://localhost/Servidor/Servicios/SOAP/Servidor.php');


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
    $SOAPserver->handle();

    ?>

</body>