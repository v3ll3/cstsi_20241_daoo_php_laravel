<?php 

echo "<pre>";

use G1ll\Aula02\classes\Atleta;
use G1ll\Aula02\classes\Medico;
use G1ll\Aula02\classes\Abstracts\Pessoa as PessoaAbstrata;
use G1ll\Aula02\classes\Pessoa;
use G1ll\Aula02\classes\logs\Relatorio;

$atl1 = new Atleta("Luizito",36,1.8,80);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

echo "\nAtleta ".((!$atl1 instanceof PessoaAbstrata)?"não":"")." eh PessoaAbstrata";
echo "\nMédico ".((!$med1 instanceof Pessoa)?"não":"")." eh Pessoa";

$relatorio = new Relatorio;

$relatorio->add($atl1);//Relatório recebe qualquer objeto que herde PessoaAbstrata
$relatorio->add($med1);
$relatorio->imprime();

