<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ha 3 formas de insercao, no entanto a create precisa especificar o campo fillable

        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Amanda Jad';
        $fornecedor->site = 'amanda.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'amanda.jad@gmail.com';
        $fornecedor->save();


        //So e possivel utilizaro create aqui pq la no model fornecedor foi atribuido os fillables
        Fornecedor::create([
            'nome' => 'Ana Luiza',
            'site' => 'analuiza.com',
            'uf' => 'SP',
            'email' => 'analuiza.com.br'
        ]);

        //INSERT
        DB::table('fornecedores')->insert([
            'nome' => 'Selma de Carvalho',
            'site' => 'selma.com',
            'uf' => 'SP',
            'email' => 'selma.com.br'
        ]);
    }
}
