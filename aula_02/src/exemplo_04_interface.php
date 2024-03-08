<?php 

echo "<pre>";

use G1ll\Aula02\classes\Atleta;

$e = new \Exception("Erro asdfasdf ..");

$atl1 = new Atleta("Walter",36,1.83,81);

$atl1->showImc();

