<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        // dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => "IP $ip solicitou a rota $rota"]);
        // return Response('Chegamos no meddleware e finalizamos no próprio middleware');
        
        //Com isso vai fazer com que ele caminhe para os proximos middlewares e nao pare aqui
        //return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados');

        //dd($resposta);
        return $resposta;
    }
}
