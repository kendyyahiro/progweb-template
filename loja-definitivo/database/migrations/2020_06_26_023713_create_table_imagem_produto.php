<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImagemProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('imagens_produtos')){
            Schema::create('imagens_produtos', function (Blueprint $table) {
                $table->id();
                
                $table->foreignId('produto_id');   
                $table->foreign('produto_id')->references('id')->on('produto');
    
                $table->string('imagem');
    
                $table->timestamps();
            });
        }

        if (Schema::hasColumn('produto', 'imagem')) {
            Schema::table('produto', function (Blueprint $table) {
                $table->dropColumn('imagem');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens_produtos');
    }
}
