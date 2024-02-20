<?php
include_once "../modelo/Adopcion.php";
$adopcionDummy = new Adopcion(50, 33, 77, "2000-01-01", "Se sentía solo");

echo $adopcionDummy->isAdoptado($_REQUEST['id']);

?>