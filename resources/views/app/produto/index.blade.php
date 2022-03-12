@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>

                        <head>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade Id</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </head>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>
                                    <a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a>
                                </td>
                                <td>
                                    <a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $produto->id }}"
                                        action="{{ route('produto.destroy', ['produto' => $produto->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->id }}').submit()">
                                            Excluir
                                        </a>
                                        {{-- <button type="submit">
                                            Excluir
                                        </button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>

                {{-- Links de paginação --}}
                {{ $produtos->appends($request)->links() }}

                <!--
                                {{-- Appends faz anexar o array request para nao perder paginacao nas outras paginas --}}
                                
                                {{ $produtos->count() }} - Total de registros por página
                                <br>
                                {{ $produtos->total() }} - Total de registros da consulta
                                <br>
                                {{ $produtos->firstItem() }} - Posição do primeiro registro da página
                                <br>
                                {{ $produtos->lastItem() }} - Posição do último registro da página
                            -->
                <br>
                Exibindo {{ $produtos->count() }} produtos de um total de {{ $produtos->total() }}
                registros (de {{ $produtos->firstItem() }} à {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection
