<?php
namespace G1ll\Aula02\classes;

abstract class Pessoa
{
	public $nome, $idade;

	public abstract function __toString(): string;

	public function __destruct()
	{
		echo "\n$this->nome foi destruido!";
	}

	public function __get($name){
		return $this->$name;
	}
}