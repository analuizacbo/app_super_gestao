<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivosContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivos_contato', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato', 20);
            $table->timestamps();
        });

        //Poderia inserir aqui, mas por boas praticas criamos um seeder para insercao
        // MotivosContato::create(['motivo_contato' => 'Dúvida']);
        // MotivosContato::create(['motivo_contato' => 'Elogio']);
        // MotivosContato::create(['motivo_contato' =>'Reclamação']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivos_contato');
    }
}
