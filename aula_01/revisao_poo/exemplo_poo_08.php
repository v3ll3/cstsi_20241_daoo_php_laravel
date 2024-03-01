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
		} else {
			echo "\nIMC $this->nome: Erro, informe peso e altura\n";
		}
	}

	public function showImc(){
		if(is_numeric($this->imc))
			echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
	}

	public function setAltura(float $altura){
		$this->altura = $altura;
		$this->calcImc();
	}

	public function setPeso(float $peso){
		$this->peso = $peso;
		$this->calcImc();
	}

	public function __get($name){
		return $this->$name;
	}

	public function __set($name, $value){
		if($name=='imc')
			if(is_array($value)){
				if($value[0]>$value[1])
					$this->imc = $value[0]/$value[1]**2;
				else echo "Erro, o primeiro item deve ser o peso.";
			}else{
				echo "Erro ao atualizar imc, esperado um array [peso, altura]";
			}
		else $this->$name = $value;
	}
}

$pessoaUm = new Pessoa("Joao", 35, 1.7,70);
$pessoaDois = new Pessoa("Lucia", 60, 1.55, 89);

$pessoaUm->calcImc();
$pessoaUm->showImc();

$pessoaUm->setPeso(75);
$pessoaUm->showImc();

$pessoaDois->calcImc();
$pessoaDois->showImc();

$pessoaDois->imc=[60,1.5];
$pessoaDois->showImc();





