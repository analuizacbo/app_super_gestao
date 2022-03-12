<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['comprimento', 'altura', 'largura', 'unidade_id'];
}
