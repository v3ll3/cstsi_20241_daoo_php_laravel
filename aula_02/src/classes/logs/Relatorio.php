<?php 
namespace G1ll\Aula02\classes\logs;

//	"----src/---/classes/Atleta.php
use G1ll\Aula02\classes\Atleta as AtletaData;

class Relatorio {
	public static function log(AtletaData $atleta){
		echo "\nLog:\n".$atleta;
	}
}