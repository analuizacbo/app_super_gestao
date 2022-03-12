@if (isset($produto_detalhe->id))
    {{-- Aqui caso seja para editar --}}
    <form action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        {{-- Aqui caso seja para adicionar --}}
        <form action="{{ route('produto.store') }}" method="post">
            @csrf
@endif

<input class="borda-preta" name="produto_id" type="text" placeholder="ID do produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input class="borda-preta" name="comprimento" type="text" placeholder="Comprimento"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input class="borda-preta" name="largura" type="text" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura') }}">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input class="borda-preta" name="altura" type="text" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id" id="">
    <option value="">--Selecione a unidade de medida--</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button class="borda-preta" type="submit">Cadastrar</button>
</form>
