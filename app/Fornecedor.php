<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes; //Foi adicionado uma nova migration para remocao

    //Renomeando a tab fornecedors para fornecedores para tinker entender pois renomeacao automática não funcionou aqui
    protected $table = 'fornecedores';
    
    //Quando vamos usar o método stático create no tinker devemos passar os parametros fillable
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    
}
