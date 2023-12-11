<?php
include_once "Animal.php";
include_once "Adopcion.php";
include_once "Usuario.php";

$garfield = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'NA', 'Naranja', '27');

$paco = new Usuario('77', 'Paco', 'Suárez', 'M', 'Calle Grande 4', '987654321');

//print_r($garfield->obtieneTodos());

//print_r($paco->obtieneTodos());

print_r($paco->obtieneDeID(2));
?>