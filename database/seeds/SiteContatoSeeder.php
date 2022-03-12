<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SiteContato::create([
        //     'nome' => 'analuizacarvalho.com',
        //     'telefone' => '14981326589',
        //     'motivo_contato' => 1,
        //     'email' => 'analu@teste.com',
        //     'mensagem' => 'Olá pode me mostrar mais sobre seu trabalnho? '
        // ]);

        //Gerando 100 registros teste
        factory(SiteContato::class, 100)->create();
    }
}
