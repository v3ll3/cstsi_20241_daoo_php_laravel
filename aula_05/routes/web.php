<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola/{nome}',function($nome){
    return view('olamundo_name',["fuleco"=>$nome]);
});

Route::get('ola',[HomeController::class,'index']);
