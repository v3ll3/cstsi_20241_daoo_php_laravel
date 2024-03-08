<?php
namespace G1ll\Aula02\classes;
 
class Atleta extends Pessoa {

	private $imc;
	
	public function __construct($nome, $idade, $altura,$peso)
	{
		parent::__construct($nome, $idade, $altura,$peso);
		$this->calcImc();
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


	public function __toString():string{
		$saida = "\n===Dados do Atleta==="
               .parent::__toString();

		$saida .= (isset($this->imc))
				?"\nIMC: ".number_format($this->imc, 3)
				:"";
		return $saida;
	}
}