<?php 

echo "<pre>";

use G1ll\Aula02\classes\Jogador;
use G1ll\Aula02\classes\Medico;
use G1ll\Aula02\classes\logs\Relatorio;

$atl1 = new Jogador("Pedro Geromel",36,1.83,75);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

$relatorio = new Relatorio;

$relatorio->add($med1);
$relatorio->add($atl1);

$relatorio->imprime();

