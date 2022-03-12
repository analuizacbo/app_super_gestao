{{-- chegamos aqui galera --}}

{{-- Comentario que sera descartado pelo interpretador do blade --}}

@php
    //Para comentarios de uma linha dentro do bloco php

    /* Comentarios multiplas linhas */
@endphp

{{-- {{ "TEXTO é igual à tag curta de impressao do php" }}  --}}

{{--Por ser um array deve-se utilizar a tag @dd para mostrar na tela e sempre vamos usar esse @dd quando quisermos que algo seja renderizado no blade--}}

{{-- @dd($fornecedores); --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) < 10))
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}


{{-- UNLESS --> É a negacao do if, ou seja, so executa se o retorno for false --}}
{{-- Fornecedor: {{$fornecedores[0]['nome']}}
<br>
Status: {{$fornecedores[0]['status']}}
<br>


@if(!($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo
@endif

<br>
@unless($fornecedores[0]['status'] == 'S')
    Fornecedor inativo
@endunless --}}

{{-- @isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }} 
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cpf'])
        CPF: {{ $fornecedores[0]['cpf'] }}
    @endisset
@endisset --}}

@php
    //No php o isset, verifica se a variavel existe e se ela existir retorna true
    //if(isset($variavel)) > 0)
    //ATENCAO: diferenca entre isset(verifica se a variavel existe, se sim, retorna true) e empty(verifica se a variavel esta vazia, se sim retorna true)
    /*VALORES CONSIDERADOS VAZIOS PARA O PHP E QUE RETORNAM TRUE PARA O EMPTY
        ''
        0
        0.0
        '0'
        null
        false
        array()
        apenas uma variavel sem valor(quando ela so foi declarada e nao recebeu atribuicao de valor)
    */
@endphp

{{-- @isset($fornecedores[0]['cpf'])
        <br>
        CPF: {{ $fornecedores[0]['cpf2'] }}
        <br>
        @empty($fornecedores[0]['cpf2'] )
            Cpf Vazio
            <br>
        @endempty
@endisset --}}

{{-- @isset($fornecedores[0]['cpf'])
        <br>
        CPF: {{ $fornecedores[0]['cpf2'] }}
        <br>
@endisset --}}

{{-- Switch e Laco de repeticao for --}}
{{-- @isset($fornecedores)

    @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }} 
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br> --}}
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        {{-- CPF: {{ $fornecedores[$i]['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{  $fornecedores[$i]['ddd'] ?? '' }})  {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr> --}}

        {{-- @switch($fornecedores[0]['ddd'])
            @case ('11')
                São Paulo - SP
                @break

            @case ('32')
                Juiz de Fora - MG
                @break

            @case ('85')
                Fortaleza - CE
                @break
            @default
                Estado não identificado
        @endswitch --}}
    {{-- @endfor
@endisset --}}

{{-- Laco de repeticao while --}}
{{-- @isset($fornecedores)
    @php
        $i = 0;
    @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }} 
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        {{-- CPF: {{ $fornecedores[$i]['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{  $fornecedores[$i]['ddd'] ?? '' }})  {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
        @php
            $i++
        @endphp
    @endwhile
@endisset  --}}

{{-- @isset($fornecedores)
    @foreach($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}  --}}

        {{-- Foreach tem uma copia do array original --}}
        {{-- @php 
            //Isso só afeta o resultado aqui, para afetar o valor original do array precisaria ser $fornecedores[i][nome] = 'Outro nome'
            $fornecedor['nome'] = 'Outro nome para o fornecedor'; 
        @endphp --}}
        {{-- <br>
        Status: {{ $fornecedor['status'] }}
        <br> --}}
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        {{-- CPF: {{ $fornecedor['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{  $fornecedor['ddd'] ?? '' }})  {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @endforeach
@endisset --}}


{{-- @isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}  --}}

        {{-- Foreach tem uma copia do array original --}}
        {{-- @php 
            //Isso só afeta o resultado aqui, para afetar o valor original do array precisaria ser $fornecedores[i][nome] = 'Outro nome'
            $fornecedor['nome'] = 'Outro nome para o fornecedor'; 
        @endphp --}}
        {{-- <br>
        Status: {{ $fornecedor['status'] }}
        <br> --}}
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        {{-- CPF: {{ $fornecedor['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{  $fornecedor['ddd'] ?? '' }})  {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset --}}

{{-- DESVIANDO A TAG DE IMPRESSAO DO BLADE COM @ ASSIM ELE NAO INTERPRETA O TEXTO SO FAZ A IMPRESSAO --}}
{{-- @isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: @{{ $fornecedor['nome'] }}  --}}

        {{-- Foreach tem uma copia do array original --}}
        {{-- @php 
            //Isso só afeta o resultado aqui, para afetar o valor original do array precisaria ser $fornecedores[i][nome] = 'Outro nome'
            $fornecedor['nome'] = 'Outro nome para o fornecedor'; 
        @endphp --}}
        {{-- <br>
        Status: @{{ $fornecedor['status'] }}
        <br> --}}
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        {{-- CPF: @{{ $fornecedor['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: (@{{  $fornecedor['ddd'] ?? '' }})  @{{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset --}}

{{-- LOOP SO FICA DISPONIVEL NOS LACOS FOREACH E FORELSE POIS NAO E SETADO A VARIAVEL DE ITERACAO --}}
@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)

        {{-- Ver detalhes sobre o objeto dentro das view utilizar o @dd  --}}
        {{-- @dd($loop) --}}

        Iteração atual : {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }} 
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        {{-- Aplicando valor default do blade diante as seguintes condicoees:
        Se a variavel testada nao estiver definida (isset) 
        ou 
        possuir o valor NULL o valor defalt sera usado 
        ATENCAO: '0' --> NAO E CONSIDERADO VALOR NULL AQUI NO DEFAULT DO BLADE NO EMPTY ELE E CONSIDERADO COMO VAZIO--}}
        CPF: {{ $fornecedor['cpf'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{  $fornecedor['ddd'] ?? '' }})  {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if($loop->first)
            Primeira iteração do loop
            <br>
            Total de iterações: {{ $loop->count }}
        @endif
        @if($loop->last)
            Ultima iteração do loop
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset
