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

    //Obteniendo la vista que está el usuario o quiere estar
//Si da algún botón se cambia la vista activa por esa
    if (isset($_POST["view"]))
        $_SESSION["activeView"] = $_POST["view"];
    //Si el usuario no da a ningún botón ni lo le había dado antes la vista activa es la default
    else if (!isset($_SESSION["activeView"])) {
        $_SESSION["activeView"] = DEFAULT_VIEW;
    }
    //En otro caso la vista activa es la que ya está almacenada en la sesión
    

    if (isset($_POST["action"])) {
        if ($_POST["action"] == "crear") {
            if ($_SESSION["activeView"] == "adopcion") {
                $newAdop = new Adopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
                $newAdop->crear();
            } elseif ($_SESSION["activeView"] == "animal") {

                $newAnim = new Animal($_POST['id'], $_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);
                $newAnim->crear();
            } elseif ($_SESSION["activeView"] == "usuario") {

                $newUser = new Usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
                $newUser->crear();
            }
        }

        if ($_POST["action"] == "actualizar") {
            if ($_SESSION["activeView"] == "adopcion") {

                $newAdop = new Adopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
                $newAdop->actualizar();
            } elseif ($_SESSION["activeView"] == "animal") {

                $newAnim = new Animal($_POST['id'], $_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);
                $newAnim->actualizar();
            } elseif ($_SESSION["activeView"] == "usuario") {

                $newUser = new Usuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
                $newUser->actualizar();
            }
        }

        if ($_POST["action"] == "Borrar") {
            if ($_SESSION["activeView"] == "adopcion") {
                $adopcionDummy->borrar($_POST['id']);
            } elseif ($_SESSION["activeView"] == "animal") {

                $animalDummy->borrar($_POST['id']);
            } elseif ($_SESSION["activeView"] == "usuario") {

                $usuarioDummy->borrar($_POST['id']);
            }
        }
    }

    if (isset($_POST['estaAdoptado'])) {
        $estaAdoptado = file_get_contents('http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '/controlador/REST.php?id=' . $_POST['id']);
    }

    include($views[$_SESSION["activeView"]]);
    ?>

</body>