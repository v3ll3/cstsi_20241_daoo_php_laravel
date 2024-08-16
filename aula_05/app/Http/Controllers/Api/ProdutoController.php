<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $statusHttp = 201;
        try{
            $newProduto = $request->all();
            $newProduto['importado'] = $request->has('importado');
            $storedProduto = Produto::create($newProduto);
            return response()->json([
                    'message'=>'Produto inserido com sucesso',
                    'data' => $storedProduto
                ],$statusHttp);
        }catch(Exception $error){
            $responseError = [
                'message'=>'Erro ao inserir o produto!!!',
            ];

            $statusHttp = 500;

            if(env('APP_DEBUG'))
                $responseError = [
                         ...$responseError,
                        'error'=>$error->getMessage(),
                        'trace'=>$error->getTrace()
                    ];

            return response()->json($responseError,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return response()->json($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
