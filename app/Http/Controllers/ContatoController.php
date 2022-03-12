<?php

namespace App\Http\Controllers;

use App\MotivosContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato_action(Request $request)
    {

        //********Existem 3 tipos de insercao de banco*********
        //A utilizacao vai depender se:

        //Queremos tratar campo a campo -> Opcao 1 

        //Enviar os dados sem tratativa -> 2ª ou 3ª (Essas necessitam do fillable)

        // 1ª Instancia da classe e acesso a atributos

        //    $contato = new SiteContato();
        //    $contato->nome = $request->input('nome');
        //    $contato->telefone = $request->input('telefone');
        //    $contato->email = $request->input('email');
        //    $contato->motivo_contato = $request->input('motivo_contato');
        //    $contato->mensagem = $request->input('mensagem');

        //    echo '<pre>';
        //    print_r($contato->getAttributes());
        //    echo '</pre>';

        //    $contato->save();

        //  *************Fim 1ª*************************


        // 2ª ***************METODO FILL*****************

        // $contato = new SiteContato();
        // $contato->fill($request->all());

        // echo '<pre>';
        // print_r($contato->getAttributes());
        // echo '</pre>';

        //$contato->save(); //Salva na base

        //************ FIM METODO FILL*********************

        //3ª ************METODO CREATE*********************

        // $contato = new SiteContato();
        // $contato->create($request->all());

        // echo '<pre>';
        // print_r($contato->getAttributes());
        // echo '</pre>';

        //OUTRA FORMA DO CREATE

        // SiteContato::created($request->all());


        //3ª ************FIM METODO CREATE******************

        //ESSES DADOS SERÃO TRAZIDOS DO MODEL AGORA
        // $motivos_contato = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];

        $motivos_contato = MotivosContato::all();

        return view('site.contato-view', ['titulo' => 'Contato', 'motivos_contato' => $motivos_contato]); //Enviando parametro para view contato variavel tera o mesmo nome la

    }

    public function salvar_action(Request $request)
    {
        // dd($request);

        //REALIZAR VALIDACAO DOS DADOS DO FORMULARIO RECEBIDOS NO REQUEST
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', // Esse campo deve ser obrigatorio, min 3 caracteres e max 40 caracteres
            'telefone' => 'required',
            'email' => 'email', // Validacao email
            'motivos_contato_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo três caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O campo nome informado já existe na base de dados',
            'telefone.required' => 'O campo telefone deve ser preenchido',
            //MENSAGEM DEFAULT PARA CAMPOS NÃO PARAMETRIZADOS
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'O e-mail informado não é válido',
            'mensagem.max' => 'A mensagem deve conter no máximo 2000 caracteres'
        ];


        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.recebido');
    }
}
