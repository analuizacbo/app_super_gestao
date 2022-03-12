@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>

                        <head>
                            <tr>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>UF</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </head>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>
                                    <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a>
                                </td>
                                <td>
                                    <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>

                {{-- Links de paginação --}}
                {{ $fornecedores->appends($request)->links() }}

                <!--
                    {{-- Appends faz anexar o array request para nao perder paginacao nas outras paginas --}}
                    
                    {{ $fornecedores->count() }} - Total de registros por página
                    <br>
                    {{ $fornecedores->total() }} - Total de registros da consulta
                    <br>
                    {{ $fornecedores->firstItem() }} - Posição do primeiro registro da página
                    <br>
                    {{ $fornecedores->lastItem() }} - Posição do último registro da página
                -->
                <br>
                Exibindo {{ $fornecedores->count() }} fornecedores de um total de {{ $fornecedores->total() }}
                registros (de {{ $fornecedores->firstItem() }} à {{ $fornecedores->lastItem() }})
            </div>
        </div>
    </div>
@endsection
