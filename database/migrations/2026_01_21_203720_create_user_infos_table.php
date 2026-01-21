<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('usuario');
            $table->string('senha');
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg')->nullable();
            $table->date('nascimento');
            $table->string('telefone');
            $table->string('cep');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('escolaridade');
            $table->string('num_usp')->nullable();
            $table->string('instituicao');
            $table->string('curso')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfos');
    }
};
