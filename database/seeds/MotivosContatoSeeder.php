<?php

use App\MotivosContato;
use Illuminate\Database\Seeder;

class MotivosContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivosContato::create(['motivo_contato' => 'Dúvida']);
        MotivosContato::create(['motivo_contato' => 'Elogio']);
        MotivosContato::create(['motivo_contato' => 'Reclamação']);
    }
}
