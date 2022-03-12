<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function __construct()
    {
       $this->middleware('log.acesso');
    }

    public function sobre_nos_action(){
        return view('site.sobre-nos-view');
    }
}
