<?php 
namespace G1ll\Aula02\classes\logs;

// use Gill\Aula02\classes\Abstracts\Pessoa;
// use Gill\Aula02\classes\{Medico, Atleta};

class Relatorio{

	private $pessoas = [];

	public function add($pessoa):void
	{
		$this->pessoas[]=$pessoa;
		var_dump($this->pessoas);
	}
	
	public function log($pessoa):void
	{
		echo "\nlog: ".$pessoa;
	}

	public function imprime(): void{
		echo "\n### RELATORIO ###\n";
		foreach ($this->pessoas as $pessoa) 
			$this->log($pessoa);
		echo "\n#############\n";
	}
}