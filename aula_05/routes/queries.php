<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Regiao, Estado, Fornecedor, Produto, Promocao, User};


Route::prefix('queries')->group(function () {

    //Carraga o produto com a sua regiao
    Route::get('produto-regiao/{id}', function ($id) {

        $result = Produto::find($id)->load('regiao');

        dump($result->toArray());
        // return response()->json($result);

    });

    //Carraga o produto com o seu fornecedor
    Route::get('produto-fornecedor/{id}', function($id){

        $result = Produto::find($id)->load('fornecedor');

        dump($result->toArray());
        // return response()->json($result);
    });

    Route::get('fornecedor/{id}/produtos/',function($id){

        $result = Fornecedor::find($id)->load('produtos');

        dump($result->toArray());
    });

});

//query/produto-regiao/{id}
