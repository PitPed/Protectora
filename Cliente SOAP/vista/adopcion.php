<h1>Adopciones</h1>

<form action="" method="POST">
    <input type="hidden" name="estaAdoptado" value="estaAdoptado">
    <label for="id">¿Está adoptado el siguiente animal?:</label>
    <input type="number" name="id" id="">
    <input style="" class="btn-form" type="submit" value="Comprobar">
</form>
<?php
if (isset($estaAdoptado)) {
    echo $estaAdoptado ? 'Sí' : 'No';
}
?>
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
    <input style="" class="btn-form" type="submit" value="Crear">
</form>

<?php
$adopciones = $cliente->recuperarAdopciones();

if ($adopciones) {
    foreach ($adopciones as $adopcion) {
        echo '<form action="" method="post"><input type="hidden" name="action" value="actualizar">';
        echo '<label for="id">ID:</label>
    <input type="number" name="id" value="' . $adopcion->id . '" readonly>
    <label for="idAnimal">ID Animal:</label>
    <input type="number" name="idAnimal" value="' . $adopcion->idAnimal . '">
    <label for="idUsuario">ID Usuario:</label>
    <input type="number" name="idUsuario" value="' . $adopcion->idUsuario . '">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" value="' . $adopcion->fecha . '">
    <label for="razon">Razón:</label>
    <input type="text" name="razon" value="' . $adopcion->razon . '"> 
    <input class="btn-form" type="submit" value="Actualizar"> 
    <input class="btn-form" type="submit" name="action" value="Borrar">';

        echo '</form>';
    }
} else {
    echo "No hay adopciones registradas";
}

?>