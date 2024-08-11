<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Produto extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        "nome",
        "descricao",
        "qtd_estoque",
        "preco",
        "importado",
        "fornecedor_id"
    ];

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    public function promocoes()
    {
        return $this->belongsToMany(Promocao::class);
    }

    public function regiao(){
        return $this->belongsToThrough(
            Regiao::class,
            [
                Estado::class,
                Fornecedor::class
            ],
            null,
            '',
            [
                Regiao::class=>'regiao_id',
                Fornecedor::class=>'fornecedor_id'
            ]
        );
    }

}
