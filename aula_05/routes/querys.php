<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Regiao, Estado, Fornecedor, Produto, Promocao, User};


Route::prefix('query')->group(function () {

    //Carraga o produto com a sua regiao
    Route::get('produto-regiao/{id}', function ($id) {

        $result = Produto::find($id)->load('regiao');
        return response()->json($result);

    });

    //Carraga o produto com o seu fornecedor
    Route::get('produto-fornecedor/{id}', function($id){
        $result = Produto::find($id)->load('fornecedor');
        return response()->json($result);
    });

});

//query/produto-regiao/{id}
