<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->text('descricao')->nullable();//Vai aceitar nulo
            $table->integer('peso')->nullable();
            $table->float('preco_venda', 8, 2)->default(0.01);//Setando valores default
            $table->integer('estoque_min')->default(1);
            $table->integer('estoque_max')->default(1);
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
        Schema::dropIfExists('produtos');
    }
}
