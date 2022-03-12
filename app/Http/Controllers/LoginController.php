<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index_action(Request $request){

        $erro = '';

        if($request->get('erro') == '1'){
            $erro = 'Usuário e ou senha não existe';
        }

        if($request->get('erro') == '2'){
            $erro = 'Necessário realizar login para ter acesso à página';
        }

        return view('site.login-view', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar_action(Request $request){

        //Regras paara validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback
        $feedback = [
            'usuario.email' => 'Por favor informe um e-mail valido',
            'senha.required' => 'O campo senha não pode estar vazio'
        ];

        //Se a validacao for negada ela faz um redirect para a rota antiga
        $request->validate($regras, $feedback);


        //Recuperando dados do form
        $usuario = $request->get('usuario');
        $senha = $request->get('senha'); 

        // echo "usuário: $usuario e senha: $senha <br>";

        //print_r($request->all());

        $user = new User();
        
        //Consultando no banco se user existe
        $usuario_existe = $user->where('email', $usuario)->where('password' , $senha)->get();

        // echo '<pre>';
        //     print_r($usuario_existe);
        // echo '</pre>';

        //Recebe a primeira colecao que retorna na consulta
        $usuario_existe = $usuario_existe->first();

        if(isset($usuario_existe->name)){
            //dd($usuario_existe);
            session_start();
            $_SESSION['nome'] = $usuario_existe->name;
            $_SESSION['email'] =  $usuario_existe->email;

            //dd($_SESSION);
            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair_action(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
