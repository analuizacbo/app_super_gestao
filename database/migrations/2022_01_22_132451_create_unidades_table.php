<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 150);
            $table->timestamps();
        });

        //adicionando relacionamento com a tab produtos 
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionando relacionamento com a tab produtos_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //A LOGICA ESTABELECIDA NO METODO DOWN PRECISA SER REVERSA AO METODO UP. NO ENTANTO PRECISAMOS REMOVER AS FKs PARA DEPOIS EXCLUIR A TAB

        //Removendo relacionamento com a tab produtos_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //removendo a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //convencao do laravel: [table]_[coluna]_[foreing]

            //remover a coluna
            $table->dropColumn('unidade_id');
        });

        //Removendo relacionamento com a tab produto
        Schema::table('produtos', function (Blueprint $table) {
            //removendo a fk
            $table->dropForeign('produtos_unidade_id_foreign'); //convencao do laravel: [table]_[coluna]_[foreing]

            //remover a coluna
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
