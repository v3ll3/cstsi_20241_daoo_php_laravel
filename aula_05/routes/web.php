<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola',function(){
    return view('olamundo');
});


Route::get('/ola/{nome}',function($nome){
    return view('olamundo_name',["fuleco"=>$nome]);
});
