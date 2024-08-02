<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $tableName = 'promocoes';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->tableName);
    }
};

//Para executar uma migration isoladamente use o comando --path
// passe todo caminho (path), desde a pasta raiz da aplicacao
//Comando:
// php artisan migrate --path='database/migrations/2024_08_02_165948_create_promocaos_table.php'
