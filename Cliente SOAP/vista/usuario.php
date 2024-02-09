<h1>Usuarios</h1>

<!-- Formulario de nueva adopción -->
<form action="" method="POST">
    <input type="hidden" name="action" value="crear">
    <label for="id">ID:</label>
    <input type="number" name="id">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido">
    <label for="sexo">Sexo:</label>
    <input type="text" name="sexo">
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion">
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono">
    <input class="btn-form" type="submit" value="Crear">
</form>

<?php
$usuarios = $cliente->recuperarUsuarios();

if ($usuarios) {
    foreach ($usuarios as $user) {
        echo '<form action="" method="post"><input type="hidden" name="action" value="actualizar">';
        echo '<label for="id">ID:</label>
    <input type="number" name="id" value="' . $user->id . '" readonly>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="' . $user->nombre . '">
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="' . $user->apellido . '">
    <label for="sexo">Sexo:</label>
    <input type="text" name="sexo" value="' . $user->sexo . '">
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" value="' . $user->direccion . '"> 
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="' . $user->telefono . '"> 
    <input class="btn-form" type="submit" value="Actualizar"> 
    <input class="btn-form" type="submit" name="action" value="Borrar">';

        echo '</form>';
    }
} else {
    echo "No hay usuarios registrados";
}

?>