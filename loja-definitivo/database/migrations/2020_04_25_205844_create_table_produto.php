<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('descricao');
            $table->enum('categoria', ['Imóveis', 'Auto e peças', 'Para casa', 'Eletrônicos e celulares', 'Artigos infantis', 'Serviços', 'Esporte e lazer', 'Moda e beleza', 'Animais de estimação', 'Outros']);
            $table->double('valor', 8, 2);
            $table->string('imagem');
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
        Schema::dropIfExists('produto');
    }
}
