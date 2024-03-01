<?php
$conexao = new mysqli("localhost:3307", "root", "r00t", "aula");
$conexao->set_charset("utf8");
if (!$conexao) {
	die('Não foi possível conectar: ' . mysqli_error($conexao));
}
$sql="SELECT * FROM user";
$conexao->query($sql);
$resultado = $conexao->query($sql);
while($linha=$resultado->fetch_object()){
	echo "<pre>";
	var_dump($linha);
	echo "</pre>";
}