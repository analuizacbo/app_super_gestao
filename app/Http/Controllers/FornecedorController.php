<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index_action()
    {
        // $fornecedores = [
        //     0 => [
        //         'nome' => 'Fornecedor 1',
        //         'status' => 'N',
        //         'cpf' => '470025825844',
        //         // 'cpf2'=> '0',
        //         'ddd' => '11', //Sao paulo (SP)
        //         'telefone' => '0000-0000'
        //     ],
        //     1 => [
        //         'nome' => 'Fornecedor 2',
        //         'status' => 'S',
        //         'cpf' => null,
        //         'ddd' => '85', //Fortaleza (CE)
        //         'telefone' => '0000-0000'
        //     ],
        //     2 => [
        //         'nome' => 'Fornecedor 3',
        //         'status' => 'S',
        //         'cpf' => null,
        //         'ddd' => '32', //Juiz de fora (MG)
        //         'telefone' => '0000-0000'
        //     ],
        // ];

        //OPERADOR TERNARIO condicao ? valor_verdadeiro : valor_falso
        // $msg = isset($fornecedores[0]['cpf']) ? 'CPF informado' : 'CPF não informado';
        // echo $msg;

        //Testar condicao forelse
        // $fornecedores = [];

        // return view('app.fornecedor.index', compact('fornecedores')); //Cria uma variavel do lado da view com nome fornecedores

        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        //dd($request->all());
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            //PAGINACAO DE CONTEUDO COM LARAVEL SUBSTITUI METODO GET POR PAGINATE
            ->paginate(2); //Aparecera so dois dados na paginacao

        //dd($fornecedores);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        //print_r($request->all());

        //INCLUSAO DE UM NOVO REGISTRO
        if ($request->input('_token') != '' && $request->input('id') == '') {
            //Cadastro
            //echo 'cadastro';

            //Validando dados
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'Atenção o campo :attribute não pode ser vazio',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf precisa ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf precisa ter no máximo 2 caracteres',
                'email.email' => 'Por favor informe um e-mail válido'
            ];

            $request->validate($regras, $feedback);



            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        //EDICAO
        if ($request->input('_token') != '' && $request->input('id') != '') {
            //Esse id segue o caminho = FornecedorController@editar -> view adicionar -> rota(post) adicionar -> que traz ele aqui
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Dados atualizados com sucesso!';
            } else {
                $msg = 'Problema em atualizar dados';
            }

            //Aqui redirecionamos pois o update e feito apos a instancia da classe, ou seja o obj esta desatualizado, entao ele chama de novo a view adicionar com os dados editados na funcao editar
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        //echo $id;
        $fornecedor = Fornecedor::find($id);
        //dd($fornecedor);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {

        Fornecedor::find($id)->delete();

        //Fornecedor::find($id)->Forcedelete();//Este metodo forca sumir o registro da tabela

        return redirect()->route('app.fornecedor');
    }
}
