<?php

class Pessoa
{
	public $nome, $idade, $altura, $peso;
	private $imc;

	public function __construct($nome, $idade, $altura = null, $peso = null)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
	}

	public function __destruct()
	{
		echo "\n$this->nome foi destruido!";
	}

	public function calcImc()
	{
		if (
			is_numeric($this->altura)
			&& is_numeric($this->peso)
		) {
			$this->imc = $this->peso / $this->altura ** 2;
			echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
		} else {
			echo "\nIMC $this->nome: Erro, informe peso e altura\n";
		}
	}

	public function setAltura(float $altura){
		$this->altura = $altura;
	}

	public function setPeso(float $peso){
		$this->peso = $peso;
	}

	public function getImc():float {
		return $this->imc;
	}
}

$pessoaUm = new Pessoa("Joao", 35);
$pessoaDois = new Pessoa("Lucia", 60, 1.55, 89);

$pessoaUm->setAltura(1.7);
$pessoaUm->setPeso(85);
$pessoaUm->calcImc();
$pessoaDois->calcImc();

echo "\n get imc: ".$pessoaUm->getImc();
