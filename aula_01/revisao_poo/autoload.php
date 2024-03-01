<?php 
spl_autoload_register(function ($indetifier){
	var_dump($indetifier);
	require_once "classes/$indetifier.php";
});