<?php
namespace G1ll\Aula02\classes;

class Pessoa
{
	public $nome, $idade, $altura, $peso;
	

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

	public function setAltura(float $altura){
		$this->altura = $altura;
	}

	public function setPeso(float $peso){
		$this->peso = $peso;
	}

	public function __get($name){
		return $this->$name;
	}

	public function __toString(): string{
		return "\n===Dados da Pessoa==="
		 			."\nNome: $this->nome"
					.($this->idade?"\nIdade: $this->idade":"")
					."\nPessoa: $this->peso"
					."\nAltura: $this->altura";
	}
}