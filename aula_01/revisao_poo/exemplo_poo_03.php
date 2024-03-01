<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;

	function __construct($nome, $idade, $altura=null, $peso=null)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
	}
}

$pessoaUm = new Pessoa("Joao",35);
$pessoaDois = new Pessoa("Lucia",60,1.55,89);

var_dump($pessoaUm, $pessoaDois);