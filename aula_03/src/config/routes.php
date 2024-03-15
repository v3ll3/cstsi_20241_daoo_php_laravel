<?php

use Daoo\Aula03\controller\api\Produto;
use Daoo\Aula03\controller\web\Produto as WebProduto;

$routes = [
    'api' => [
        'produtos' => Produto::class
    ],
    // 'web' => [
    //     'produtos' => WebProduto::class
    // ]
];