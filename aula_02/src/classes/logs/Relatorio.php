<?php 
namespace Daoo\Aula02\classes\logs;

use Daoo\Aula02\classes\Abstracts\Pessoa;

class Relatorio{

	private $pessoas = [];

	public function add(Pessoa $pessoa):void
	{
		$this->pessoas[]=$pessoa;
	}
	
	public function log(Pessoa $pessoa):void
	{
		echo "\n\nlog: \n".$pessoa;
	}

	public function imprime(): void{
		echo "\n### RELATORIO ###\n";
		foreach ($this->pessoas as $pessoa) 
			$this->log($pessoa);
		echo "\n#############\n";
	}
}