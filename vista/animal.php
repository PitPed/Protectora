<h1>Animales</h1>

<!-- Formulario de nueva adopción -->
<form action="" method="POST">
    <input type="hidden" name="action" value="crear">
    <label for="id">ID:</label>
    <input type="number" name="id">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="especie">Especie:</label>
    <input type="text" name="especie">
    <label for="raza">Raza:</label>
    <input type="text" name="raza">
    <label for="genero">Genero:</label>
    <input type="text" name="genero">
    <label for="color">Color:</label>
    <input type="text" name="color">
    <label for="edad">Edad:</label>
    <input type="number" name="edad">
    <input style="" class="btn-form" type="submit" value="Crear">
</form>

<?php
//Creo una adopción "dummy" para poder ver todas las adopciones
$animalDummy = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'Macho', 'Naranja', '27');

$animales = $animalDummy->obtieneTodos();

foreach ($animales as $animal) {
    echo '<form action="" method="post"><input type="hidden" name="action" value="actualizar">';
    echo '<label for="id">ID:</label>
    <input type="number" name="id" value="' . $animal->id . '" readonly>
    <label for="Nombre">Nombre:</label>
    <input type="text" name="nombre" value="' . $animal->nombre . '">
    <label for="especie">Especie:</label>
    <input type="text" name="especie" value="' . $animal->especie . '">
    <label for="raza">Raza:</label>
    <input type="text" name="raza" value="' . $animal->raza . '">
    <label for="genero">Género:</label>
    <input type="text" name="genero" value="' . $animal->genero . '"> 
    <label for="color">Color:</label>
    <input type="text" name="color" value="' . $animal->color . '"> 
    <label for="edad">Edad:</label>
    <input type="number" name="edad" value="' . $animal->edad . '"> 
    <input class="btn-form" type="submit" value="Actualizar"> 
    <input class="btn-form" type="submit" name="action" value="Borrar">';

    echo '</form>';
}

?>
