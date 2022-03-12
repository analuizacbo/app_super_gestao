<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contatos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Adicionando dados faltantes de acordo com documentacao do laravel
            $table->string('nome', 150);
            $table->string('telefone', 20);
            $table->string('email', 80);
            $table->integer('motivo_contato');
            $table->text('mensagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contatos');
    }
}
