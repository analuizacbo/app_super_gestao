<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Criando tab filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('nome_filial', 150);
            $table->timestamps();
        });

        //Criando tab produto filiais que foi gerada de um relacionamento muitos para muitos
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_min');
            $table->integer('estoque_max');
            $table->timestamps();

            //add foreign key
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //Removendo colunas tab produtos que passarao a existir na tab produto_filiais
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_min', 'estoque_max']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Adicionanfo colunas tab produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_min');
            $table->integer('estoque_max');
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
