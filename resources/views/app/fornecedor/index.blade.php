@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto">
                <form action="{{ route('app.fornecedor.listar') }}" method="post"> ,
                    @csrf
                    <input class="borda-preta" name="nome" type="text" placeholder="Nome">
                    <input class="borda-preta" name="site" type="text" placeholder="Site">
                    <input class="borda-preta" name="uf" type="text" placeholder="UF">
                    <input class="borda-preta" name="email" type="text" placeholder="Email">
                    <button class="borda-preta" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
