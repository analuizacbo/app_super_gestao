<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//ELOQUENT IDENTIFICA A TABELA A ONDE SERÁ INSERIDO ATRAVÉS DA LEITURA DO LARAVEL
//site_contatos --> TUDO PASSA A SER MINUSCULO, ONDE É CAMEL CASE ELE TROCA POR "_" E NO FINAL É ACRESCENTADO UM 'S'

class SiteContato extends Model
{
    //
   protected $fillable = ['nome', 'telefone', 'email', 'motivos_contato_id', 'mensagem'];
}
