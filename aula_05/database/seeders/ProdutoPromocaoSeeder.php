<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\Promocao;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProdutoPromocaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //listar produtos
        //listar as promocoes
        //relacionar produto com promocoes
        $listProdutos = Produto::all();
        $totalPromocao = Promocao::count();

        if(!$totalPromocao || !$listProdutos->count()) {
            throw new \Exception('Error: registrar produtos e/ou promocoes!');
        }

        $now = Carbon::now()->toDateTimeString();
        $pivoFields = ['created_at'=>$now,
                       'updated_at'=>$now,
                        'desconto'=>99.99];

        Log::channel('stderr')->info('Relacionando promocoes e produtos...');
        $listPromocoesIDs = Promocao::all()->pluck('id');

        $listProdutos->each(function ($produto)
             use ($listPromocoesIDs, $pivoFields) {
            [$promoId, $promoId2] = $listPromocoesIDs->random(2);
            $produto->promocoes()->attach([
                $promoId => $pivoFields,
                $promoId2 => $pivoFields
            ]);
            Log::channel('stderr')
                ->info("Produto: $produto->id
                | Promocoes: ( $promoId , $promoId2 )");
        });
    }
}
