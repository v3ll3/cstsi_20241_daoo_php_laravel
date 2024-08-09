<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Regiao, Estado, Fornecedor, Produto, Promocao, User};
use Barryvdh\Debugbar\Facades\Debugbar;

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

        Debugbar::startMeasure('sql','Time to run query!!!');
        $result = Fornecedor::find($id)->load('produtos');
        Debugbar::stopMeasure('sql');

        dump($result->toArray());

        Debugbar::info($result->produtos->count());
        Debugbar::error('Média de preços: '.$result->produtos->avg('preco'));
        Debugbar::warning('Preço máximo: '.$result->produtos->max('preco'));

        try{
            Produto::findOrfail(10000);
        }catch(\Exception $e){
            Debugbar::error('Model não encontrada!!!');
            Debugbar::addThrowable($e);//aparece na aba de bugs
        }

    });



});

//query/produto-regiao/{id}
