<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivosContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ///ADICIONAN COLUNA MOTIVOS_CONTATO_ID
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivos_contato_id');
        });

        //TRANSFERINDO DADOS DA COL MOTIVO_CONTATO PARA MOTIVOS_CONTATO_ID
        DB::statement('update site_contatos set motivos_contato_id = motivo_contato');

        //APLICANDO FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_contato_id')->references('id')->on('motivos_contato');
        });

        //REMOVENDO COLUNA MOTIVO_CONTATO
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //CRIAR COLUNA MOTIVO_CONTATO
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
        });

        // REMOVENDO FK
        //PADRÃO LARAVEL FM <table_<coluna>_foreign>
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign('site_contatos_motivos_contato_id_foreign');
        });

        //TRANSFERINDO DADOS DA COL MOTIVOS_CONTATO_ID PARA MOTIVO_CONTATO
        DB::statement('update site_contatos set motivo_contato = motivos_contato_id');

        //REMOVENDO COLUNA MOTIVOS_CONTATO_ID
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_contato_id');
        });
    }
}
