<h1>Adopción</h1>
<!-- Formulario de nueva adopción -->
<form action="" method="POST">
    <input type="hidden" name="action" value="crear">
    <label for="id">ID:</label>
    <input type="number" name="id">
    <label for="idAnimal">ID Animal:</label>
    <input type="number" name="idAnimal">
    <label for="idUsuario">ID Usuario:</label>
    <input type="number" name="idUsuario">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha">
    <label for="razon">Razón:</label>
    <input type="text" name="razon">
    <input type="submit" value="Crear">
</form>

<?php
//Creo una adopción "dummy" para poder ver todas las adopciones
$adop = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

$adopciones = $adop->obtieneTodos();

foreach ($adopciones as $adopcion) {
    echo '<form action="" method="post"><input type="hidden" name="action" value="actualizar">';
    echo '<label for="id">ID:</label>
    <input type="number" name="id" value="' . $adopcion->id . '">
    <label for="idAnimal">ID Animal:</label>
    <input type="number" name="idAnimal" value="' . $adopcion->idAnimal . '">
    <label for="idUsuario">ID Usuario:</label>
    <input type="number" name="idUsuario" value="' . $adopcion->idUsuario . '">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" value="' . $adopcion->fecha . '">
    <label for="razon">Razón:</label>
    <input type="text" name="razon" value="' . $adopcion->razon . '"> 
    <input type="submit" value="Actualizar"> 
    <input type="submit" name="action" value="Borrar">';

    echo '</form>';
}

?>