<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo');
            $table->integer('max_vagas');
            $table->date('data');
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->text('descricao');
            $table->text('observacao')->nullable();
            $table->timestamps();
            $table->string('foto')->nullable();
        });
    }

    //deleta a tabela eventos se usar o rollback
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};

