<?php

use Daoo\Aula03\controller\api\{Produto, Desconto};
use Daoo\Aula03\controller\web\Produto as WebProduto;

$routes = [
    'api' => [
        'produtos' => Produto::class,
        'descontos'=> Desconto::class,
        // 'fornecedores'=>Fonecedor::class,
    ],
    // 'web' => [
    //     'produtos' => WebProduto::class
    // ]
];