<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        //return response()->json(Produto::all());
        return view('produto.index',[
            "produtos"=>Produto::all()
        ]);
    }

    public function show($id){
        //return response()->json(Produto::all());
        return view('produto.show',[
            "produto"=>Produto::find($id)
        ]);
    }
}
