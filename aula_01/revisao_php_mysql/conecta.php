<?php
$conexao = mysqli_connect(
    'localhost:3307',
    'root',
    'r00t',
    'aula');
if (!$conexao) {
    die('Não foi possível conectar: ' . mysql_error());
}
echo 'Conexão bem sucedida';
// mysqli_close($conexao);