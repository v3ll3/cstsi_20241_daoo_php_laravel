<?php 
include 'autoload_namespaces.php';

use classes\Paciente;

$pa1 = new Paciente("Luizito",36,1.8,80);

$pa1->calcImc();
$pa1->showImc();