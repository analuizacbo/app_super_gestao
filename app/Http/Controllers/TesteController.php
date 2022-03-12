<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste_action(int $p1, int $p2){
        //echo "A soma de $p1 + $p2 é " . ($p1+$p2);
        
        //ENCAMINHANDO PARAMETROS DO CONTROLLER PARA VIEW VIA ARRAY ASSOSCIATIVO
        // return view('site.teste', ['x' => $p1, 'p2' => $p2]); //ATENCAO ESSE NAO E NOME DE ROTA E SIM O CAMINHO DO ARQUIVO QUE ENCONTRA-SE DENTRO DA PASTA SITE
    
        //ENCAMINHANDO PARAMETROS DO CONTROLLER PARA VIEW VIA METODO COMPACT
        //return view('site.teste', compact('p1', 'p2')); //NESTE EXEMPLO O NOME TEM QUE SER O MESMO DA VARIAVEL TANTO AQUI QUANTO NA VIEW SE NAO, NAO FUNCIONA
    
        //ENCAMINHANDO PARAMETROS DO CONTROLLER PARA VIEW VIA METODO WITH('VARIAVEL_VIEW', VALOR_DA_VARIAVEL_DESTA_FUNCAO)
        return view('site.teste')->with('x', $p1,'p2', $p2)->with('p2', $p2);//NESTE EXEMPLOS PRECISAMOS PEGAR O NOME DA VARIAVEL DA VIEW E ATRIBUIR O VALOR A ELA
    }
}
