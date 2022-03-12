@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto Detalhes - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto">
                @component('app.produto-detalhe._components.form-create-edit', ['unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
