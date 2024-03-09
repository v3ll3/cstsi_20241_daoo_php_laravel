<?php 
require "../vendor/autoload.php";
echo "<pre>";

use Daoo\Aula02\classes\Atleta;
use Daoo\Aula02\classes\logs\StaticRelatorio;

$atl1 = new Atleta("Luizito",36,1.8,80);

$atl1->showImc();
StaticRelatorio::log($atl1);