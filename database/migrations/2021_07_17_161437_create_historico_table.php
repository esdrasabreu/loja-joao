<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('categoria');
            $table->string('nome');
            $table->float('preco');
            $table->text('composicao');
            $table->enum('tamanho', ['PP', 'P', 'M', 'G','GG']);
            $table->integer('quantidade');
            $table->enum('operacao', ['insert', 'update', 'delete']);
            $table->string('nome_usuario');
            $table->timestamps();


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico');
    }
}
