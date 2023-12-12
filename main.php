<?php
include_once "Animal.php";
include_once "Adopcion.php";
include_once "Usuario.php";

$garfield = new Animal('33', 'Garfield', 'Gato', 'Gato Naranja', 'Macho', 'Naranja', '27');

$paco = new Usuario('77', 'Paco', 'Suárez', 'Masculino', 'Calle Grande 4', '987654321');

$adop = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

//Se generan
print_r($garfield->crear());
print_r($paco->crear());
print_r($adop->crear());

//Se obtienen todos
print_r($garfield->obtieneTodos());
print_r($paco->obtieneTodos());
print_r($adop->obtieneTodos());

//Se obtienen por id
print_r($garfield->obtieneDeID($garfield->id));
print_r($paco->obtieneDeID($paco->id));
print_r($adop->obtieneDeID($adop->id));

//Se modifican
$garfield->raza = "Anaranjado";
$paco->sexo = "Femenino";
$adop->razon = "Se setía sola";

print_r($garfield->actualizar());
print_r($paco->actualizar());
print_r($adop->actualizar());


//Se eliminan
print_r($garfield->borrar($garfield->id));
print_r($paco->borrar($paco->id));
print_r($adop->borrar($adop->id));


?>