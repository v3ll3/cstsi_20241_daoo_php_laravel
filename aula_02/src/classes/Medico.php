<?php
namespace G1ll\Aula02\classes;

use G1ll\Aula02\classes\Abstracts\Pessoa;
// use G1ll\Aula02\classes\Pessoa;
class Medico extends Pessoa {

	private $CRM, $especialidade;

	public function __construct($nome, $crm,$especialidade,$idade=null)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
	}

	public function getCRM(){
		return $this->CRM;
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n\n===Dados de $className ==="
			. "\nNome: $this->nome"
			. ($this->idade ? "\nIdade: $this->idade" : "")
			. "\nEspecialidade: $this->especialidade"
			. "\nCRM: $this->CRM\n";
	}
}