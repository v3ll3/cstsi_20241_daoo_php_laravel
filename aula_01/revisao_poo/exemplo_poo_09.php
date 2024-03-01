<?php 
include 'classes/Pessoa.php';
include 'classes/Paciente.php';

$pa1 = new Paciente("Luizito",36,1.8,80);

$pa1->calcImc();
$pa1->showImc();

$pa1->setPeso(75);
$pa1->showImc();