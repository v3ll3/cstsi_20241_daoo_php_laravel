<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    echo phpinfo();
});

Route::get('/ola/{nome}',function($nome){
    // return view('olamundo_name',["fuleco"=>$nome]);
    return View::make('olamundo_name', ["fuleco"=>$nome]); //Usando o facade View
});

Route::get('ola',[HomeController::class,'index']);
// Route::get('ola','HomeController@index');

Route::get('/produtos',[ProdutoController::class,'index']);

Route::get('/produto/{id}',[ProdutoController::class,'show']);

Route::get('/produto',[ProdutoController::class,'create']);
Route::post('/produto',[ProdutoController::class,'store']);

Route::get('/produto/{id}/edit',[ProdutoController::class,'edit'])->name('produto.edit');
Route::post('/produto/{id}/edit',[ProdutoController::class,'update'])->name('produto.update');;

include_once __DIR__."/queries.php";
