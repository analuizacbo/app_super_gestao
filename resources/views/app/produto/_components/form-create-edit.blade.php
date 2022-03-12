@if (isset($produto->id))
    {{-- Aqui caso seja para editar --}}
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        {{-- Aqui caso seja para adicionar --}}
        <form action="{{ route('produto.store') }}" method="post">
            @csrf
@endif

<input class="borda-preta" name="nome" type="text" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<input class="borda-preta" name="descricao" type="text" placeholder="Descricao"
    value="{{ $produto->descricao ?? old('descricao') }}">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<input class="borda-preta" name="peso" type="text" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<select name="unidade_id" id="">
    <option value="">--Selecione a unidade de medida--</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button class="borda-preta" type="submit">Cadastrar</button>
</form>
