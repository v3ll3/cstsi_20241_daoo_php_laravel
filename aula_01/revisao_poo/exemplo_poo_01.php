<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;
}

$obj = new Pessoa;
$obj->nome = "Gill";
$obj->idade = 34;

var_dump($obj);