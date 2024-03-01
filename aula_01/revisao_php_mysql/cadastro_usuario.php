<?php 
error_reporting(1);
ini_set("display_error","on");
include 'conecta.php';
if($_POST){
	echo "<pre>
	\nvar_dump:
	\nPOST:";
	var_dump($_POST);
	echo "\nprint_r\n:";
	print_r($_POST);
	echo "</pre>";
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];

	if($conexao){
		$sql="insert into user(nome,email,cpf)
		 	values ('$nome','$email','$cpf')";
		
		$resultado=mysqli_query($conexao,$sql);
		if($resultado){
			 echo "Cadastro Efetuado com sucesso";
		}else{
			echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
		}
	}	
}

if($_GET){
	echo "<pre>GET:";
	var_dump($_GET);
	echo "</pre>";
}

