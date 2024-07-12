<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola/{nome}',function($nome){
    // return view('olamundo_name',["fuleco"=>$nome]);
    return View::make('olamundo_name', ["fuleco"=>$nome]); //Usando o facade View
});

Route::get('ola',[HomeController::class,'index']);
// Route::get('ola','HomeController@index');


Route::get('/produtos',[ProdutoController::class,'index']);

