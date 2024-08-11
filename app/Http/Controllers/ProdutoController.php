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

    public function store(Request $request){

        $dados = $request->all();
        $dados['importado'] = $request->has('importado');

        if(Produto::create($dados)){
            return redirect('/produtos');
        }else dd("Erro!!!");
    }

    public function create(){
        return view('produto.create');
    }

    public function update(Request $request, $id){

        $dados = $request->all();
        $dados['importado'] = $request->has('importado');

        if(!Produto::find($id)->update($dados))
            dd("Erro!!!");

        return redirect('/produtos');
    }

    public function edit($id){
        return view('produto.edit',[
            "produto"=>Produto::find($id)
        ]);
    }

}
