<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id');   
            $table->foreign('produto_id')->references('id')->on('produto');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->boolean('status')->default('0');
            $table->foreignId('transacao_id')->nullable();
            $table->foreign('transacao_id')->references('id')->on('transacao');

            $table->integer('situacao')->default(1);

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
        Schema::dropIfExists('carrinho_compra');
    }
}
