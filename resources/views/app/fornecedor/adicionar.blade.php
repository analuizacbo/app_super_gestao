@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? ''}}
            <div style="width:30%; margin-left:auto; margin-right:auto">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf
                    <input type="hidden" name=id value="{{ $fornecedor->id ?? ''}}"> 

                    <input class="borda-preta" name="nome" type="text" placeholder="Nome"
                        value="{{ $fornecedor->nome ?? old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input class="borda-preta" name="site" type="text" placeholder="Site"
                        value="{{ $fornecedor->site ?? old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input class="borda-preta" name="uf" type="text" placeholder="UF"
                        value="{{ $fornecedor->uf ?? old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input class="borda-preta" name="email" type="text" placeholder="Email"
                        value="{{ $fornecedor->email ?? old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button class="borda-preta" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
