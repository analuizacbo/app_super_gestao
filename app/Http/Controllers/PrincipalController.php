<?php

namespace App\Http\Controllers;

use App\MotivosContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal_action () {

        // $motivos_contato = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];

        $motivos_contato = MotivosContato::all();

        return view('site.principal-view', ['motivos_contato' => $motivos_contato]);
    }
}
