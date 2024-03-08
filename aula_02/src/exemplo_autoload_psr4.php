<?php 
require "../vendor/autoload.php";
echo "<pre>";

use G1ll\Aula02\classes\Atleta;
use G1ll\Aula02\classes\logs\Relatorio;

$atl1 = new Atleta("Luizito",36,1.8,80);

$atl1->showImc();
Relatorio::log($atl1);