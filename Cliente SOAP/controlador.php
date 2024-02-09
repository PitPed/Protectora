<link rel="stylesheet" href="vista/style.css">
<title>Protectora Animales</title>

<body>
    <?php
    $options = array('uri' => 'http://localhost/Protectora/controlador/', 'location' => 'http://localhost/Protectora/controlador/SOAP.php');
    $cliente = new SoapClient(null, $options);

    session_start();

    include("../vista/menu.php");

    const DEFAULT_VIEW = "usuario";

    $views = array("usuario" => "vista/usuario.php", "animal" => "vista/animal.php", "adopcion" => "vista/adopcion.php");


    //Obteniendo la vista que está el usuario o quiere estar
    //Si da algún botón se cambia la vista activa por esa
    if (isset($_POST["view"]))
        $_SESSION["activeView"] = $_POST["view"];
    //Si el usuario no da a ningún botón ni lo le había dado antes la vista activa es la default
    else if (!isset($_SESSION["activeView"])) {
        $_SESSION["activeView"] = DEFAULT_VIEW;
    }
    //En otro caso la vista activa es la que ya está almacenada en la sesión
    function handleRequest()
    {
        global $cliente;
        if ($_POST["action"] == "crear") {
            if ($_SESSION["activeView"] == "adopcion") {
                return $cliente->crearAdopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
            } elseif ($_SESSION["activeView"] == "animal") {
                return $cliente->crearAnimal($_POST['id'], $_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);
            } elseif ($_SESSION["activeView"] == "usuario") {
                return $cliente->crearUsuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
            }
        }

        if ($_POST["action"] == "actualizar") {
            if ($_SESSION["activeView"] == "adopcion") {
                return $cliente->actualizarAdopcion($_POST['id'], $_POST['idAnimal'], $_POST['idUsuario'], $_POST['fecha'], $_POST['razon']);
            } elseif ($_SESSION["activeView"] == "animal") {
                return $cliente->actualizarAnimal($_POST['id'], $_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['genero'], $_POST['color'], $_POST['edad']);
            } elseif ($_SESSION["activeView"] == "usuario") {
                return $cliente->actualizarUsuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['direccion'], $_POST['telefono']);
            }
        }

        if ($_POST["action"] == "Borrar") {
            if ($_SESSION["activeView"] == "adopcion") {
                return $cliente->borrarAdopcion($_POST['id']);
            } elseif ($_SESSION["activeView"] == "animal") {
                return $cliente->borrarAnimal($_POST['id']);
            } elseif ($_SESSION["activeView"] == "usuario") {
                return $cliente->borrarUsuario($_POST['id']);
            }
        }
    }

    function estaAdoptado()
    {
        global $cliente;
        return $cliente->isAdoptado($_POST['id']);
    }

    if (isset($_POST['estaAdoptado'])) {
        $response = estaAdoptado();
        $estaAdoptado = $response;
    }

    if (isset($_POST["action"])) {
        $response = handleRequest();
        echo $response;
    }

    include($views[$_SESSION["activeView"]]);
    ?>

</body>