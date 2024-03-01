<?php
spl_autoload_register(function ($class_name){
	echo "\nautoload_namespace:";
	var_dump($class_name);
	$path = implode('/',explode('\\',$class_name));
	require_once "$path.php";
});