<?php

class Pessoa
{
	public $nome, $idade, $altura, $peso;
	private $imc;
	protected $salario;

	function __construct(
		$nome, 
		$idade, 
		$altura = null, 
		$peso = null,$salario=0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->salario = $salario;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruido!";
	}

	function calcImc()
	{
		if (
			is_numeric($this->altura)
			&& is_numeric($this->peso)
		) {
			$this->imc = $this->peso / $this->altura ** 2;
			echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
		} else {
			echo "\nIMC $this->nome: Erro, informe peso e altura corretamente.\n";
		}
	}
}

class Professor extends Pessoa {
	public $area;
	function verSalario(){
		echo "\nSalario: ".$this->salario."\n";
	}
}

$pessoaUm = new Pessoa("Joao", 35);
$pessoaDois = new Pessoa("Lucia", 60, 1.55, 89);

$pessoaUm->calcImc();
$pessoaDois->calcImc();
// $pessoaDois->imc;
// $pessoaDois->salario;

// $pessoaDois = null;

$pessoaTres = new Professor('Gill',35,1.55, 89,5000);
$pessoaTres->verSalario();

var_dump($pessoaUm,$pessoaDois,$pessoaTres);
