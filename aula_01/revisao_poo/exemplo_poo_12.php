<?php 
include 'autoload_namespaces.php';

use classes\Paciente as IMC;

// use classes\Model\Paciente as PacienteModeJl;
// use classes\View\Paciente as PacienteView;


$pa1 = new IMC("Luizito",36,1.8,80);

$pa1->calcImc();
$pa1->showImc();