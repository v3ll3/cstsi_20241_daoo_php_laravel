<?php 

echo "<pre>";

use G1ll\Aula02\classes\Atleta;
use G1ll\Aula02\classes\Medico;
use G1ll\Aula02\classes\logs\Relatorio;

$atl1 = new Atleta("Luizito",36,1.8,80);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

$relatorio = new Relatorio;

$relatorio->add($med1);
$relatorio->add($atl1);

$relatorio->imprime();

